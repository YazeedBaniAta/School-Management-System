<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Repository\interfaces\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    protected $Students;

    public function __construct(StudentRepositoryInterface $students){
        $this->Students = $students;
    }

    public function index()
    {
        //
      return $this->Students->Get_Student();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       return $this->Students->Create_Student();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        //
        $this->Students->Store_Student($request);
        toastr()->success(trans('main_trans.success'));
        return redirect()->route('Students.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $this->Students->Show_Student($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return $this->Students->Edit_Student($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request)
    {
        //
        $this->Students->Update_Student($request);
        toastr()->success(trans('main_trans.Update'));
        return redirect()->route('Students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $this->Students->Delete_Student($request);
        toastr()->success(trans('main_trans.Delete_M'));
        return redirect()->route('Students.index');
    }

    //function To Get ClassRoom
    public function Get_classrooms($id){
        return $this->Students->Get_classrooms($id);
    }

    //Function To Get Section
    public function Get_Sections($id){
        return $this->Students->Get_Sections($id);
    }

    //To uploaded image
    public function Upload_attachment(Request $request){
        $this->Students->Upload_attachment($request);
        toastr()->success(trans('main_trans.success'));
        return redirect()->back();

    }

    //To download image on clint side
    public function Download_attachment($studentsEmail,$filename){
      return $this->Students->Download_attachment($studentsEmail,$filename);
    }

    //To Delete Image from side serve and database
    public function Delete_attachment(Request $request){

       return $this->Students->Delete_attachment($request);
    }

    public function Graduate_Student(Request $request){

        return $this->Students->Graduate_student($request);
    }

}
