<?php


namespace App\Repository\TheClasses;


use App\Models\Grade;
use App\Models\Subjects;
use App\Models\Teachers;
use App\Repository\interfaces\SubjectRepositoryInterface;

class SubjectRepository implements SubjectRepositoryInterface
{
    public function index()
    {
        $subjects = Subjects::get();
        return view('Pages/Subjects/index',compact('subjects'));
    }

    public function create()
    {
        $grades = Grade::get();
        $teachers = Teachers::get();
        return view('Pages/Subjects/create',compact('grades','teachers'));
    }

    public function store($request)
    {
        try {
            $subjects = new Subjects();
            $subjects->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $subjects->grade_id = $request->Grade_id;
            $subjects->classroom_id = $request->Classroom_id;
            $subjects->teacher_id = $request->teacher_id;
            $subjects->save();

            toastr()->success(trans('main_trans.success'));
            return redirect()->route('subjects.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $subject = Subjects::findorfail($id);
        $grades = Grade::get();
        $teachers = Teachers::get();
        return view('Pages/Subjects/edit',compact('subject','grades','teachers'));

    }

    public function update($request)
    {
        try {
            $subjects =  Subjects::findorfail($request->id);
            $subjects->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $subjects->grade_id = $request->Grade_id;
            $subjects->classroom_id = $request->Classroom_id;
            $subjects->teacher_id = $request->teacher_id;
            $subjects->save();

            toastr()->success(trans('main_trans.Update'));
            return redirect()->route('subjects.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Subjects::destroy($request->id);

            toastr()->error(trans('main_trans.Delete_M'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
