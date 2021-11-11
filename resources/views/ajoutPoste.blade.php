@extends('page.master',['$title'=>'Ajout'])
@section("contenu")
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h3 class="border-bottom pb-2 mb-4">Ajout d'un nouveau poste</h3>



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

    <form style="width: 65%;" margin: 100px 150px 100px 80px; method="post" action="{{route('insererPoste')}}">
        @csrf
        <div class="form-group">
            <label for="libelle">Libelle:</label>
            <input type="text" required class="form-control" name="libelle">
        </div>
        <div class="form-group">
            <label for="salaire">Salaire:</label>
            <input type="number" required class="form-control" name="salaire">
        </div>
       
        <button type="submit" class="btn btn-primary">Enregister</button>
        <a href="{{route('poste')}}" class="btn btn-danger">Annuler</a>
    </form>
</div class='mt-4'>
@endsection