<?php


namespace App\Repository\TheClasses;


use App\Models\Exam;
use App\Repository\interfaces\ExamRepositoryInterface;
use Exception;

class ExamRepository implements ExamRepositoryInterface
{

    public function index()
    {
        $exams = Exam::all();
        return view('Pages/Exams/index',compact('exams'));
    }

    public function create()
    {
        return view('Pages/Exams/create');
    }

    public function store($request)
    {
        try {
            $exam = new Exam();

            $exam->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $exam->term = $request->term;
            $exam->academic_year = $request->academic_year;
            $exam->save();

            toastr()->success(trans('main_trans.success'));
            return redirect()->route('Exams.index');

        }catch (Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $exam = Exam::findorFail($id);
        return view('Pages/Exams/edit', compact('exam'));
    }

    public function update($request)
    {
        try {
            $exam = Exam::findorFail($request->id);

            $exam->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $exam->term = $request->term;
            $exam->academic_year = $request->academic_year;
            $exam->save();

            toastr()->success(trans('main_trans.Update'));
            return redirect()->route('Exams.index');

        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Exam::destroy($request->id);

            toastr()->success(trans('main_trans.Delete_M'));
            return redirect()->back();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
