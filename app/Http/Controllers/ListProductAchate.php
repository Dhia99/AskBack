<?php

namespace App\Http\Controllers;
use App\Models\ListProductAchat;
use Illuminate\Http\Request;

class ListProductAchate extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $facture = ListProductAchat::all();
        return response()->json(
            $facture
        , 200);
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
        $facture = new ListProductAchat();
        $facture->id_product = $request->id_product;
        $facture->quantite = $request->quantite;
        $facture->save();
        return response()->json('List saved');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListProductAchat  $listProductAchat
     * @return \Illuminate\Http\Response
     */
    public function show(ListProductAchat $listProductAchat)
    {
       //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListProductAchat  $listProductAchat
     * @return \Illuminate\Http\Response
     */
    public function edit(ListProductAchat $listProductAchat)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListProductAchat  $listProductAchat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListProductAchat $id)
    {
        //
        $facture = ListProductAchat::find($id);
        $facture->id_product = $request->id_product;
        $facture->quantite = $request->quantite;
        $facture->save();
        return response()->json('List saved');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListProductAchat  $listProductAchat
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $facture = ListProductAchat::find($id);
        $facture->delete();
        return response()->json('deleted');
    }
}
