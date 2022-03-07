<?php


namespace App\Repository\TheClasses;


use App\Models\Fees;
use App\Models\Fees_invoices;
use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentFinancialAccounts;
use App\Repository\interfaces\FeesInvoicesRepositoryInterface;
use Illuminate\Support\Facades\DB;

class FeesInvoicesRepository implements FeesInvoicesRepositoryInterface{

    public function index()
    {
        $Fee_invoices = Fees_invoices::all();
        $Grades = Grade::all();
        return view('Pages/Fees_Invoices/index',compact('Fee_invoices','Grades'));
    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        $fees = Fees::where('Classroom_id',$student->Classroom_id)->get();
        return view('Pages/Fees_Invoices/add',compact('student','fees'));
    }

    public function edit($id)
    {
        $fee_invoices = Fees_invoices::findorfail($id);
        $fees = Fees::where('Classroom_id',$fee_invoices->Classroom_id)->get();
        return view('Pages/Fees_Invoices/edit',compact('fee_invoices','fees'));
    }

    public function store($request)
    {
        $List_Fees = $request->List_Fees;

        DB::beginTransaction();

        try {

            foreach ($List_Fees as $List_Fee) {
                // حفظ البيانات في جدول فواتير الرسوم الدراسية
                $Fees = new Fees_invoices();
                $Fees->invoice_date = date('Y-m-d');
                $Fees->student_id = $List_Fee['student_id'];
                $Fees->Grade_id = $request->Grade_id;
                $Fees->Classroom_id = $request->Classroom_id;;
                $Fees->fees_id  = $List_Fee['fee_id'];
                $Fees->amount = $List_Fee['amount'];
                $Fees->description = $List_Fee['description'];
                $Fees->save();

                // حفظ البيانات في جدول حسابات الطلاب
                $StudentAccount = new StudentFinancialAccounts();
                $StudentAccount->date = date('Y-m-d');
                $StudentAccount->type = 'invoice';
                $StudentAccount->fee_invoice_id = $Fees->id;
                $StudentAccount->student_id = $List_Fee['student_id'];
                $StudentAccount->Debit = $List_Fee['amount'];
                $StudentAccount->credit = 0.00;
                $StudentAccount->description = $List_Fee['description'];
                $StudentAccount->save();
            }

            DB::commit();

            toastr()->success(trans('main_trans.success'));
            return redirect()->route('Fees_Invoices.index');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        DB::beginTransaction();
        try {
            // تعديل البيانات في جدول فواتير الرسوم الدراسية
            $Fees = Fees_invoices::findorfail($request->id);
            $Fees->fees_id = $request->fee_id;
            $Fees->amount = $request->amount;
            $Fees->description = $request->description;
            $Fees->save();

            // تعديل البيانات في جدول حسابات الطلاب
            $StudentAccount = StudentFinancialAccounts::where('fee_invoice_id',$request->id)->first();
            $StudentAccount->Debit = $request->amount;
            $StudentAccount->description = $request->description;
            $StudentAccount->save();
            DB::commit();

            toastr()->success(trans('main_trans.Update'));
            return redirect()->route('Fees_Invoices.index');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Fees_invoices::destroy($request->id);
            toastr()->success(trans('main_trans.Delete_M'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
