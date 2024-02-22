<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    //
    public function index(){
        $schools = School::all();
        return view('schools.index',[
            'title'=> ' School List',
            'schools' => $schools,
        ]);
    }

    public function create(Request $request){

        $path = $request->file('logo')->store('images','public');

        $school = new School([
            'longname' => $request->input('longname'),
            'code' => $request->input('code'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'logo' => $path,
            'created_by' => 'system',
        ]);

        $school->save();
        return redirect('/schools')->with('msg', 'Record saved successfully.');
    }

    public function edit($id){
        $school = School::find($id);
        return view('schools.edit',[
            'title' => 'Edit School',
            'school' => $school,
        ]);
    }

    public function details($id){
        $school = School::find($id);
        return view('schools.details',[
            'title' => 'School Details',
            'school' => $school,
        ]);
    }
}
