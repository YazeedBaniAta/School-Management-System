<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Repository\interfaces\QuestionRepositoryInterface;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    protected $questions;

    public function __construct(QuestionRepositoryInterface $Question){
        $this->questions = $Question;
    }

    public function index()
    {
        return $this->questions->index();
    }


    public function create()
    {
        return $this->questions->creat();
    }


    public function store(Request $request)
    {
        return $this->questions->store($request);
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
        return $this->questions->edit($id);
    }


    public function update(Request $request)
    {
        return $this->questions->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->questions->destroy($request);
    }
}
