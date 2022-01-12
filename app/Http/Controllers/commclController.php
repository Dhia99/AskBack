<?php
namespace App\Http\Controllers;
use App\Models\client;
use App\Models\product;
use App\Models\commandeclients;
use App\Models\ListProductvente;
use Illuminate\Http\Request;
class commclController extends Controller
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

            $cmdcl = commandeclients::all();
            return response()->json(
                $cmdcl
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
        $cmdcl = new commandeclients();
        $cmdcl->id_client = $request->id_client;
        $cmdcl->Ref_Facture = $request->Ref_Facture;
        $cmdcl->Montant_TTC = $request->Montant_TTC;
        $cmdcl->Montant_TVA = $request->Montant_TVA;
        $cmdcl->Etat = $request->Etat;
        $cmdcl->Total_HT = $request->Total_HT;
        $cmdcl->date_echeance = $request->date_echeance;
        // $facture->quantite_entre = $request->quantite_entre;
        $cmdcl->Nom_client = $request->Nom_client;
        $cmdcl->note = $request->note;
        $cmdcl->Timbre_fiscale = $request->Timbre_fiscale;
        // $facture->Libelle = $request->Libelle;
        $cmdcl->date_creation = $request->date_creation;
        // $facture->Taxe_Applique = $request->Taxe_Applique;
        // $facture->ListProduct = $request->ListProduct;
/*         $facture->ListProduct = []; */
            $cmdcl->save();
            foreach ($request->ListProduct as $prod) {
            $listproduct = new ListProductvente();
            $listproduct->quantite=$prod["quantite"];
            $listproduct->Libelle=$prod["Libelle"];
            $listproduct->id_product=$prod["id_product"];
            $listproduct->id_facture=$cmdcl->id;
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
        $cmdcl = commandeclients::find($id);
        return response()->json($cmdcl);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cmdcl = commandeclients::find($id);
        return response()->json($cmdcl);
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
        $cmdcl = commandeclients::find($id);
        $cmdcl->id_client = $request->id_client;
        $cmdcl->Ref_Facture = $request->Ref_Facture;
        $cmdcl->id_product = $request->id_product;
        $cmdcl->Montant_TTC = $request->Montant_TTC;
        $cmdcl->Montant_TVA = $request->Montant_TVA;
        $cmdcl->Etat = $request->Etat;
        $cmdcl->Total_HT = $request->Total_HT;
        $cmdcl->date_echeance = $request->date_echeance;
        $cmdcl->quantite_entre = $request->quantite_entre;
        $cmdcl->Nom_client = $request->Nom_client;
        $cmdcl->note = $request->note;
        $cmdcl->Timbre_fiscale = $request->Timbre_fiscale;
        $cmdcl->Libelle = $request->Libelle;
        $cmdcl->date_creation = $request->date_creation;
        $cmdcl->Taxe_Applique = $request->Taxe_Applique;
        $cmdcl->save();
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
        $cmdcl = commandeclients::find($id);
        $cmdcl->delete();
        return response()->json('deleted');
    }
}

