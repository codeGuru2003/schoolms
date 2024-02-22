<?php

namespace App\Http\Controllers;

use App\Models\AcademicClass;
use App\Models\ClassSubject;
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

        $academicClasses = DB::table('academic_classes')
            ->join('level_types', 'academic_classes.level_types_id','=','level_types.id')
            ->join('sections','academic_classes.section_id','=','sections.id')
            ->select('academic_classes.*','level_types.name as lname','sections.name as sname')
            ->get();

        //$academicClasses = AcademicClass::all();
        return view('academicclasses.index',[
            'title' => 'List of Classes',
            'academicClasses' => $academicClasses,
        ]);
    }

    public function create(){
        $levelTypes = LevelType::pluck('name', 'id');
        $sections = Section::pluck('name','id');
        return view('academicclasses.create',
            compact('levelTypes','sections'),
            [
                'title' => 'Create Academic Class',
            ]
        );
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'level_types_id' => 'required',
            'section_id' => 'required'
        ]);

        AcademicClass::create([
           'level_types_id' => $request->level_types_id,
           'section_id' => $request->section_id,
           'name' => $request->name,
           'created_by' => Auth::user()->name,
        ]);

        return redirect('/academicclasses')->with('msg','Record created successfully');
    }

    public function edit($id){
        $academicClass = AcademicClass::find($id);
        $levelTypes = LevelType::pluck('name', 'id');
        $sections = Section::pluck('name','id');
        return view('academicclasses.edit',
            compact('levelTypes','sections'),
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

        $classSubjects = ClassSubject::where('academic_class_id', $id)->with('faculty')->with('subject')->get();
        $subjects = Subject::pluck('name','id');
        $faculties = Faculty::all();

        return view('academicclasses.details',
            compact('levelTypes','sections','subjects','faculties'),
            [
                'title' => 'Academic Class Details',
                'academicClass' => $academicClass,
                'classSubjects' => $classSubjects,
            ]
        );
    }

    public function destroy($id){
        $academicClass = AcademicClass::find($id);
        $academicClass->delete();
        return redirect('/academicclasses')->with('msg','Record deleted successfully');
    }
}
