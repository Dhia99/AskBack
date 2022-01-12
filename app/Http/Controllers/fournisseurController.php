<?php
namespace App\Http\Controllers;
use App\Models\fournisseur;
use Illuminate\Http\Request;

class fournisseurController extends Controller
{
    public function getFournisseurs(){
        return response()->json(fournisseur::all(), 200);
    }
    public function getFournisseurById($id){
        $fournisseur = fournisseur::find($id);
        if(is_null($fournisseur)){
            return response()->json(['message'=>'Fournisseur Not Found'],404);
        }
        return response()->json($fournisseur, 200);
    }
    public function AddFournisseur(Request $request){
        $fournisseur = fournisseur::create($request->all());
        return response($fournisseur,201);
    }
    public function updateFournisseur(Request $request,$id){
        $fournisseur = fournisseur::find($id);
        if(is_null($fournisseur)){
            return response()->json(['message'=>'Fournisseur Not Found'],404);
        }
        $fournisseur->update($request->all());
        return response()->json($fournisseur, 200);
    }
    public function deleteFournisseur(Request $request,$id){
        $fournisseur = fournisseur::find($id);
        if(is_null($fournisseur)){
            return response()->json(['message'=>'Fournisseur Not Found'],404);
        }
        $fournisseur->delete();
        return response()->json(null, 204);
    }
    public function nombreFournisseur(){
        return response()->json(fournisseur::count(), 200);
    }

}
