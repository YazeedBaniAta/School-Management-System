<?php


namespace App\Repository\TheClasses;


use App\Models\Question;
use App\Models\Quizze;
use App\Repository\interfaces\QuestionRepositoryInterface;

class QuestionRepository implements QuestionRepositoryInterface
{

    public function index()
    {
        $questions = Question::all();
        return view('Pages.Questions.index',compact('questions'));
    }

    public function creat()
    {
        $quizzes = Quizze::all();
        return view('Pages.Questions.create',compact('quizzes'));
    }

    public function store($request)
    {
        try {
            $question = new Question();
            $question->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->quizze_id = $request->quizze_id;
            $question->save();
            toastr()->success(trans('main_trans.success'));
            return redirect()->route('questions.create');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $question = Question::findorfail($id);
        $quizzes = Quizze::get();
        return view('Pages.Questions.edit',compact('question','quizzes'));
    }

    public function update($request)
    {
        try {
            $question = Question::findorfail($request->id);
            $question->title =  ['en' => $request->title_en, 'ar' => $request->title_ar];
            $question->answers = $request->answers;
            $question->right_answer = $request->right_answer;
            $question->score = $request->score;
            $question->quizze_id = $request->quizzes_id;
            $question->save();
            toastr()->success(trans('main_trans.Update'));
            return redirect()->route('questions.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Question::destroy($request->id);
            toastr()->error(trans('main_trans.Delete_M'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
