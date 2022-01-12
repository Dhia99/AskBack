<?php

namespace App\Http\Controllers;

use App\Models\operation;
use Illuminate\Http\Request;

class operationController extends Controller
{
    public function getoperations(){
        return response()->json(operation::all(), 200);
    }
    public function getoperationById($id){
        $operation = operation::find($id);
        if(is_null($operation)){
            return response()->json(['message'=>'operation Not Found'],404);
        }
        return response()->json($operation, 200);
    }
    public function Addoperation(Request $request){
        $operation = operation::create($request->all());
        return response($operation,200);
    }
    public function updateoperation(Request $request,$id){
        $operation = operation::find($id);
        if(is_null($operation)){
            return response()->json(['message'=>'operation Not Found'],404);
        }
        $operation->update($request->all());
        return response()->json($operation, 200);
    }
    public function deleteoperation(Request $request,$id){
        $operation = operation::find($id);
        if(is_null($operation)){
            return response()->json(['message'=>'operation Not Found'],404);
        }
        $operation->delete();
        return response()->json(null, 204);
    }
}
