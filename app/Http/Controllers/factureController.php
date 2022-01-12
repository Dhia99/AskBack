<?php
namespace App\Http\Controllers;
use App\Models\client;
use App\Models\product;
use App\Models\facture;
use App\Models\ListProductvente;
use Illuminate\Http\Request;

class factureController extends Controller
{  /**
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

           $facture = facture::all();
           return response()->json(
               $facture
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
       $facture = new facture();
       $facture->id_client = $request->id_client;
       $facture->Ref_Facture = $request->Ref_Facture;
       $facture->Montant_TTC = $request->Montant_TTC;
       $facture->Montant_TVA = $request->Montant_TVA;
       $facture->Etat = $request->Etat;
       $facture->Total_HT = $request->Total_HT;
       $facture->date_echeance = $request->date_echeance;
       // $facture->quantite_entre = $request->quantite_entre;
       $facture->Nom_client = $request->Nom_client;
       $facture->note = $request->note;
       $facture->Timbre_fiscale = $request->Timbre_fiscale;
       // $facture->Libelle = $request->Libelle;
       $facture->date_creation = $request->date_creation;
       // $facture->Taxe_Applique = $request->Taxe_Applique;
       // $facture->ListProduct = $request->ListProduct;
/*         $facture->ListProduct = [];
*/
       $facture->save();
               foreach ($request->ListProductv as $prod) {
           $listproducts = new ListProductvente();
           $listproducts->quantite=$prod["quantite"];
           $listproducts->Libelle=$prod["Libelle"];
           $listproducts->id_product=$prod["id_product"];
           $listproducts->id_facture=$facture->id;
          // dd($listproduct);
           $listproducts->save();
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
       $facture = facture::find($id);
       return response()->json($facture);
   }
   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $facture = facture::find($id);
       return response()->json($facture);
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
       $facture = facture::find($id);
       /*$facturef->id_fournisseur = $request->id_fournisseur;
       $facturef->Ref_Facture = $request->Ref_Facture;
      // $facturef->id_product = $request->id_product;
       $facturef->Montant_TTC = $request->Montant_TTC;
       $facturef->Montant_TVA = $request->Montant_TVA;
       $facturef->Etat = $request->Etat;
       $facturef->Total_HT = $request->Total_HT;
       $facturef->date_echeance = $request->date_echeance;
       $facturef->quantite_entre = $request->quantite_entre;
       $facturef->Nom_fournisseur = $request->Nom_fournisseur;
       $facturef->note = $request->note;
       $facturef->Timbre_fiscale = $request->Timbre_fiscale;
       $facturef->Libelle = $request->Libelle;
       $facturef->date_creation = $request->date_creation;
       $facturef->Taxe_Applique = $request->Taxe_Applique;*/
       $facture->id_client= $request->id_client;
       $facture->Ref_Facture = $request->Ref_Facture;
       $facture->Montant_TTC = $request->Montant_TTC;
       $facture->Montant_TVA = $request->Montant_TVA;
       $facture->Etat = $request->Etat;
       $facture->Total_HT = $request->Total_HT;
       $facture->date_echeance = $request->date_echeance;
       // $facture->quantite_entre = $request->quantite_entre;
       $facture->Nom_client = $request->Nom_client;
       $facture->note = $request->note;
       $facture->Timbre_fiscale = $request->Timbre_fiscale;
       // $facture->Libelle = $request->Libelle;
       $facture->date_creation = $request->date_creation;
       $facture->save();
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
       $facture = facture::find($id);
       $facture->delete();
       return response()->json('deleted');
   }
   public function nombrefacturef(){
       return response()->json(facture::count(),200);
   }

}
