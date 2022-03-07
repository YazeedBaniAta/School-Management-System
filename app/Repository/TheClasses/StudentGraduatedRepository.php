<?php


namespace App\Repository\TheClasses;


use App\Models\Grade;
use App\Models\Student;
use App\Repository\interfaces\StudentGraduatedRepositoryInterface;

class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface
{

    public function index()
    {
        $students = Student::onlyTrashed()->get();
        return view('Pages/Students/Graduated/index',compact('students'));
    }

    public function create()
    {
        $Grades = Grade::all();
        return view('Pages/Students/Graduated/create',compact('Grades'));
    }

    public function SoftDelete($request)
    {
        $students = Student::where('Grade_id',$request->Grade_id)->where('Classroom_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();


        if($students->count() < 1){
            return redirect()->back()->with('error_Graduated', __(trans('main_trans.CheckStudent')));
        }

        foreach ($students as $student){
            $ids = explode(',',$student->id);
            Student::whereIn('id', $ids)->Delete();
        }

        toastr()->success(trans('main_trans.success'));
        return redirect()->route('Graduated.index');
    }

    public function ReturnData($request)
    {
        Student::onlyTrashed()->where('id', $request->id)->first()->restore();
    }

    public function destroy($request)
    {
        Student::onlyTrashed()->where('id', $request->id)->first()->forceDelete();
        toastr()->success(trans('main_trans.Delete_M'));
        return redirect()->back();
    }
}
