<?php


namespace App\Repository\TheClasses;



use App\Models\Fees;
use App\Models\Grade;
use App\Repository\interfaces\FeesRepositoryInterface;

class FeesRepository implements FeesRepositoryInterface
{

    public function index()
    {
        $fees = Fees::all();
        $Grades = Grade::all();
        return view('Pages/Fees/index',compact('fees','Grades'));
    }

    public function create()
    {
        $Grades = Grade::all();
        return view('pages/Fees/add',compact('Grades'));

    }

    public function edit($id)
    {
        $Grades = Grade::all();
        $fee = Fees::find($id);

        if($fee){
            return view('Pages/Fees/edit',compact('fee','Grades'));
        }else{
            return redirect()->back();
        }

    }

    public function store($request)
    {
        try {
            $fees = new Fees();
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount = $request->amount;
            $fees->Grade_id = $request->Grade_id;
            $fees->Classroom_id = $request->Classroom_id;
            $fees->description = $request->description;
            $fees->year = $request->year;
            $fees->Fees_type = $request->Fees_type;
            $fees->save();

            toastr()->success(trans('main_trans.success'));
            return redirect()->route('Fees.create');

        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function update($request)
    {
        try {
            $fees = Fees::findorfail($request->id);
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount = $request->amount;
            $fees->Grade_id = $request->Grade_id;
            $fees->Classroom_id = $request->Classroom_id;
            $fees->description = $request->description;
            $fees->year = $request->year;
            $fees->Fees_type = $request->Fees_type;
            $fees->save();

            toastr()->success(trans('main_trans.success'));
            return redirect()->route('Fees.index');

        }catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Fees::destroy($request->id);
            toastr()->success(trans('main_trans.Delete_M'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
