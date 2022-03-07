<?php

namespace App\Http\Controllers\Teachers;


use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Repository\interfaces\TeacherRepositoryInterface;
use Illuminate\Http\Request;


class TeacherController extends Controller
{
    protected $Teacher;
    public function __construct(TeacherRepositoryInterface $Teacher){
        $this->Teacher = $Teacher;
    }


    public function index(){
        $All_Teacher = $this->Teacher->getAllTeachers();
        return view('Pages.Teachers.Teachers',compact('All_Teacher'));
    }


    public function create(){
        $genders = $this->Teacher->getAllGender();
        $specializations = $this->Teacher->getAllSpecialization();
        return view('Pages.Teachers.create',compact('specializations','genders'));
    }


    public function store(TeacherRequest $request){

        return $this->Teacher->InsertTeachers($request);
    }


    public function edit(int $id){
        $Teachers = $this->Teacher->EditTeachers($id);
        $specializations = $this->Teacher->getAllSpecialization();
        $genders = $this->Teacher->getAllGender();
        return view('Pages.Teachers.edit',compact('Teachers','specializations','genders'));
    }


    public function update(Request $request){
        $this->Teacher->UpdateTeacher($request);
        toastr()->success(trans('main_trans.Update'));
        return redirect()->route('Teachers.index');
    }


    public function destroy(Request $request){
        $this->Teacher->DeleteTeachers($request);
        toastr()->error(trans('main_trans.Delete_M'));
        return redirect()->route('Teachers.index');
    }
}
