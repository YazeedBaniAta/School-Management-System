<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\interfaces\ReceiptStudentsRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptStudentsController extends Controller
{
    protected $ReceiptStudents;
    public function __construct(ReceiptStudentsRepositoryInterface $ReceiptStudents)
    {
        $this->ReceiptStudents = $ReceiptStudents;
    }

    public function index()
    {
        return $this->ReceiptStudents->index();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->ReceiptStudents->store($request);
    }


    public function show($id)
    {
        return $this->ReceiptStudents->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->ReceiptStudents->edit($id);
    }


    public function update(Request $request)
    {
        return $this->ReceiptStudents->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->ReceiptStudents->destroy($request);
    }
}
