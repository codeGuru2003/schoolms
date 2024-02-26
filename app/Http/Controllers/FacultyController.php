<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Gender;
use App\Models\MaritalStatus;
use App\Models\Position;
use App\Models\Role;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class FacultyController extends Controller
{
    public function index(){
        $faculties = Faculty::with('position')->with('gender')->with('maritalStatus')->with('user')->get();
        return view('faculties.index',[
            'title' => 'List of Faculty Members',
            'faculties' => $faculties,
        ]);
    }

    public function create(){
        $postions = Position::pluck('name','id');
        $genders = Gender::pluck('name','id');
        $maritalstatuses = MaritalStatus::pluck('name','id');
        $roles = Role::pluck('name','id');
        return view('faculties.create',[
            'title' => 'Create Faculty Member',
            'positions' => $postions,
            'genders' => $genders,
            'maritalstatuses' => $maritalstatuses,
            'roles' => $roles,
        ]);
    }

    public function store(Request $request){

        try {
            $path = $request->file('userImage')->store('images', 'public');

            $facultyUser = User::create([
                'role_id' => $request->role_id,
                'name' => $request->firstname . ' ' . $request->middlename . ' '. $request->lastname,
                'email' => $request->email_address,
                'password' => Hash::make('P@55w0rdRACE'),
                'image' => $path,
                'login_hint' => 'P@55w0rdRACE',
            ]);

            Faculty::create([
                'firstname' => $request->firstname,
                'middlename' => $request->middlename,
                'lastname' => $request->lastname,
                'user_id' => $facultyUser->id,
                'date_of_birth' => $request->date_of_birth,
                'placeofbirth'=> $request->placeofbirth,
                'contact' => $request->contact,
                'email_address' => $request->email_address,
                'current_address' => $request->current_address,
                'year_of_employment' => $request->year_of_employment,
                'qualifications' => $request->qualifications,
                'is_active' => false,
                'emergency_contact_person' => $request->emergency_contact_person,
                'emergency_contact_number' => $request->emergency_contact_number,
                'relationship' => $request->relationship,
                'position_id' => $request->position_id,
                'marital_status_id' => $request->marital_status_id,
                'gender_id' => $request->gender_id,
                'created_by' => Auth::user()->name,
            ]);

            return redirect('/faculties')->with('msg','Faculty member created successfully');

        } catch (\Exception $ex) {
            // Log the exception message for debugging
            logger()->error($ex->getMessage() . "\n" . $ex->getTraceAsString());

            // Provide a user-friendly error message based on exception type
            $errorMessage = 'An error occurred while creating the faculty member. Please try again.';
            if ($ex instanceof UniqueConstraintViolationException) {
                $errorMessage = 'That email address is already in use.';
            } else if ($ex instanceof ValidationException) {
                $errorMessage = 'Please ensure all fields are filled correctly.';
            }

            // Redirect back with error message
            return redirect()->back()->with('error', $errorMessage);
        }

    }

    public function edit($id){
        $faculty = Faculty::find($id);
        $positions = Position::pluck('name','id');
        $genders = Gender::pluck('name','id');
        $maritalstatuses = MaritalStatus::pluck('name','id');
        $roles = Role::pluck('name','id');

        $user = User::find($faculty->user_id);

        return view('faculties.edit',compact('positions','genders','maritalstatuses','roles'),[
            'title' => 'Edit Faculty',
            'faculty' => $faculty,
            'user' => $user,
        ]);
    }

    public function update($id, Request $request){

    }

    public function updateImage($id, Request $request){
        try {
            $faculty = Faculty::find($id);
            $user = User::find($faculty->user_id);
            Storage::disk('public')->delete($user->image);
            $newPath = $request->file('image')->store('images','public');
            $user->image = $newPath;
            $user->save();

            return Redirect::route('faculties.edit', ['id' => $id])->with('msg','Faculty Image updated successfully');

        } catch (\Exception $ex) {
            return back()->with('error', 'Error: '. $ex->getMessage());
        }
    }

    public function details($id){
        $faculty = Faculty::find($id);
        $positions = Position::pluck('name','id');
        $genders = Gender::pluck('name','id');
        $maritalstatuses = MaritalStatus::pluck('name','id');
        $roles = Role::pluck('name','id');

        $user = User::find($faculty->user_id);

        return view('faculties.details',compact('positions','genders','maritalstatuses','roles'),[
            'title' => 'Faculty Details',
            'faculty' => $faculty,
            'user' => $user,
        ]);
    }

    public function downloadPDF(){
        $data = Faculty::with('position')->with('gender')->with('maritalStatus')->with('user')->get();
        $pdf = PDF::loadView('reports.faculty.info', $data);
        return $pdf->download('pdf_file.pdf');
    }
}
