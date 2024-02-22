<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function default(){
        $schools = School::all();

        return view('students.default',[
            'title' => "Default",
            'schools' => $schools,
        ]);
    }

    public function index($schoolId){
        return view('students.index',[
            'title' => 'List of Students',
            'id' => $schoolId,
        ]);
    }

    public function create($schoolId){
        return view('students.create',[
            'title' => 'Create Student',
        ]);
    }
}
