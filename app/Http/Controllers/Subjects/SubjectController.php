<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Repository\interfaces\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected $Subject;
    public function __construct(SubjectRepositoryInterface $subject){
        return $this->Subject = $subject;
    }

    public function index()
    {
        return $this->Subject->index();
    }


    public function create()
    {
        return $this->Subject->create();
    }


    public function store(SubjectRequest $request)
    {
        return $this->Subject->store($request);
    }


    public function edit($id)
    {
        return $this->Subject->edit($id);
    }


    public function update(SubjectRequest $request)
    {
        return $this->Subject->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->Subject->destroy($request);
    }
}
