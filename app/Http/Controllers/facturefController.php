<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\facturef;
use App\Models\fournisseur;
use App\Models\ListProductAchat;
use App\Models\product;
class facturefController extends Controller
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

            $facturef = facturef::all();
            return response()->json(
                $facturef
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

        $facturef = new facturef();
        $facturef->id_fournisseur = $request->id_fournisseur;
        $facturef->Ref_Facture = $request->Ref_Facture;
        $facturef->Montant_TTC = $request->Montant_TTC;
        $facturef->Montant_TVA = $request->Montant_TVA;
        $facturef->Etat = $request->Etat;
        $facturef->Total_HT = $request->Total_HT;
        $facturef->date_echeance = $request->date_echeance;
        // $facture->quantite_entre = $request->quantite_entre;
        $facturef->Nom_fournisseur = $request->Nom_fournisseur;
        $facturef->note = $request->note;
        $facturef->Timbre_fiscale = $request->Timbre_fiscale;
        // $facture->Libelle = $request->Libelle;
        $facturef->date_creation = $request->date_creation;
        // $facture->Taxe_Applique = $request->Taxe_Applique;
        // $facture->ListProduct = $request->ListProduct;
/*         $facture->ListProduct = [];
 */
        $facturef->save();
                foreach ($request->ListProduct as $prod) {
            $listproduct = new ListProductAchat();
            $listproduct->quantite=$prod["quantite"];
            $listproduct->Libelle=$prod["Libelle"];
            $listproduct->id_product=$prod["id_product"];
            $listproduct->id_facture=$facturef->id;
           // dd($listproduct);
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
        $facturef = facturef::find($id);
        return response()->json($facturef);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facturef = facturef::find($id);
        return response()->json($facturef);
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
        $facturef = facturef::find($id);
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
        $facturef->id_fournisseur = $request->id_fournisseur;
        $facturef->Ref_Facture = $request->Ref_Facture;
        $facturef->Montant_TTC = $request->Montant_TTC;
        $facturef->Montant_TVA = $request->Montant_TVA;
        $facturef->Etat = $request->Etat;
        $facturef->Total_HT = $request->Total_HT;
        $facturef->date_echeance = $request->date_echeance;
        // $facture->quantite_entre = $request->quantite_entre;
        $facturef->Nom_fournisseur = $request->Nom_fournisseur;
        $facturef->note = $request->note;
        $facturef->Timbre_fiscale = $request->Timbre_fiscale;
        // $facture->Libelle = $request->Libelle;
        $facturef->date_creation = $request->date_creation;
        $facturef->save();
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
        $facturef = facturef::find($id);
        $facturef->delete();
        return response()->json('deleted');
    }

    public function nombrefacturef(){
        return response()->json(facturef::count(),200);
    }
}
