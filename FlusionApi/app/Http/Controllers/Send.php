<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SendFlux;

class Send extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['status'=>'ok','data'=>SendFlux::all()], 200);
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
      $flux = new SendFlux;

      $flux->IDF = $request->IDF;
      $flux->Demande = $request->Demande;
      $flux->Demandeur = $request->Demandeur;
      $flux->Environnement = $request->Environnement;
      $flux->Serveur = $request->Serveur;
      $flux->Pivot = $request->Pivot;
      $flux->Libelle_Flux = $request->Libelle_Flux;
      $flux->Repertoire = $request->Repertoire;
      $flux->Fichier = $request->Fichier;
      $flux->Partenaire = $request->Partenaire;
      $flux->NIDF = $request->NIDF;
      $flux->NFNAME = $request->NFNAME;
      $flux->PARM = $request->PARM;
      $flux->Format = $request->Format;
      $flux->Longueur = $request->Longueur;
      $flux->Ftype = $request->Ftype;
      $flux->Ntype = $request->Ntype;
      $flux->Fcode = $request->Fcode;
      $flux->Ncode = $request->Ncode;
      $flux->Table_Transco = $request->Table_Transco;
      $flux->Fichier_Vide = $request->Fichier_Vide;
      $flux->Fichier_Absent = $request->Fichier_Absent;
      $flux->Suppr_Fichier_Source = $request->Suppr_Fichier_Source;
      $flux->Concatenation = $request->Concatenation;
      $flux->Rep_Sauvegarde = $request->Rep_Sauvegarde;
      $flux->Rep_Temporaire = $request->Rep_Temporaire;
      $flux->Partage_Pivot = $request->Partage_Pivot;
      $flux->Partage_Serveur = $request->Partage_Serveur;

      $flux->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($IDF)
    {
      $flux=SendFlux::find($IDF);

      if (!$flux)
        {
            return response()->json(['errors'=>array(['code'=>404,'message'=>'Aucun flux avec ce idf'])],404);
        }
            return response()->json(['status'=>'ok','data'=>$flux],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
