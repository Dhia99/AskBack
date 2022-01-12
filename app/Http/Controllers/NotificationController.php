<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



     public function notificationproduit(){
       
        
$product = DB::table('products')->where('Enstock','<',3)
->get();
$a=[];
foreach($product as $p){

    array_push($a,$p);

}

return response()->json($a,200);
   

    
    
}



public function notificationecheance(){
       
   $k= Carbon::now()->addDay(2)->format('Y-m-d');
   $z= Carbon::now()->format('Y-m-d');


    $facf = DB::table('facturefs')->where([
        ['Etat', '<>', 'payé'],
        ['date_echeance', '<=',$k],
        ['date_echeance', '>=',$z]

    ])
 
    ->get();
    $a=[];
    foreach($facf as $e){
    
        array_push($a,$e);
    
    }
     
    return response()->json($a,200);
       
    
        
        
    }



    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
