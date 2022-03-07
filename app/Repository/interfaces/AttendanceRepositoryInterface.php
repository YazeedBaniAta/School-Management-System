<?php


namespace App\Repository\interfaces;


interface AttendanceRepositoryInterface
{
    public function index();

    public function show($id);

    public function store($request);

    public function edit($id);

    public function update($request);

//    public function Filter_date($request);

}
