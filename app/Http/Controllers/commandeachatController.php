<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\commandeachat;
use App\Models\fournisseur;
use App\Models\ListProductAchat;
use App\Models\product;

class commandeachatController extends Controller
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
       // $Facture = Facture::with(relations:'getFournisseur')->get();
        //dd($Facture);

            $commandeachat = commandeachat::all();
            return response()->json(
                $commandeachat
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
        $commandeachat = new commandeachat();
        $commandeachat->id_fournisseur = $request->id_fournisseur;
        $commandeachat->Ref_Facture = $request->Ref_Facture;
        $commandeachat->Montant_TTC = $request->Montant_TTC;
        $commandeachat->Montant_TVA = $request->Montant_TVA;
        $commandeachat->Etat = $request->Etat;
        $commandeachat->Total_HT = $request->Total_HT;
        $commandeachat->date_echeance = $request->date_echeance;
        // $facture->quantite_entre = $request->quantite_entre;
        $commandeachat->Nom_fournisseur = $request->Nom_fournisseur;
        $commandeachat->note = $request->note;
        $commandeachat->Timbre_fiscale = $request->Timbre_fiscale;
        // $facture->Libelle = $request->Libelle;
        $commandeachat->date_creation = $request->date_creation;
        // $facture->Taxe_Applique = $request->Taxe_Applique;
        // $facture->ListProduct = $request->ListProduct;
/*         $facture->ListProduct = [];
 */
        $commandeachat->save();
        foreach ($request->ListProduct as $prod) {
            $listproduct = new ListProductAchat();
            $listproduct->quantite=$prod["quantite"];
            $listproduct->Libelle=$prod["Libelle"];
            $listproduct->id_product=$prod["id_product"];
            $listproduct->id_facture=$commandeachat->id;
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
        $commandeachat = commandeachat::find($id);
        return response()->json($commandeachat);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $commandeachat = commandeachat::find($id);
        return response()->json($commandeachat);
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
        $commandeachat = commandeachat::find($id);
        $commandeachat->id_fournisseur = $request->id_fournisseur;
        $commandeachat->Ref_Facture = $request->Ref_Facture;
        $commandeachat->id_product = $request->id_product;
        $commandeachat->Montant_TTC = $request->Montant_TTC;
        $commandeachat->Montant_TVA = $request->Montant_TVA;
        $commandeachat->Etat = $request->Etat;
        $commandeachat->Total_HT = $request->Total_HT;
        $commandeachat->date_echeance = $request->date_echeance;
        $commandeachat->quantite_entre = $request->quantite_entre;
        $commandeachat->Nom_fournisseur = $request->Nom_fournisseur;
        $commandeachat->note = $request->note;
        $commandeachat->Timbre_fiscale = $request->Timbre_fiscale;
        $commandeachat->Libelle = $request->Libelle;
        $commandeachat->date_creation = $request->date_creation;
        $commandeachat->Taxe_Applique = $request->Taxe_Applique;
        $commandeachat->save();
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
        $commandeachat = commandeachat::find($id);
        $commandeachat->delete();
        return response()->json('deleted');
    }

    public function nombrefacturef(){
        return response()->json(commandeachat::count(),200);
    }
}
