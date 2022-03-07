<?php

namespace App\Http\Controllers\Attendances;

use App\Http\Controllers\Controller;
use App\Repository\interfaces\AttendanceRepositoryInterface;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    protected $Attendance;
    public function __construct(AttendanceRepositoryInterface $attendance){
        $this->Attendance = $attendance;
    }

    public function index()
    {
        return $this->Attendance->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->Attendance->store($request);
    }


    public function show($id)
    {
        return $this->Attendance->show($id);
    }

    public function edit($id)
    {
        return $this->Attendance->edit($id);
    }

    public function update(Request $request)
    {
        return $this->Attendance->update($request);
    }

//    public function Filter_date(Request $request){
//        return $this->Attendance->Filter_date($request);
//    }


}
