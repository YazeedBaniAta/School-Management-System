<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizRequest;
use App\Repository\interfaces\QuizRepositoryInterface;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    protected $Quiz;
    public function __construct(QuizRepositoryInterface $quiz)
    {
        return $this->Quiz = $quiz;
    }

    public function index()
    {
        return $this->Quiz->index();
    }


    public function create()
    {
        return $this->Quiz->create();
    }


    public function store(QuizRequest $request)
    {
        return $this->Quiz->store($request);
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
    }


    public function edit($id)
    {
        return $this->Quiz->edit($id);
    }


    public function update(Request $request)
    {
        return $this->Quiz->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Quiz->destroy($request);
    }
}
