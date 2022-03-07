<?php


namespace App\Repository\interfaces;


interface QuestionRepositoryInterface
{

    public function index();

    public function creat();

    public function store($request);

    public function edit($id);

    public function update($request);

    public function destroy($request);

}
