<?php

namespace App\Http\Controllers;

use App\Models\LevelType;
use Illuminate\Http\Request;

class LevelTypeController extends Controller
{
    //
    public function index(){

        $leveltypes = LevelType::all();

        return view('leveltypes.index',[
            'title' => 'List of Level Types',
            'leveltypes' => $leveltypes,
        ]);
    }

    public function store(Request $request){

        $this->validate($request,[
            'name' => 'required',
        ]);

        LevelType::create([
            'name' => $request->name,
            'created_by' => 'system',
        ]);

        return redirect('/leveltypes')->with('msg','Record created successfully');
    }

    public function edit($id){
        $leveltype = LevelType::find($id);
        return view('leveltypes.edit',[
            'title' => 'Edit Level Type',
            'leveltype' => $leveltype
        ]);
    }

    public function update($id, Request $request){
        $leveltype = LevelType::find($id);
        $leveltype->name = $request->name;
        $leveltype->save();

        return redirect('/leveltypes')->with('msg','Record was updated successfully');
    }

    public function details($id){
        $leveltype = LevelType::find($id);
        return view('leveltypes.details',[
            'title' => 'Level Type Details ',
            'leveltype' => $leveltype
        ]);
    }
    public function delete($id){
        $section = LevelType::find($id);
        $section->delete();
        return redirect('/leveltypes')->with('msg','Record deleted successfully');
    }
}
