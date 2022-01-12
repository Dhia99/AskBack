<?php
namespace App\Http\Controllers;
use App\Models\ListProductvente;
use Illuminate\Http\Request;

class ListProductvante extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $facture = ListProductvente::all();
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
    {}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $facture = new ListProductvente();
        $facture->id_product = $request->id_product;
        $facture->quantite = $request->quantite;
        $facture->save();
        return response()->json('List saved');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListProductvente  $listProductAchat
     * @return \Illuminate\Http\Response
     */
    public function show(ListProductvente $listProductvente)
    {}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListProductvente  $listProductAchat
     * @return \Illuminate\Http\Response
     */
    public function edit(ListProductvente $listProductvente)
    {}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListProductvente  $listProductvente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListProductvente $id)
    {
        //
        $facture = ListProductvente::find($id);
        $facture->id_product = $request->id_product;
        $facture->quantite = $request->quantite;
        $facture->save();
        return response()->json('List saved');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListProducvente  $listProductvente
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $facture = ListProductvente::find($id);
        $facture->delete();
        return response()->json('deleted');
    }
}
