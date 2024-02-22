<?php

namespace App\Http\Controllers;

use App\Models\ClassSubject;
use App\Models\Faculty;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassSubjectController extends Controller
{
    public function index(){
        return view('classsubjects.index',[
            'title' => 'Class Subjects',
        ]);
    }

    public function create($classId, Request $request){
        try {

            $existingClassSubject = DB::table('class_subjects')
               ->whereRaw('academic_class_id = ? AND subject_id = ?', [$classId, $request->subject_id])
               ->exists();

               if ($existingClassSubject) {
                throw new Exception('Subject already assigned to this class.');
            }

            ClassSubject::create([
                'faculty_id' => $request->faculty_id,
                'academic_class_id' => $classId,
                'subject_id' => $request->subject_id,
                'is_active' => false
            ]);

            return back()->with('msg', 'Class subject added successfully');
        } catch (\Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }

    public function edit($classId, $id){
        $classSubject = ClassSubject::where('id', $id)->with('faculty')->with('subject')->first();
        $subjects = Subject::pluck('name', 'id');
        $faculties = Faculty::all();
        return view('classsubjects.edit',compact('subjects','faculties'),[
            'classSubject' => $classSubject,
            'classId' => $classId,
            'title' => 'Edit Class Subject',
        ]);
    }


}
