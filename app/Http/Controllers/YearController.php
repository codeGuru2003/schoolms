<?php

namespace App\Http\Controllers;

use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YearController extends Controller
{
    public function index(){

        $years = Year::all();

        return view('years.index',[
            'title' => 'List of Academic Years',
            'years' => $years,
        ]);
    }

    public function create(){
        return view('years.create', [
            'title' => 'Create Academic Year'
        ]);
    }

    public function store(Request $request){

        $existingActiveYear = Year::where('is_active', true)->first();
        $newYear = new Year();
        $newYear->name = $request->input('name');
        $newYear->startdate = $request->input('startdate');
        $newYear->enddate = $request->input('enddate');
        $newYear->created_by = Auth::user()->name;

        if (!$existingActiveYear) {
            $newYear->is_active = true;
            $newYear->save();
        }else{
            $newYear->is_active = false;
            $newYear->save();
        }

        return redirect('/years')->with('msg','Record created successfully');
    }

    public function edit($id){
        $year = Year::find($id);
        return view('years.edit',[
            'title' => 'Edit Year',
            'year' => $year,
        ]);
    }

    public function details($id){
        $year = Year::find($id);
        return view('years.details',[
            'title' => 'Year Details',
            'year' => $year,
        ]);
    }
}
