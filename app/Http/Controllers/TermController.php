<?php

namespace App\Http\Controllers;

use App\Models\Term;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TermController extends Controller
{
    public function index(){
        $terms = Term::with('year')->get();
        return view('terms.index',compact('terms'),[
            'title' => 'List of Terms',
        ]);
    }

    public function create(){
        $years = Year::select('id', 'name', 'is_active')
            ->orderBy('is_active', 'desc') // Active year first
            ->orderBy('name') // Additional ordering if needed
            ->get();

        $options = [];

        foreach ($years as $year) {
            $label = $year->name . ($year->is_active ? ' (active)' : '');
            $options[$year->id] = $label;
        }

        $year = Year::all('name','id');
        return view('terms.create',compact('options'), [
            'title' => 'Create Term'
        ]);
    }

    public function store(Request $request){

        $existingTerm = Term::where('is_active', 'true')->first();

        $term = new Term();
        $term->name = $request->input('name');
        $term->year_id = $request->input('year_id');
        $term->startdate = $request->input('startdate');
        $term->enddate = $request->input('enddate');
        $term->created_by = Auth::user()->name;

        if (!$existingTerm) {

            $term->is_active = 1;
            $term->save();
            return redirect('/terms')->with('msg','Record created successfully');
        }
        else{

            $term->is_active = 0;
            $term->save();
            return redirect('/terms')->with('msg','Record created successfully');
        }

    }

    public function edit($id){
        $years = Year::pluck('name','id');
        $term = Term::find($id);
        return view('terms.edit',compact('years'),[
            'title' => 'Edit Term',
            'term' => $term,
        ]);
    }

    public function update($id, Request $request){

        $isActive = ($request->is_active ? '' : 0) || ($request->is_active);

        $existingTerm = Term::where('is_active', true)->first();

        if ($existingTerm) {
            $existingTerm->is_active = false;
            $existingTerm->save();
        }

        $term = Term::find($id);
        $term->name = $request->name;
        $term->year_id = $request->year_id;
        $term->startdate = $request->startdate;
        $term->enddate = $request->enddate;
        $term->is_active = $isActive;

        $term->save();

        return redirect('/terms')->with('msg','Record updated successfully');
    }

    public function details($id){

    }

    public function destroy($id){
        $term = Term::find($id);
        $term->delete();

        return redirect()->back()->with('msg','Record deleted successfully');
    }
}
