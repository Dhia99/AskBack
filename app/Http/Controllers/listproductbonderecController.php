<?php

namespace App\Http\Controllers;

use App\Models\listproductbonderec;
use Illuminate\Http\Request;

class listproductbonderecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listproductbonderec = listproductbonderec::all();
        return response()->json(
            $listproductbonderec
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
        $listproductbonderec = new listproductbonderec();
        $listproductbonderec->id_product = $request->id_product;
        $listproductbonderec->quantite = $request->quantite;
        $listproductbonderec->save();
        return response()->json('List saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\listproductbonderec  $listproductbonderec
     * @return \Illuminate\Http\Response
     */
    public function show(listproductbonderec $listproductbonderec)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *  
     * @param  \App\Models\listproductbonderec  $listproductbonderec
     * @return \Illuminate\Http\Response
     */
    public function edit(listproductbonderec $listproductbonderec)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\listproductbonderec  $listproductbonderec
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $listproductbonderec = listproductbonderec::find($id);
        $listproductbonderec->id_product = $request->id_product;
        $listproductbonderec->quantite = $request->quantite;
        $listproductbonderec->save();
        return response()->json('listproductbonderec saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\listproductbonderec  $listproductbonderec
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listproductbonderec = listproductbonderec::find($id);
        $listproductbonderec->delete();
        return response()->json('deleted');
    }
}
