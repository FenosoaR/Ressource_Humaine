<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Paiement extends Model
{
    use HasFactory;
    protected $fillable = ['idPersonnel', 'montant', 'datePaiement', 'mois', 'annee'];

    private  $id;
    private  $idPersonnel;
    private  $montant;
    private  $datePaiement;
    private  $mois;
    private  $annee;


    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
        // belongsTo est une relation de one to one
    }

    public function __construct($id, $idPersonnel, $montant, $datePaiement, $mois, $annee)
    {
        $this->id = $id;
        $this->idPersonnel = $idPersonnel;
        $this->montant = $montant;
        $this->datePaiement = $datePaiement;
        $this->mois = $mois;
        $this->annee = $annee;
    }

    public function getId()
    {

        return  $this->id;
    }
    public function setId($id)
    {

        $this->id = $id;
    }
    public function getIdPersonnel()
    {

        return  $this->idPersonnel;
    }
    public function setIdPersonnel($idPersonnel)
    {

        $this->idPersonnel = $idPersonnel;
    }
    public function getdatePaiement()
    {

        return date('d/m/Y', strtotime($this->datePaiement));
    }
    public function setdatePaiement($datePaiement)
    {

        $this->datePaiement = $datePaiement;
    }
    public function getMontant()
    {
        $montant = DB::table('personnel')
            ->select('salaire')
            ->join('poste', function ($join) {
                $join->on('personnel.idPoste', '=', 'poste.id');
            })->where('personnel.id', $this->idPersonnel)
            ->pluck('salaire');
        return  $montant[0];
    }


    public function setMontant($montant)
    {

        $this->montant = $montant;
    }

    public function getMois()
    {  
        switch ($this->mois) {
            case 1:
                return "Janvier";
                break;
            case 2:
                return "Fevrier";
                break;
            case 3:
                return "Mars";
                break;
            case 4:
                return "Avril";
                break;
            case 5:
                return "Mai";
                break;
            case 6:
                return "Juin";
                break;
            case 7:
                return "Juillet";
                break;
            case 8:
                return "Aout";
                break;
            case 9:
                return "Septembre";
                break;
            case 10:
                return "Octobre";
                break;
            case 11:
                return "Novembre";
                break;
            case 12:
                return "Décembre";
                break;
        }
    }
    public function setMois($mois)
    {

        $this->mois = $mois;
    }
    public function getAnnee()
    {
        return  $this->annee;
    }
    public function setAnnee($annee)
    {

        $this->annee = $annee;
    }
    public function getListeMois()
    {
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
        return  $listeMois;
    }
}
