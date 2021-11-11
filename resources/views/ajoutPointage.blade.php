@extends('page.master',['$title'=>'Ajout'])
@section("contenu")
<div class="container-fluid">

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
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="row">
        <h6 class="m-0 font-weight-bold col-sm-5">Pointage</h6>

      </div>




      <form style="width: 65%;" margin: 100px 150px 100px 80px; method="post" action="">
        @csrf
        <div class="form-group">
          <label for="matricule">Matricule:</label>
          <input type="text" required class="form-control" placeholder="RH/...." name="matricule">

        </div>

        <div class="form-group">
          <label for="type">Type:</label>
          <select class="form-control" name="type" id="">
            <option value=></option>
            <option value="Entrée">Entrée</option>
            <option value="Sortie">Sortie</option>
          </select>
        </div>



        <button type="submit" class="btn btn-primary">Enregister</button>
        <a href="{{route('personnel')}}" class="btn btn-danger">Annuler</a>
      </form>
    </div class='mt-4'>
    @endsection