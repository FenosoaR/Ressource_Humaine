<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CongeController extends Controller
{
    public function index()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = DB::table('admin')->where('idAdmin', session('LoggedAdmin'))->first();
            $conge= DB:: table('conge')->get();
            $listeConge = [] ;
            for( $i= 0; $i<count($conge); $i++ ){
               
                $listeConge[$i] = new Conge($conge[$i]->id, $conge[$i]->idPersonnel, $conge[$i]->dateDebut,$conge[$i]->statut,$conge[$i]->motif,$conge[$i]->nbJours);
            }
            $data = [
                'LoggedAdminInfo' => $admin
                 
            ];
        return view ('conge' ,compact('listeConge'),$data);
    }
}

      public function ajout()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = DB::table('admin')->where('idAdmin', session('LoggedAdmin'))->first();
            $personnel= DB::table('personnel')->get();
            $conge= DB:: table('conge')->get();
            $listeConge = [] ;
            for( $i= 0; $i<count($conge); $i++ ){
               
                $listeConge[$i] = new Conge($conge[$i]->id, $conge[$i]->idPersonnel, $conge[$i]->dateDebut,$conge[$i]->statut,$conge[$i]->motif,$conge[$i]->nbJours);
            }
            $data = [
                'LoggedAdminInfo' => $admin,
                'conge'=> $conge,
               'personnel'=> $personnel
            ];
            return view("ajoutConge",compact('listeConge'), $data);
        }
}

public function store(Request $request)
{

    DB::table('conge')->insert([
        "idPersonnel" => $request->idPersonnel,
        "dateDebut" => $request->dateDebut,
        "motif" => $request->motif,
        "statut" => 1,
        "nbJours" => $request->nbJours,
       

    ]);

    return back()->with('success', 'Ajout congé  effectué');
}

public function valider(Request $request){


    $updatePersonnel = DB::table('conge')
    ->where('id', $request->id)
    ->where('idPersonnel', $request->idPersonnel)
    ->update(["statut" => 2]);
    //  $this->index();
     
        return back()->with('success', 'Validation effecuée');
}
public function rejeter(Request $request){


    $updatePersonnel = DB::table('conge')
    ->where('id', $request->id)
    ->where('idPersonnel', $request->idPersonnel)
    ->update(["statut" => 3]);
    //  $this->index();
    
     
        return back()->with('success', 'Congé rejeté');
}
}

