<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradeRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $grades = Grade::all();

        return view('Pages/Grades',['Grades'=>$grades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGradeRequest $request)
    {
        //to make the name limit and uniq if we dont have custom request
//        if(Grade::where('Name->ar',$request->Name)->orWhere('Name->en',$request->Name_en)->exists()){
//            toastr()->error(trans('main_trans.exists_M'));
//            return redirect()->back()->withErrors(trans('main_trans.exists_M'));
//        }



        try {
            $validated = $request->validated();
            $Grade = new Grade();

            /* this is the second way to do it
            $translations = [
                'en' => $request->Name_en,
                'ar' => $request->Name
            ];
            $Grade->setTranslations('Name', $translations);
            */

            $Grade->Name = ['en' => $request->Name_en, 'ar' => $request->Name];
            $Grade->Note = $request->Notes;
            $Grade->save();
            toastr()->success(trans('main_trans.success'));
            return redirect()->route('Grade.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGradeRequest $request)
    {
        try {
            $validated = $request->validated();
            $Grades = Grade::findOrFail($request->id);
            $Grades->update([
                $Grades->Name = ['ar' => $request->Name, 'en' => $request->Name_en],
                $Grades->Note = $request->Notes,
            ]);
            toastr()->success(trans('main_trans.Update'));
            return redirect()->route('Grade.index');
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //to check if there is a class to this grades

        $classes_id = Classroom::where('Grade_id',$request->id)->pluck('Grade_id');

        if($classes_id->count() == 0){
            $Grades = Grade::findOrFail($request->id);
            $Grades->delete();
            toastr()->success(trans('main_trans.Delete_M'));
            return redirect()->route('Grade.index');
        }else{
            toastr()->warning(trans('main_trans.Delete_Class_error'));
            return redirect()->route('Grade.index');
        }

    }
}
