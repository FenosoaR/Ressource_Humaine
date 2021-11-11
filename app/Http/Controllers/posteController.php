<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class posteController extends Controller
{
    public function index()
    {
        if (session()->has('LoggedAdmin')) {
            // if loggedEtudiant exist
            $admin = DB::table('admin')->where('idAdmin', session('LoggedAdmin'))->first();
            $poste = DB::table('poste')->get();
            $data = [
                'LoggedAdminInfo' => $admin,
                'poste' => $poste

            ];
        }
        return view("poste", $data);
    }

    public function ajouter()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = DB::table('admin')->where('idAdmin', session('LoggedAdmin'))->first();

            $data = [
                'LoggedAdminInfo' => $admin,

            ];
            return view("ajoutPoste", $data);
        }
    }

    public function store(Request $request)
    {
        DB::table('poste')->insert([

            "libelle" => $request->libelle,
            "salaire" => $request->salaire

        ]);

        return back()->with('success', 'Poste ajouté  avec succes');
    }

    public function delete($idPoste)
    {
        $deleteposte = DB::table('poste')->where('id', $idPoste)->delete();

        return back()->with('successDelete', "Le poste est supprimé  avec succes");
    }

    public function update(Request $request)
    {
        $updatePoste = DB::table('poste')->where('id', $request->posteupdate)->update([
            "libelle" => $request->libelle,
            "salaire" => $request->salaire,


        ]);
        return back()->with('success', 'Poste mis à jours  avec succes');
    }

    public function edit($idPoste)
    {


        if (session()->has('LoggedAdmin')) {
            // if loggedEtudiant exist
            $admin = DB::table('admin')->where('idAdmin', session('LoggedAdmin'))->first();
            $posteid = DB::table('poste')->where('id', $idPoste)->first();
            $data = [
                'LoggedAdminInfo' => $admin,

            ];
        }

        return view("editPoste", compact("posteid"), $data);
    }
}
