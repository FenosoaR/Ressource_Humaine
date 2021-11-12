@extends('page.master',['$title'=>'Ajout'])
@section("contenu")
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row">
        <h6 class="m-0 font-weight-bold col-sm-5">Ajout Congé</h6>

      </div>


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

      <form style="width: 65%;"  method="post" action="{{route('insererConge')}}">
        @csrf
        <div class="form-group">
          <label for="dateDebut">Date_Debut:</label>
          <input type="date" required class="form-control" name="dateDebut">
        </div>
             
        <div class="form-group">
          <label for="matricule">Matricule:</label>

          <select class="form-control" name="idPersonnel" id="personnel">
            <option value=""></option>
            @foreach($personnel as $personnel)
            <option value="{{ $personnel->id}} "> {{ $personnel->id }} </option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="motif">Motif:</label>
          <input type="text" required class="form-control" name="motif">
        </div>
  

        <div class="form-group">
          <label for="nbJours">Nombre de jours:</label>
          <input type="number" required class="form-control" name="nbJours">
        </div>

        <button type="submit" class="btn btn-primary">Enregister</button>
        <a href="{{route('personnel')}}" class="btn btn-danger">Annuler</a>
      </form>
    </div>

  </div>
</div>
@endsection