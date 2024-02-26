<?php

namespace App\Http\Controllers;

use App\Models\AcademicClass;
use App\Models\ClassBill;
use App\Models\ClassSubject;
use App\Models\CurrencyType;
use App\Models\Faculty;
use App\Models\LevelType;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AcademicClassController extends Controller
{
    public function index(){

        $academicClasses = AcademicClass::with('faculty')->with('section')->with('leveltype')->get();
        return view('academicclasses.index',[
            'title' => 'List of Classes',
            'academicClasses' => $academicClasses,
        ]);
    }

    public function create(){
        $levelTypes = LevelType::pluck('name', 'id');
        $sections = Section::pluck('name','id');
        $faculties = Faculty::all();
        return view('academicclasses.create',
            compact('levelTypes','sections','faculties'),
            [
                'title' => 'Create Academic Class',
            ]
        );
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'level_types_id' => 'required',
            'section_id' => 'required',
            'sponsor_id' => 'required',
        ]);

        AcademicClass::create([
           'level_types_id' => $request->level_types_id,
           'section_id' => $request->section_id,
           'name' => $request->name,
           'sponsor_id' => $request->sponsor_id,
           'created_by' => Auth::user()->name,
        ]);

        return redirect('/academicclasses')->with('msg','Record created successfully');
    }

    public function edit($id){
        $academicClass = AcademicClass::find($id);
        $levelTypes = LevelType::pluck('name', 'id');
        $sections = Section::pluck('name','id');
        $faculties = Faculty::all();
        return view('academicclasses.edit',
            compact('levelTypes','sections','faculties'),
            [
                'title' => 'Edit Academic Class',
                'academicClass' => $academicClass,
            ]
        );
    }

    public function update($id, Request $request){
        $academicClass = AcademicClass::find($id);
        $academicClass->level_types_id = $request->level_types_id;
        $academicClass->section_id = $request->section_id;
        $academicClass->name = $request->name;
        $academicClass->save();

        return redirect('/academicclasses')->with('msg','Record updated successfully');
    }

    public function details($id){
        $academicClass = AcademicClass::find($id);

        $levelTypes = LevelType::pluck('name', 'id');

        $sections = Section::pluck('name','id');

        $currencies = CurrencyType::pluck('code','id');

        $classSubjects = ClassSubject::where('academic_class_id', $id)->with('faculty')->with('subject')->get();

        $classBills = ClassBill::where('academic_class_id', $id)->with('currency')->get();

        $subjects = Subject::pluck('name','id');

        $faculties = Faculty::where('is_active', true)->get();

        return view('academicclasses.details',
            compact('levelTypes','sections','subjects','faculties','currencies'),
            [
                'title' => 'Academic Class Details',
                'academicClass' => $academicClass,
                'classSubjects' => $classSubjects,
                'classBills' => $classBills,
            ]
        );
    }

    public function destroy($id){
        $academicClass = AcademicClass::find($id);
        $academicClass->delete();
        return redirect('/academicclasses')->with('msg','Record deleted successfully');
    }
}
