<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\client;
use App\Models\devis;
use App\Models\product;
use App\Models\ListProductvente;
class devisController extends Controller
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
        $devis = devis::all();
        return response()->json(
            $devis,
            200
        );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $devis = new devis();
        $devis->id_client = $request->id_client;
        $devis->Ref_Facture = $request->Ref_Facture;
        $devis->Montant_TTC = $request->Montant_TTC;
        $devis->Montant_TVA = $request->Montant_TVA;
        $devis->Total_HT = $request->Total_HT;
        // $facture->quantite_entre = $request->quantite_entre;
        $devis->Nom_client = $request->Nom_client;
        $devis->note = $request->note;
        $devis->Timbre_fiscale = $request->Timbre_fiscale;
        // $facture->Libelle = $request->Libelle;
        $devis->date_creation = $request->date_creation;
        // $facture->Taxe_Applique = $request->Taxe_Applique;
        // $facture->ListProduct = $request->ListProduct;
/*         $facture->ListProduct = []; */
            $devis->save();
            foreach ($request->ListProduct as $prod) {
            $listproduct = new ListProductvente();
            $listproduct->quantite=$prod["quantite"];
            $listproduct->Libelle=$prod["Libelle"];
            $listproduct->id_product=$prod["id_product"];
            $listproduct->id_facture=$devis->id;
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
        $devis = devis::find($id);
        return response()->json($devis);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $devis = devis::find($id);
        return response()->json($devis);
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
        $devis = devis::find($id);
        $devis->id_client = $request->id_client;
        $devis->Ref_Facture = $request->Ref_Facture;
        $devis->id_product = $request->id_product;
        $devis->Montant_TTC = $request->Montant_TTC;
        $devis->Montant_TVA = $request->Montant_TVA;
        $devis->Total_HT = $request->Total_HT;
        $devis->quantite_entre = $request->quantite_entre;
        $devis->Nom_client = $request->Nom_client;
        $devis->note = $request->note;
        $devis->Timbre_fiscale = $request->Timbre_fiscale;
        $devis->Libelle = $request->Libelle;
        $devis->date_creation = $request->date_creation;
        $devis->Taxe_Applique = $request->Taxe_Applique;
        $devis->save();
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
        $devis= devis::find($id);
        $devis->delete();
        return response()->json('deleted');
    }
    public function nombredevis(){
        return response()->json(devis::count(), 200);
    }
}
