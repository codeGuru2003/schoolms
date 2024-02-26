<?php

namespace App\Http\Controllers;

use App\Models\AcademicClass;
use App\Models\Gender;
use App\Models\School;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\User;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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
        $students = Student::with([
            'user',
            'gender',
            'studentclasses' => function ($query) {
                $query->with('class');
            },
        ])->where('school_id',$schoolId)->get();
        return view('students.index',[
            'title' => 'List of Students',
            'id' => $schoolId,
            'students' => $students,
        ]);
    }

    public function create($schoolId){
        $genders = Gender::pluck('name','id');
        $classes = AcademicClass::pluck('name','id');
        return view('students.create',compact('genders','classes'),[
            'title' => 'Create Student',
            'schoolId' => $schoolId,
        ]);
    }

    public function store($schoolId, Request $request){
        try {

            $studentId = $this->generateUniqueCode($schoolId);

            $path = $request->file('userImage')->store('images', 'public');

            $studentUser = User::create([
                'role_id' => 6,
                'name' => $request->firstname . ' ' . $request->middlename . ' '. $request->lastname,
                'email' => $request->email_address,
                'password' => Hash::make($studentId),
                'image' => $path,
                'login_hint' => $studentId,
            ]);


            $studentId = $this->generateUniqueCode($schoolId);
            $isActive = $request->has('is_active');

            $newStudent = Student::create([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'school_id' => $schoolId,
                'student_id' => $studentId,
                'date_of_birth' => $request->date_of_birth,
                'placeofbirth' => $request->placeofbirth,
                'contact' => $request->contact,
                'email_address' => $request->email_address,
                'current_address' => $request->current_address,
                'emergency_contact_person' => $request->emergency_contact_person,
                'emergency_contact_number' => $request->emergency_contact_number,
                'relationship' => $request->relationship,
                'user_id' => $studentUser->id,
                'gender_id' => $request->gender_id,
                'is_active' => $isActive,
                'created_by' => Auth::user()->name,
            ]);

            $currentYear = Year::where('is_active',true)->first();

            StudentClass::create([
                'student_id' => $newStudent->id,
                'class_id' => $request->class_id,
                'year_id' => $currentYear->id,
                'is_active' => true,
            ]);
            //return Redirect::route('students.details', ['schoolId' => $schoolId , 'id' => $newStudent->id ])->with('msg','Student created successfully');
            return Redirect::route('students.index', ['schoolId' => $schoolId ])->with('msg','Student created successfully');

        } catch (\Exception $ex) {
            return Redirect::route('students.create', ['schoolId' => $schoolId ])->with('error','Error: '. $ex->getMessage());
        }
    }

    public function details($schoolId,$id){

        $student = Student::with([
            'user',
            'gender',
            'studentclasses' => function ($query) {
                $query->with('class');
            },
        ])->where('id','=',$id)->first();
        $classes = AcademicClass::pluck('name','id');
        $genders = Gender::pluck('name','id');

        return view('students.details', compact('genders','classes'),[
            'title' => 'Student Details',
            'student' => $student,
        ]);

    }

    public function edit($schoolId, $id){
        $student = Student::with([
            'user',
            'gender',
            'studentclasses' => function ($query) {
                $query->with('class');
            },
        ])->where('id','=',$id)->first();

        $classes = AcademicClass::pluck('name','id');
        $genders = Gender::pluck('name','id');

        return view('students.edit', compact('genders','classes'),[
            'title' => 'Student Details',
            'student' => $student,
        ]);
    }

    public function update($schoolId, $id, Request $request){

    }

    public function destroy($schoolId, $id){

    }

    public function updateImage($schoolId, $id, Request $request){

    }

    public function generateUniqueCode($schoolId){
        $currentYear = date('Y');
        $randomNumber = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

        $school = School::find($schoolId);
        $code = "{$school->code}{$currentYear}{$randomNumber}";

        $existingCode = Student::where('school_id', $code)->first();
        if ($existingCode) {
          return $this->generateUniqueCode($schoolId);
        }
        return $code;
    }
}
