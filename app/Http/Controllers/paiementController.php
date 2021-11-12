<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class paiementController extends Controller
{
    public function index()
    {

        $admin = DB::table('admin')->where('idAdmin', session('LoggedAdmin'))->first();
        $paiement = DB::table('paiement')->get();
        $listePaiement = [];
        for ($i = 0; $i < count($paiement); $i++) {
            $listePaiement[$i] = new Paiement($paiement[$i]->id, $paiement[$i]->idPersonnel, $paiement[$i]->montant, $paiement[$i]->datePaiement, $paiement[$i]->mois, $paiement[$i]->annee);
        }
        $data = [
            'LoggedAdminInfo' => $admin,

        ];
        return view("paiement", compact('listePaiement'), $data);
    }
    public function situation()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = DB::table('admin')->where('idAdmin', session('LoggedAdmin'))->first();
            $listeMois = [];
            $data = [
                'LoggedAdminInfo' => $admin,
                'mois' => 0,
                'j'=> 0
            ];
            return view("situationPaiement",compact('listeMois'), $data);
        }
    }
    public function store(Request $request)
    {

        if ($request->idPersonnel) {
            $admin = DB::table('admin')->where('idAdmin', session('LoggedAdmin'))->first();
            $embauche= DB::table('personnel')
            ->select('created_at')
            ->where('id', $request->idPersonnel)
            ->value('created_at');

            //echo  date('Y', strtotime($embauche)) . " ". now()->year;
            $listeMois=[]; 
            $listeMois[0]="Janvier"; 
            $listeMois[1]="Fevrier"; 
            $listeMois[2]="Mars"; 
            $listeMois[3]="Avril"; 
            $listeMois[4]="Mai"; 
            $listeMois[5]="Juin"; 
            $listeMois[6]="juillet"; 
            $listeMois[7]="Aout"; 
            $listeMois[8]="Septembre"; 
            $listeMois[9]="Octobre"; 
            $listeMois[10]="Novembre"; 
            $listeMois[11]="Decembre"; 
    
            $mois=0;
            if( date('Y', strtotime($embauche))==now()->year){
                //echo date('m', strtotime($embauche));
                $mois=intval( date('m', strtotime($embauche)));
            }else{
                echo "Tsia";
            }

            $data = [
                'LoggedAdminInfo' => $admin,
                'mois' => $mois,
                'j'=> 1
            ];
            return view("situationPaiement", compact('listeMois'), $data);



          /*    $paiement = DB::table('paiement')
                ->where('idPersonnel', $request->idPersonnel)
                ->get();
            $listePaiement = [];
            for ($i = 0; $i < count($paiement); $i++) {
                $listePaiement[$i] = new Paiement($paiement[$i]->id, $paiement[$i]->idPersonnel, $paiement[$i]->montant, $paiement[$i]->datePaiement, $paiement[$i]->mois, $paiement[$i]->annee);
            }
            $data = [
                'LoggedAdminInfo' => $admin,

            ];
            return view("situationPaiement", compact('listePaiement'), $data);*/
        }





     /*   $situation = DB::table('paiement')
            ->where('idPersonnel', $request->idPersonnel)
            ->where('mois', $request->mois)
            ->where('annee', $request->annee)
            ->get();


        if (count($situation) != 0) {

            return back()->withErrors('Salaire deja payé pour ce mois');
        } else {

            DB::table('paiement')->insert([
                "idPersonnel" => $request->idPersonnel,
                "datePaiement" => Carbon::now(),
                "mois" => $request->mois,
                "annee" => $request->annee,


            ]);

            return back()->with('success', 'Ajout paiement  effectué');
        }*/
    }
}
