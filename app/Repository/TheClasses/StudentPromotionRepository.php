<?php


namespace App\Repository\TheClasses;


use App\Models\Grade;
use App\Models\promotion;
use App\Models\Student;
use App\Repository\interfaces\StudentPromotionRepositoryInterface;
use Illuminate\Support\Facades\DB;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface
{

    public function index()
    {
        $Grades = Grade::all();
        return view('Pages/Students/promotion/index',compact('Grades'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $students = Student::where('Grade_id',$request->Grade_id)->where('Classroom_id',$request->Classroom_id)->where('section_id',$request->section_id)->where('academic_year',$request->academic_year)->get();

            if(count($students) > 0){
                // update in table student
                foreach ($students as $student) {

                    $ids = explode(',', $student->id);
                    Student::whereIn('id', $ids)
                        ->update([
                            'Grade_id' => $request->Grade_id_new,
                            'Classroom_id' => $request->Classroom_id_new,
                            'section_id' => $request->section_id_new,
                            'academic_year'=> $request->New_academic_year,
                        ]);

                    // insert in to promotions
                    promotion::updateOrCreate([
                        'student_id'=>$student->id,
                        'from_grade'=>$request->Grade_id,
                        'from_Classroom'=>$request->Classroom_id,
                        'from_section'=>$request->section_id,
                        'from_academic_year'=>$request->academic_year,
                        'to_grade'=>$request->Grade_id_new,
                        'to_Classroom'=>$request->Classroom_id_new,
                        'to_section'=>$request->section_id_new,
                        'to_academic_year'=>$request->New_academic_year,
                    ]);


                }

                DB::commit();
                toastr()->success(trans('main_trans.success'));
                return redirect()->back();

            }else{
                return redirect()->back()->with('error_promotions', __(trans('main_trans.CheckStudent')));
            }

        }catch (\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function create()
    {
        $promotions = promotion::all();
        return view('Pages/Students/promotion/management',compact('promotions'));
    }

    public function destroy($request)
    {
        //DB::beginTransaction();
        try {
            // التراجع عن الكل
            if($request->page_id == 1){

                $Promotions = promotion::all();
                foreach ($Promotions as $Promotion){

                    //التحديث في جدول الطلاب
                    $ids = explode(',',$Promotion->student_id);
                    student::whereIn('id', $ids)
                        ->update([
                            'Grade_id'=>$Promotion->from_grade,
                            'Classroom_id'=>$Promotion->from_Classroom,
                            'section_id'=> $Promotion->from_section,
                            'academic_year'=>$Promotion->from_academic_year,
                        ]);

                    //حذف جدول الترقيات
                    promotion::truncate();

                }

               // DB::commit();
                toastr()->success(trans('main_trans.Delete_M'));
                return redirect()->back();

            }else{
                $Promotion = promotion::findorfail($request->id);
                student::where('id', $Promotion->student_id)
                    ->update([
                        'Grade_id'=>$Promotion->from_grade,
                        'Classroom_id'=>$Promotion->from_Classroom,
                        'section_id'=> $Promotion->from_section,
                        'academic_year'=>$Promotion->from_academic_year,
                    ]);


                promotion::destroy($request->id);
               // DB::commit();
                toastr()->success(trans('main_trans.Delete_M'));
                return redirect()->back();
            }

        }catch (\Exception $e) {
           // DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }
}
