@extends('page.master',['$title'=>'Ajout'])
@section("contenu")
<!-- Begin Page Content -->
<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header">

      <div class="panel panel-info">
        <div class="panel-heading">
          <h4>Ajout Personnel</h4>


          @if(session()->has("success"))
          <div class="alert alert-success">
            <p>{{session()->get("success")}}</p>
          </div>
          @endif

          @if($errors->any())
          <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
          </ul>
          @endif
        </div>
        <div class="panel-body">
          <form  margin: 100px 150px 100px 80px; method="post" action="{{route('insererPersonnel')}}">
            @csrf
            <div class="row">
              <div class="col-sm-5">

                <div class="form-group">
                  <label for="nom">Nom:</label>
                  <input type="text" required class="form-control" name="nom">
                </div>
              </div>
              <div class="col-sm-1">
              </div>
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="prenom">Prenom:</label>
                  <input type="text" required class="form-control" name="prenom">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
                <div class="form-group">
                  <label>Date de naissance :</label>
                  <input type="date" name="datenaissance" class="form-control">
                </div>
              </div>
              <div class="col-sm-1">
              </div>


              <div class="col-sm-5">
                <div class="form-group">
                  <label for="sexe">Sexe:</label>
                  <select class="form-control" name="sexe" id="">
                    <option value=></option>
                    <option value="Masculin">Masculin</option>
                    <option value="Feminin">Feminin</option>
                  </select>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="col-sm-5">
                <div class="form-group">
                  <label>Adresse :</label>
                  <input type="text" name="adresse" placeholder="Adresse" class="form-control">
                </div>
              </div>


              <div class="col-sm-1">
              </div>
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="poste">Choisir poste:</label>

                  <select class="form-control" name="idPoste" id="poste">
                    <option value=""></option>
                    @foreach($postes as $poste)
                    <option value="{{ $poste->id}} "> {{ $poste->libelle }} </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="cin">Cin:</label>
                  <input type="text" required class="form-control" name="cin">
                </div>
              </div>


              <div class="col-sm-1">
              </div>
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="telephone">Telephone:</label>
                  <input type="text" required class="form-control" name="telephone">
                </div>
              </div>
            </div>

            <div class="col-sm-1">
            </div>
            <div class="col-sm-5">
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" required class="form-control" name="email">
              </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Enregister</button>
        <a href="{{route('personnel')}}" class="btn btn-danger">Annuler</a>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection