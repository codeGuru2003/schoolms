<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return redirect('/schools')->with('msg', 'School saved successfully.');
    }

    public function edit($id){
        $school = School::find($id);
        return view('schools.edit',[
            'title' => 'Edit School',
            'school' => $school,
        ]);
    }

    public function update($id, Request $request){
        $school = School::find($id);
        Storage::disk('public')->delete($school->logo);

        $newPath = $request->file('logo')->store('images','public');

        $school->longname = $request->input('longname');
        $school->code = $request->input('code');
        $school->email = $request->input('email');
        $school->contact = $request->input('contact');
        $school->logo = $newPath;

        $school->save();
        return redirect('/schools')->with('msg','School updated successfully');
    }

    public function details($id){
        $school = School::find($id);
        return view('schools.details',[
            'title' => 'School Details',
            'school' => $school,
        ]);
    }
}
