<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\interfaces\ProcessingFeesRepositoryInterface;
use Illuminate\Http\Request;

class ProcessingFeesController extends Controller
{
    protected $ProcessingFess;

    public function __construct(ProcessingFeesRepositoryInterface $processingFess)
    {
        $this->ProcessingFess = $processingFess;
    }

    public function index()
    {
        return $this->ProcessingFess->index();
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
        return $this->ProcessingFess->store($request);
    }


    public function show($id)
    {
        return $this->ProcessingFess->show($id);
    }


    public function edit($id)
    {
        return $this->ProcessingFess->edit($id);
    }


    public function update(Request $request)
    {
        return $this->ProcessingFess->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->ProcessingFess->destroy($request);
    }
}
