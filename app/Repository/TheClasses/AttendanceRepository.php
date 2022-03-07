<?php


namespace App\Repository\TheClasses;


use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Student;
use App\Repository\interfaces\AttendanceRepositoryInterface;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class AttendanceRepository implements AttendanceRepositoryInterface
{

    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();
        return view('Pages/Attendance/Sections',compact('Grades'));
    }

    public function show($id)
    {

        $sections = DB::table('sections')->where('id', '=', $id)->get();

        if($sections->first()->Status === 1){
            $students = Student::with('attendance')->where('section_id',$id)->get();
            if($students->count() > 0){
                return view('Pages/Attendance/index',compact('students'));
            }else{
                toastr()->warning(trans('main_trans.Check_student'));
                return redirect()->back();
            }
        }else{
            toastr()->warning(trans('main_trans.Active_M'));
            return redirect()->back();
        }

    }

    public function store($request)
    {

        try {
            foreach ($request->attendences as $studentid => $attendance) {

                if( $attendance == 'presence' ) {
                    $attendance_status = true;
                } else if( $attendance == 'absent' ){
                    $attendance_status = false;
                }

                Attendance::create([
                    'student_id'=> $studentid,
                    'grade_id'=> $request->grade_id,
                    'classroom_id'=> $request->classroom_id,
                    'section_id'=> $request->section_id,
                    'teacher_id'=> 1,
                    'attendance_date'=> date('Y-m-d'),
                    'attendance_status'=> $attendance_status,
                ]);

            }

            toastr()->success(trans('main_trans.success'));
            return redirect()->back();

        } catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function edit($id)
    {
        $sections = DB::table('sections')->where('id', '=', $id)->get();

        if($sections->first()->Status === 1){
            $students = Student::with('attendance')->where('section_id',$id)->get();
            $attendances =  Attendance::all();
            if($students->count() > 0){
                return view('Pages/Attendance/edit',compact('students', 'attendances'));
            }else{
                toastr()->warning(trans('main_trans.Check_student'));
                return redirect()->back();
            }
        }else{
            toastr()->warning(trans('main_trans.Active_M'));
            return redirect()->back();
        }
    }

    public function update($request)
    {
        //update statues
        if(isset($request->attendances)) {
            if($request->attendances == 'presence'){
                $statues = 1;
            }else if($request->attendances == 'absent'){
                $statues = 0;
            }
        }

        try {
            $Attendances = Attendance::findOrFail($request->id);
            $Attendances->student_id = $request->student_id;
            $Attendances->grade_id = $request->grade_id;
            $Attendances->classroom_id = $request->classroom_id;
            $Attendances->section_id = $request->section_id;
            $Attendances->teacher_id = 1;
            $Attendances->attendance_date = date('Y-m-d');
            $Attendances->attendance_status = $statues;
            $Attendances->save();

            toastr()->success(trans('main_trans.success'));
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }


//    public function Filter_date($request)
//    {
//        $students = Student::with('attendance')->where('section_id',$request->section_id)->get();
//        $Search = Attendance::select('*')->where('attendance_date','=',$request->date)->get();
//        $attendances =  Attendance::all();
//
//        return view('Pages/Attendance/edit',compact('students', 'attendances'))->withDetails($Search);
//
//    }
}
