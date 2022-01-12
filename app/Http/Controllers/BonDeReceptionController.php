<?php

namespace App\Http\Controllers;

use App\Models\bondereception;
use App\Models\fournisseur;
use App\Models\listproductbonderec;
use App\Models\product;
use Illuminate\Http\Request;

class BonDeReceptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function DetailsFournisseurs($id){
        $fournisseur = fournisseur::find($id);
        return response()->json($fournisseur);
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
        $facturef = bondereception::all();
        return response()->json(
            $facturef
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
        $bondereception = new bondereception();
        $bondereception->id_fournisseur = $request->id_fournisseur;
        $bondereception->Ref_Facture = $request->Ref_Facture;
        $bondereception->Montant_TTC = $request->Montant_TTC;
        $bondereception->Montant_TVA = $request->Montant_TVA;
        $bondereception->Etat = $request->Etat;
        $bondereception->Total_HT = $request->Total_HT;
        $bondereception->date_echeance = $request->date_echeance;
        // $facture->quantite_entre = $request->quantite_entre;
        $bondereception->Nom_fournisseur = $request->Nom_fournisseur;
        $bondereception->note = $request->note;
        $bondereception->Timbre_fiscale = $request->Timbre_fiscale;
        // $facture->Libelle = $request->Libelle;
        $bondereception->date_creation = $request->date_creation;
        $bondereception->save();
        foreach ($request->Listproduct as $prod) {
            $listproduct = new listproductbonderec();
            $listproduct->quantite=$prod["quantite"];
            $listproduct->Libelle=$prod["Libelle"];
            $listproduct->id_product=$prod["id_product"];
            $listproduct->id_facture=$bondereception->id;
            $listproduct->save();
        }
        return response()->json('Facture saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bondereception  $bondereception
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bondereception = bondereception::find($id);
        return response()->json($bondereception);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bondereception  $bondereception
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $bondereception = bondereception::find($id);

        return response()->json($bondereception);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bondereception  $bondereception
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $bondereception = bondereception::find($id);
        $bondereception->id_fournisseur = $request->id_fournisseur;
        $bondereception->Ref_Facture = $request->Ref_Facture;
        $bondereception->id_product = $request->id_product;
        $bondereception->Montant_TTC = $request->Montant_TTC;
        $bondereception->Montant_TVA = $request->Montant_TVA;
        $bondereception->Etat = $request->Etat;
        $bondereception->Total_HT = $request->Total_HT;
        $bondereception->date_echeance = $request->date_echeance;
        $bondereception->quantite_entre = $request->quantite_entre;
        $bondereception->Nom_fournisseur = $request->Nom_fournisseur;
        $bondereception->note = $request->note;
        $bondereception->Timbre_fiscale = $request->Timbre_fiscale;
        $bondereception->Libelle = $request->Libelle;
        $bondereception->date_creation = $request->date_creation;
        $bondereception->Taxe_Applique = $request->Taxe_Applique;
        $bondereception->save();
        return response()->json('Facture updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bondereception  $bondereception
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bondereception = bondereception::find($id);
        $bondereception->delete();
        return response()->json('deleted');
    }
}
