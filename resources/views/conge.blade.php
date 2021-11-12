@extends("page.master")
@section("contenu")


<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="card shadow mb-4">



    @if(session()->has("success"))
    <div class="alert alert-success">
      <p>{{session()->get("success")}}</p>
    </div>
    @endif

    @if($errors->any())

    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
      <p>{{$error}}</p>
    </div>
    @endforeach
    @endif
    <!-- DataTales Example -->
    
    <div class="card-header py-3">
      <div class='row'>

        <label for="" class="m-0 font-weight-bold col-sm-3 ">Listes des congés :</label>
        <form action="{{ route('searchStatut')}}" method="GET" role="search" class="col-sm-8 navbar-search">
          @csrf
          <div class="row">
            <select class="form-control col-sm-6 mr-2" name="statut" value="">
              <option value="">Choisir congé à afficher</option>
              <option value="1">Planifié</option>
              <option value="2">Validé</option>
              <option value="3">Rejeté</option>
            </select>
            <button class="btn btn-success" type="submit">
              <i class="fas fa-success ">Voir</i>
            </button>
          </div>
      </div>
      </form>
      </div>


      <div class="card-body">

     @if(count($listeConge) == 0)
         <b>Aucun resultat</b>
      @else

    

        <div class="table-responsive">


          <div class="d-flex justify-content-between mb-4">
            <table class="table table-bordered table-hover table-striped ">
              <thead>
                <tr>
                  <th>Date de début</th>
                  <th>Motif</th>
                  <th>Statut</th>
                  <th>Matricule</th>
                  <th>Nombre de jours</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($listeConge as $conge)
                <tr>
                  <td>{{$conge->getDateDebut()}}</td>
                  <td>{{$conge->getMotif()}}</td>
                  <td>{{$conge->getStatut()}}</td>
                  <td>{{$conge->getMatricule()}}</td>
                  <td>{{$conge->getNbJours()}}</td>
                  <td>
                    @if($conge->getStatutNombre() == 1)

                    <form id="" action="{{ route('validerConge')}}" method="get">

                      @csrf
                      <input type="hidden" name="id" value="{{$conge->getId() }}" />
                      <input type="hidden" name="idPersonnel" value="{{$conge->getIdPersonnel() }}" />
                      <button type="submit" class='btn btn-info'>Valider</button>
                    </form>
                    <form id="" action="{{ route('rejeterConge')}}" method="get">

                      @csrf
                      <input type="hidden" name="id" value="{{$conge->getId() }}" />
                      <input type="hidden" name="idPersonnel" value="{{$conge->getIdPersonnel() }}" />
                      <button type="submit" class='btn btn-danger'>Rejeter</button>
                    </form>
                    @endif
                  
                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        @endif 
      </div>
 
    @endsection