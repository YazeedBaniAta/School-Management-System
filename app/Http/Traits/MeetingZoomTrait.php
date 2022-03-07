<?php


namespace App\Http\Traits;


use MacsiDigital\Zoom\Facades\Zoom;

trait MeetingZoomTrait
{
    public function CreateMeeting($request){
        $user = Zoom::user()->first();

        $meetingData = [
            'topic' => $request->topic,
            'duration' => $request->duration,
            'password' => $request->password,
            'start_time' => $request->start_time, // best to use a Carbon instance here.
            'timezone' => config('zoom.timezone'),
        ];

        $meeting = Zoom::meeting()->make($meetingData);

        $meeting->settings()->make([
            'join_before_host' => false,
            'host_video'=>false,
            'enforce_login' => false,
            'waiting_room' => true,
        ]);

        return $user->meetings()->save($meeting);
    }

}
