<?php


namespace App\Repository\TheClasses;


use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Images;
use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use App\Models\TypeBlood;
use App\Repository\interfaces\StudentRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentRepository implements StudentRepositoryInterface{


    public function Get_Student()
    {
        $students = Student::all();
        return view('Pages/Students/index',compact('students'));
    }

    public function Edit_Student($id)
    {
        $data['Grades'] = Grade::all();
        $data['parents'] = MyParent::all();
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalitie::all();
        $data['bloods'] = TypeBlood::all();
        $Students =  Student::find($id);

        if($Students){
            return view('Pages/Students/edit',$data,compact('Students'));
        }else{
            return redirect()->back();
        }


    }

    public function Show_Student($id)
    {
        $Student = Student::find($id);
        if($Student){
            return view('Pages/Students/show',compact('Student'));
        }else{
            return redirect()->back();
        }

    }

    public function Update_Student($request)
    {
        try {
            $Edit_Students = Student::findorfail($request->id);
            $Edit_Students->name = ['ar' => $request->name_ar, 'en' => $request->name_en];
            $Edit_Students->email = $request->email;
            $Edit_Students->password = Hash::make($request->password);
            $Edit_Students->gender_id = $request->gender_id;
            $Edit_Students->nationalitie_id = $request->nationalitie_id;
            $Edit_Students->blood_id = $request->blood_id;
            $Edit_Students->Date_Birth = $request->Date_Birth;
            $Edit_Students->Grade_id = $request->Grade_id;
            $Edit_Students->Classroom_id = $request->Classroom_id;
            $Edit_Students->section_id = $request->section_id;
            $Edit_Students->parent_id = $request->parent_id;
            $Edit_Students->academic_year = $request->academic_year;
            $Edit_Students->save();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function Delete_Student($request)
    {
        Student::where('id',$request->id)->first()->forceDelete();
        //Student::destroy($request->id);
    }

    public function Create_Student()
    {
        $data['Grades'] = Grade::all();
        $data['parents'] = MyParent::all();
        $data['Genders'] = Gender::all();
        $data['nationals'] = Nationalitie::all();
        $data['bloods'] = TypeBlood::all();
        return view('Pages/Students/add',$data);
    }

    public function Get_classrooms($id)
    {
        return Classroom::where("Grade_id", $id)->pluck("Name_Class", "id");
    }

    public function Get_Sections($id)
    {
        return Section::where("Class_id", $id)->pluck("Name_Section", "id");
    }

    public function Store_Student($request)
    {
        //this DB code to check if there is not error insert to database else dont store
        DB::beginTransaction();

        try {
            $students = new Student();
            $students->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $students->email = $request->email;
            $students->password = Hash::make($request->password);
            $students->gender_id = $request->gender_id;
            $students->nationalitie_id = $request->nationalitie_id;
            $students->blood_id = $request->blood_id;
            $students->Date_Birth = $request->Date_Birth;
            $students->Grade_id = $request->Grade_id;
            $students->Classroom_id = $request->Classroom_id;
            $students->section_id = $request->section_id;
            $students->parent_id = $request->parent_id;
            $students->academic_year = $request->academic_year;
            $students->save();

            // insert img
            if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/'.$students->email, $file->getClientOriginalName(),'upload_attachments');

                    // insert in image_table
                    $images= new Images();
                    $images->filename=$name;
                    $images->imageable_id= $students->id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
            }
            DB::commit(); // insert data
        }

        catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function Upload_attachment($request)
    {
        foreach($request->file('photos') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/students/'.$request->student_email, $file->getClientOriginalName(),'upload_attachments');

            // insert in image_table
            $images= new Images();
            $images->filename = $name;
            $images->imageable_id = $request->student_id;
            $images->imageable_type = 'App\Models\Student';
            $images->save();
        }
    }

    public function Download_attachment($studentsEmail,$filename)
    {
        return response()->download(public_path('attachments/students/'.$studentsEmail.'/'.$filename));
    }

    public function Delete_attachment($request)
    {
        // Delete img in server disk
        Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_email.'/'.$request->filename);

        // Delete in data
        Images::where('id',$request->id)->where('filename',$request->filename)->delete();
        toastr()->warning(trans('main_trans.Delete_Image'));
        return redirect()->back();

    }

    public function Graduate_student($request)
    {
        Student::where('id',$request->id)->Delete();

        toastr()->success(trans('main_trans.success'));
        return redirect()->back();
    }
}
