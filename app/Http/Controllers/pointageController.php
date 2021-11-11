<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pointageController extends Controller
{
   
    public function ajouter()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = DB::table('admin')->where('idAdmin', session('LoggedAdmin'))->first();
            $listePointage= DB::table('pointage')->get();
            $data = [
                'LoggedAdminInfo' => $admin,
              
                'pointages'=> $listePointage
            ];
            return view("ajoutPointage", $data);
        }
    }

    public function store(Request $request)
    {



        $idPersonnel = DB::table('personnel')
            ->where('id', '=', $request->matricule)
            ->pluck('id');
      //  dd($idPersonnel);

        if (!empty($idPersonnel)) {

            $date = date('Y-m-d H:m');
            DB::table('pointage')->insert([
                "idPersonnel" => $idPersonnel[0],
                "created_at" => Carbon::now(),
                "type" => $request->type,
            ]);
            return back()->with('success', 'Pointage effectué');
        } else {

            return back()->withErrors('Matricule non trouvé');
        }
    }


}