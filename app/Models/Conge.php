<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    use HasFactory;
    protected $fillable = ['idPersonnel', 'dateDebut', 'motif', 'nbJours'];

    private  $id;
    private  $idPersonnel;
    private  $dateDebut;
    private  $motif;
    private  $statut;
    private  $nbJours;


    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
        // belongsTo est une relation de one to one
    }

    public function __construct($id, $idPersonnel, $dateDebut, $statut, $motif, $nbJours)
    {
        $this->id = $id;
        $this->idPersonnel = $idPersonnel;
        $this->dateDebut = $dateDebut;
        $this->motif = $motif;
        $this->statut = $statut;
        $this->nbJours = $nbJours;
    }


    public function getId()
    {

        return  $this->id;
    }

    public function getMatricule()
    {

        return "RH/" . $this->id;
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
    public function getDateDebut()
    {
        
        return date('d/m/Y', strtotime($this->dateDebut)) ;
    }
    public function setDateDebut($dateDebut)
    {

        $this->dateDebut = $dateDebut;
    }
    public function getMotif()
    {

        return  $this->motif;
    }
    public function setMotif($motif)
    {

        $this->motif = $motif;
    }

    public function getNbJours()
    {
        return  $this->nbJours;
    }
    public function setNbJours($nbJours)
    {

        $this->nbJours = $nbJours;
    }
 


    public function getStatut()
    {
        switch ($this->statut) {
            case 1:
                return "Planifié";
                break;
            case 2:
                return "Validé";
                break;
            case 3:
                return "Rejeté";
                break;
        }
    }
    public function getStatutNombre(){

        return $this->statut ;
        }
    }

