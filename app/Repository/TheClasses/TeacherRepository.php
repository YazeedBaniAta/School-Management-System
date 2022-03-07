<?php

namespace App\Repository\TheClasses;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teachers;
use App\Repository\interfaces\TeacherRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface{

    public function getAllTeachers()
    {
        return Teachers::all();
    }

    public function getAllGender()
    {
        return Gender::all();
    }

    public function getAllSpecialization()
    {
        return Specialization::all();
    }

    public function InsertTeachers($request)
    {
        try {
            $Teachers = new Teachers();
            $Teachers->email = $request->email;
            $Teachers->password =  Hash::make($request->password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            toastr()->success(trans('main_trans.success'));
            return redirect()->route('Teachers.create');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function EditTeachers($id)
    {
        return Teachers::findOrFail($id);
    }

    public function UpdateTeacher($request)
    {
        try {
            $Teachers = Teachers::findOrFail($request->id);
            $Teachers->email = $request->email;
            $Teachers->password =  Hash::make($request->password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function DeleteTeachers($request)
    {
        Teachers::findOrFail($request->id)->delete();
    }
}
