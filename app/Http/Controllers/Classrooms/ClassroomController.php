<?php


namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassRoomRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{


    public function index()
    {

        $My_Classes = Classroom::all();
        $Grades = Grade::all();
        return view('pages/My_Classes', compact('My_Classes', 'Grades'));

    }


    public function create()
    {

    }

    public function store(ClassRoomRequest $request){

        $List_Classes = $request->List_Classes;

        try {

            foreach ($List_Classes as $List_Class) {

                $My_Classes = new Classroom();
                $My_Classes->Name_Class = ['en' => $List_Class['Name_class_en'], 'ar' => $List_Class['Name']];
                $My_Classes->Grade_id = $List_Class['Grade_id'];
                $My_Classes->save();

            }

            toastr()->success(trans('main_trans.success'));
            return redirect()->route('Classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function update(Request $request)
    {

        try {

            $Classrooms = Classroom::findOrFail($request->id);

            $Classrooms->update([

                $Classrooms->Name_Class = ['ar' => $request->Name, 'en' => $request->Name_class_en],
                $Classrooms->Grade_id = $request->Grade_id,
            ]);
            toastr()->success(trans('main_trans.Update'));
            return redirect()->route('Classrooms.index');
        }

        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request){

        Classroom::findOrFail($request->id)->delete();
        toastSuccess(trans('main_trans.Delete_M'));

        return redirect()->route('Classrooms.index');
    }


    public function Multi_Delete(Request $request){
        $delete_all_id = explode(",", $request->delete_all_id);

        Classroom::whereIn('id', $delete_all_id)->Delete();
        toastr()->success(trans('main_trans.Delete_M'));
        return redirect()->route('Classrooms.index');

    }


    public function Filter_Classes(Request $request){
        $Grades = Grade::all();
        $Search = Classroom::select('*')->where('Grade_id','=',$request->Grade_id)->get();
        return view('pages/My_Classes',compact('Grades'))->withDetails($Search);

    }


}

?>
