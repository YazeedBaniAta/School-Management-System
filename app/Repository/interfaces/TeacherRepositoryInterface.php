<?php

namespace App\Repository\interfaces;

interface TeacherRepositoryInterface{

    //To get all value from table Teacher
    public function getAllTeachers();

    //To get all value from table Gender
    public function getAllGender();

    //To get all value from table Specialization
    public function getAllSpecialization();

    //To insert into table Teacher
    public function InsertTeachers($request);

    //To Show information Teachers
    public function EditTeachers($id);

    //To Edit information Teachers
    public function UpdateTeacher($request);

    // Delete Teachers
    public function DeleteTeachers($request);

}
