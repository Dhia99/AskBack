<?php

namespace App\Http\Controllers;
use App\Models\paiement;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class paiementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paiement = paiement::all();
        return response()->json(
            $paiement
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
        $paiement = new paiement();
        $paiement->reste = $request->reste;
        $paiement->paye = $request->paye;
        $paiement->fournisseur = $request->fournisseur;
        $paiement->reffact = $request->reffact;
        $paiement->date_reglement = $request->date_reglement;
        $paiement->date_echenace = $request->date_echenace;
        $paiement->id_facture = $request->id_facture;

        $paiement->save();
        return response()->json('List saved');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    $k = paiement::select('id')->where('id_facture',$id);
    $paiement = paiement::find($k);
    return response()->json($paiement);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function edit(paiement $paiement)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $paiement = paiement::find($id);
        $paiement->reste = $request->reste;
        $paiement->paye = $request->paye;
        $paiement->fournisseur = $request->fournisseur;
        $paiement->reffact = $request->reffact;
        $paiement->date_reglement = $request->date_reglement;
        $paiement->date_echenace = $request->date_echenace;
        $paiement->save();
        return response()->json('List saved');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $paiement = paiement::find($id);
        $paiement->delete();
        return response()->json('deleted');
    }



    public function getListPaiementOfFacture( $id)
    {
        //$paiements= paiement::all()->where('id_facture',$id);
       $pai= DB::table('paiements')->where('id_facture', $id)->get();

        //dd($paiements);
        //echo("eeee");
    return response()->json($pai,200);



    }


    public function calculResteEnRetard(){
       // $sommereste=DB::table('paiements')->where('date_echenace','>',Carbon::now());
       /*  echo($sommereste); */
    /*$sommereste= paiement::groupBy('id_facture')
   ->selectRaw('min(reste) as min, id_facture')
   ->get();*/

   $sommereste = DB::table('paiements')
            ->where('date_echenace','<',Carbon::now())
            ->selectRaw('min(reste) as min, id_facture')
            ->groupBy('id_facture')
            ->get();

            $sumRetard=0;

        //$lastone=$sommereste::groupBy('id_facture')->get();
        foreach ($sommereste as $element) {
            //echo($element->min);
            $sumRetard+=$element->min;
        }
        return response()->json(array(
            "sumRetard" => $sumRetard),200);
    }
}
