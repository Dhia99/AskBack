<?php

namespace App\Http\Controllers;
use App\Models\client;
use App\Models\product;
use App\Models\bonlivraison;
use App\Models\ListProductvente;
use Illuminate\Http\Request;

class bonlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function DetailsFournisseurs($id){
        $client = client::find($id);
        return response()->json($client);
    }
    public function DetailsProduits($id){
        $product = product::find($id);
        $List=[
            $product->name,
            $product->TVA,
            $product->pricev,
            $product->typetaxe
        ];
        return response()->json($List);
    }
    public function index()
    {
       // $Facture = Facture::with(relations:'getFournisseur')->get();
        //dd($Facture);

            $bonl = bonlivraison::all();
            return response()->json(
                $bonl
            , 200);

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
        $bonl = new bonlivraison();
        $bonl->id_client = $request->id_client;
        $bonl->Ref_Facture = $request->Ref_Facture;
        $bonl->Montant_TTC = $request->Montant_TTC;
        $bonl->Montant_TVA = $request->Montant_TVA;
        $bonl->Etat = $request->Etat;
        $bonl->Total_HT = $request->Total_HT;
        $bonl->date_echeance = $request->date_echeance;
        // $facture->quantite_entre = $request->quantite_entre;
        $bonl->Nom_client = $request->Nom_client;
        $bonl->note = $request->note;
        $bonl->Timbre_fiscale = $request->Timbre_fiscale;
        // $facture->Libelle = $request->Libelle;
        $bonl->date_creation = $request->date_creation;
        // $facture->Taxe_Applique = $request->Taxe_Applique;
        // $facture->ListProduct = $request->ListProduct;
/*         $facture->ListProduct = []; */
            $bonl->save();
            foreach ($request->ListProduct as $prod) {
            $listproduct = new ListProductvente();
            $listproduct->quantite=$prod["quantite"];
            $listproduct->Libelle=$prod["Libelle"];
            $listproduct->id_product=$prod["id_product"];
            $listproduct->id_facture=$bonl->id;
            $listproduct->save();
        }
        return response()->json('Facture saved');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bonl = bonlivraison::find($id);
        return response()->json($bonl);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bonl = bonlivraison::find($id);
        return response()->json($bonl);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bonl = bonlivraison::find($id);
        $bonl->id_client = $request->id_client;
        $bonl->Ref_Facture = $request->Ref_Facture;
        $bonl->id_product = $request->id_product;
        $bonl->Montant_TTC = $request->Montant_TTC;
        $bonl->Montant_TVA = $request->Montant_TVA;
        $bonl->Etat = $request->Etat;
        $bonl->Total_HT = $request->Total_HT;
        $bonl->date_echeance = $request->date_echeance;
        $bonl->quantite_entre = $request->quantite_entre;
        $bonl->Nom_client = $request->Nom_client;
        $bonl->note = $request->note;
        $bonl->Timbre_fiscale = $request->Timbre_fiscale;
        $bonl->Libelle = $request->Libelle;
        $bonl->date_creation = $request->date_creation;
        $bonl->Taxe_Applique = $request->Taxe_Applique;
        $bonl->save();
        return response()->json('Facture updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bonl = bonlivraison::find($id);
        $bonl->delete();
        return response()->json('deleted');
    }
}
