<?php


namespace App\Repository\TheClasses;


use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Subjects;
use App\Models\Teachers;
use App\Repository\interfaces\QuizRepositoryInterface;

class QuizRepository implements QuizRepositoryInterface
{

    public function index()
    {
        $quizzes = Quizze::all();

        return view('Pages.Quizzes.index',compact('quizzes'));
    }

    public function create()
    {
        $data['grades'] = Grade::all();
        $data['subjects'] = Subjects::all();
        $data['teachers'] = Teachers::all();

        return view('Pages.Quizzes.create', $data);
    }

    public function store($request)
    {
        try {
            Quizze::create([
                'name' => ['en' => $request->Name_en, 'ar' => $request->Name_ar],
                'subject_id' => $request->subject_id,
                'grade_id' => $request->Grade_id,
                'classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'teacher_id' => $request->teacher_id,

            ]);

//            $quizzes = new Quizze();
//            $quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
//            $quizzes->subject_id = $request->subject_id;
//            $quizzes->grade_id = $request->Grade_id;
//            $quizzes->classroom_id = $request->Classroom_id;
//            $quizzes->section_id = $request->section_id;
//            $quizzes->teacher_id = $request->teacher_id;
//            $quizzes->save();

            toastr()->success(trans('main_trans.success'));

            return redirect()->route('Quizzes.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $quiz = Quizze::findorFail($id);
        $data['grades'] = Grade::all();
        $data['subjects'] = Subjects::all();
        $data['teachers'] = Teachers::all();
        return view('Pages.Quizzes.edit', $data, compact('quiz'));
    }

    public function update($request)
    {
        try {
            $quizzes = Quizze::findOrFail($request->id);
            $quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizzes->subject_id = $request->subject_id;
            $quizzes->grade_id = $request->Grade_id;
            $quizzes->classroom_id = $request->Classroom_id;
            $quizzes->section_id = $request->section_id;
            $quizzes->teacher_id = $request->teacher_id;
            $quizzes->save();

            toastr()->success(trans('main_trans.Update'));

            return redirect()->route('Quizzes.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Quizze::destroy($request->id);

            toastr()->error(trans('main_trans.Delete_M'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
