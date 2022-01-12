<?php

namespace App\Http\Controllers;

use App\Models\depense;
use Illuminate\Http\Request;

class depenseController extends Controller
{
    public function getdepenses(){
        return response()->json(depense::all(), 200);
    }
    public function getdepenseById($id){
        $depense = depense::find($id);
        if(is_null($depense)){
            return response()->json(['message'=>'depense Not Found'],404);
        }
        return response()->json($depense, 200);
    }
    public function Adddepense(Request $request){
        $depense = depense::create($request->all());
        return response($depense,201);
    }
    public function updatedepense(Request $request,$id){
        $depense = depense::find($id);
        if(is_null($depense)){
            return response()->json(['message'=>'depense Not Found'],404);
        }
        $depense->update($request->all());
        return response()->json($depense, 200);
    }
    public function deletedepense(Request $request,$id){
        $depense = depense::find($id);
        if(is_null($depense)){
            return response()->json(['message'=>'depense Not Found'],404);
        }
        $depense->delete();
        return response()->json(null, 204);
    }
}
