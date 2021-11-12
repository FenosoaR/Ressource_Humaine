<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class paiementController extends Controller
{
    public function index()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = DB::table('admin')->where('idAdmin', session('LoggedAdmin'))->first();
            $personnel= DB::table('personnel')->get();
            $paiement = DB::table('paiement')->get();
            $listePaiement = [] ;
            for( $i= 0; $i<count($paiement); $i++ ){
               
                $listePaiement[$i] = new Paiement($paiement[$i]->id, $paiement[$i]->idPersonnel, $paiement[$i]->montant,$paiement[$i]->datePaiement,$paiement[$i]->mois,$paiement[$i]->annee);
            }
            $data = [
                'LoggedAdminInfo' => $admin,
                
              
            ];
            return view("paiement",compact('listePaiement'), $data);
        }
    }
    public function ajouter()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = DB::table('admin')->where('idAdmin', session('LoggedAdmin'))->first();
            $personnel= DB::table('personnel')->get();
            $paiement= DB:: table('paiement')->get();
            $listePaiement = [] ;
            for( $i= 0; $i<count($paiement); $i++ ){
               
                $listePaiement[$i] = new Paiement($paiement[$i]->id, $paiement[$i]->idPersonnel, $paiement[$i]->montant,$paiement[$i]->datePaiement,$paiement[$i]->mois,$paiement[$i]->annee);
            }
            $data = [
                'LoggedAdminInfo' => $admin,
                'paiement'=> $paiement,
               'personnel'=> $personnel
            ];
            return view("ajoutPaiement",compact('listePaiement'), $data);
        }
}
public function store(Request $request)
{

    DB::table('paiement')->insert([
        "idPersonnel" => $request->idPersonnel,
        "montant" => $request->montant,
        "datePaiement" => $request->datePaiement,
        "mois" => $request->mois,
        "annee" => $request->annee,
       

    ]);

    return back()->with('success', 'Ajout paiement  effectué');

}
}