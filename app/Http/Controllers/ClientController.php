<?php
namespace App\Http\Controllers;
use App\Models\client;
use Illuminate\Http\Request;
class ClientController extends Controller
{
    public function getClients(){
        return response()->json(client::all(), 200);
    }
    public function getClientById($id){
        $client = client::find($id);
        if(is_null($client)){
            return response()->json(['message'=>'Client Not Found'],404);
        }
        return response()->json($client, 200);
    }
    public function AddClient(Request $request){
        $client = client::create($request->all());
        return response($client,201);
    }
    public function updateClient(Request $request,$id){
        $client = client::find($id);
        if(is_null($client)){
            return response()->json(['message'=>'Client Not Found'],404);
        }
        $client->update($request->all());
        return response()->json($client, 200);
    }
    public function deleteClient(Request $request,$id){
        $client = client::find($id);
        if(is_null($client)){
            return response()->json(['message'=>'Client Not Found'],404);
        }
        $client->delete();
        return response()->json(null, 204);
    }
    public function nombreclients(){
        return response()->json(client::count(), 200);
    }

}
