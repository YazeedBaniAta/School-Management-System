<?php
namespace App\Http\Controllers\Sections;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teachers;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();

        $list_Grades = Grade::all();

        $Teachers = Teachers::all();

        return view('Pages/Sections',compact(
            'Grades','list_Grades','Teachers'
        ));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        //

        try {
            $Sections = new Section();

            $Sections->Name_Section = ['ar'=>$request->Name_Section_Ar,'en'=>$request->Name_Section_En];
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;
            $Sections->Status = 1;
            $Sections->save();

            $Sections->Teachers()->attach($request->teacher_id);

            toastr()->success(trans('main_trans.success'));
            return redirect()->route('Sections.index');
        } catch (\Exception $e) {
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
    public function update(SectionRequest $request)
    {
        try {
            $Sections = Section::findOrFail($request->id);
            $Sections->Name_Section = ['ar' => $request->Name_Section_Ar, 'en' => $request->Name_Section_En];
            $Sections->Grade_id = $request->Grade_id;
            $Sections->Class_id = $request->Class_id;

            //update statues
            if(isset($request->Status)) {
                if($request->Status == 'presence'){
                    $Sections->Status = 1;
                }else if($request->Status == 'absent'){
                    $Sections->Status = 0;
                }
            }


            // update pivot tABLE
            if (isset($request->teacher_id)) {
                $Sections->Teachers()->sync($request->teacher_id);
            } else {
                $Sections->Teachers()->sync(array());
            }

            $Sections->save();
            toastr()->success(trans('main_trans.success'));
            return redirect()->route('Sections.index');
        } catch (\Exception $e) {
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
        Section::findOrFail($request->id)->delete();
        toastSuccess(trans('main_trans.Delete_M'));
        return redirect()->route('Sections.index');
    }

    public function getclasses($id)
    {
        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");

        return $list_classes;
    }

}
