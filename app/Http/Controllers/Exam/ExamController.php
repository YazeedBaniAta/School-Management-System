<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamRequest;
use App\Repository\interfaces\ExamRepositoryInterface;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    protected $Exam;
    public function __construct(ExamRepositoryInterface $exam)
    {
        return $this->Exam = $exam;
    }

    public function index()
    {
        return $this->Exam->index();
    }

    public function create()
    {
        return $this->Exam->create();
    }


    public function store(ExamRequest $request)
    {
        return $this->Exam->store($request);
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
        return $this->Exam->edit($id);
    }


    public function update(ExamRequest $request)
    {
        return $this->Exam->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Exam->destroy($request);
    }
}
