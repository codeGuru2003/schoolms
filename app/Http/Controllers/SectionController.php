<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    //
    public function index(){
        $sections = Section::all();
        return view('sections.index',[
            'title' => 'List of Sections',
            'sections' => $sections
        ]);
    }

    public function create(){
        return view('sections.create',[
            'title' => 'Create Section',
        ]);
    }

    public function store(Request $request){

        Section::create([
            'name' =>$request->section_name,
            'created_by' => Auth::user()->name,
        ]);
        return redirect('/sections')->with('msg','Record created successfully');
    }

    public function edit($id){
        $section = Section::find($id);
        return view('sections.edit',[
            'title' => 'Edit Section',
            'section' => $section
        ]);
    }

    public function update($id, Request $request){
        $section = Section::find($id);
        $section->name = $request->section_name;
        $section->save();
        return redirect('/sections')->with('msg','Record updated successfully');
    }

    public function details($id){
        $section = Section::find($id);
        return view('sections.details',[
            'title' => 'Edit Section',
            'section' => $section
        ]);
    }

    public function delete($id){
        $section = Section::find($id);
        $section->delete();
        return redirect('/sections')->with('msg','Record deleted successfully');
    }
}
