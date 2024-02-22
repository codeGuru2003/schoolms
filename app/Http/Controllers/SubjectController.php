<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{

    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index',[
            'title' => 'List of Subjects',
            'subjects' => $subjects,
        ]);
    }

    public function create(Request $request)
    {
        Subject::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => Auth::user()->name,
        ]);

        return redirect('/subjects')->with('msg','Record created successfully');
    }


    public function details($id)
    {
        $subject = Subject::find($id);
        return view('subjects.details',[
            'title' => 'Subject Details',
            'subject' => $subject,
        ]);
    }


    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('subjects.edit',[
            'title' => 'Edit Subject',
            'subject' => $subject,
        ]);
    }


    public function update($id, Request $request)
    {
        //
    }

    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect('/subjects')->with('msg','Record deleted successfully');
    }
}
