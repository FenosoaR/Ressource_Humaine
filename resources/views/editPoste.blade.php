@extends("page.master")
@section("contenu")
<div class="my-3 p-3 bg-body rounded shadow-sm">
  <h3 class="border-bottom pb-2 mb-4">Edition d'un poste</h3>



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

  <form style="width: 65%;" method="post" action="{{ route ('modifierPoste')}}">
    @csrf
    <input type="hidden" value="{{ $posteid->id }}" name="posteupdate">

    <div class="form-group">
      <label for="libelle">Libelle:</label>
      <input type="text" required class="form-control" name="libelle" value="{{ $posteid->libelle}}">
    </div>
    <div class="form-group">
      <label for="salaire">Salaire:</label>
      <input type="text" required class="form-control" name="salaire" value="{{ $posteid->salaire}}">
    </div>
  
    
   
    <td>
     
        <input type="submit" class="btn btn-primary"  value="Enregister">
      
    </td>
    <a href="{{route('poste')}}" class="btn btn-danger">Annuler</a>

  </form>

</div class='mt-4'>
@endsection