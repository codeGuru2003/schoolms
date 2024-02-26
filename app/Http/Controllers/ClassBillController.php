<?php

namespace App\Http\Controllers;

use App\Models\ClassBill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ClassBillController extends Controller
{
    public function create($classId, Request $request){
        try {

            $isActive = request()->has('is_active');

            ClassBill::create([
                'academic_class_id' => $classId,
                'name' => $request->name,
                'currency_id' => $request->currency_id,
                'amount' => $request->amount,
                'is_active' => $isActive,
                'created_by' => Auth::user()->name,
            ]);

            return Redirect::route('academicclasses.details',['id' => $classId])->with('msg', 'Class bill created successfully');

        } catch (\Exception $ex) {
            return Redirect::route('academicclasses.details',['id' => $classId])->with('error', 'Error: ' . $ex->getMessage());
        }
    }
}
