<?php

namespace App\Http\Controllers\OnlineClass;

use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;
use App\Models\Grade;
use App\Models\online_classe;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;

class OnlineClassController extends Controller
{

    use MeetingZoomTrait;

    public function index()
    {
        $online_classes = online_classe::all();
        return view('Pages.OnlineClasses.index',compact('online_classes'));
    }


    public function create()
    {
        $Grades = Grade::all();
        return view('Pages.OnlineClasses.add',compact('Grades'));
    }


    public function store(Request $request)
    {
        try {
            $meeting = $this->CreateMeeting($request);

            online_classe::create([
                'Grade_id' => $request->Grade_id,
                'Classroom_id' => $request->Classroom_id,
                'section_id' => $request->section_id,
                'user_id' => auth()->user()->id,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url
            ]);

            toastr()->success(trans('main_trans.success'));
            return redirect()->route('online_classes.index');

        }catch (\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Request $request)
    {
        $meeting = Zoom::meeting()->find($request->id);
        $meeting->delete();
        online_classe::where('meeting_id', $request->id)->delete();
        toastr()->success(trans('main_trans.Delete_M'));
        return redirect()->route('online_classes.index');
    }
}
