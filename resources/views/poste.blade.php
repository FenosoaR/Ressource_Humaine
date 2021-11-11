@extends("page.master")
@section("contenu")


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <div class="row">
             <h6 class="m-0 font-weight-bold col-sm-9">Postes</h6>

             <a href="{{ route ('ajouterPoste')}}" class='btn btn-success col-sm-3'>Ajouter <i class="fas fa-plus"></i></a>
        </div>
       

            @if(session()->has("successDelete"))
            <div class="alert alert-success">
                <p>{{session()->get("successDelete")}}</p>
            </div>
            @endif
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            
                <thead>
                    <tr>

                        <th>Libelle</th>
                        <th>Salaire</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($poste as $poste)
                    <tr>
                        <td>{{$poste->libelle}}</td>
                        <td>{{$poste->salaire}}</td>
                        <td>
                            <a href="{{ route ('editPoste', ['poste' =>  $poste->id]) }}" class='btn btn-info'><i class="fas fa-edit"></i></a>
                            <a href="{{ route('supprimerPoste', ['poste' => $poste->id]) }}" class="btn btn-danger" onclick="if(confirm('Voulez-vous vraiment supprimer ce poste?')){
                    document.getElementById('form-{{ $poste->id }}').submit();
                }"><i class="fas fa-trash"></i></a>

                        </td>
                        <td>
                            <form id="form-{{ $poste->id }}" action="{{ route ('supprimerPoste', ['poste' => $poste->id]) }}" method="post">

                                @csrf
                                <input type="hidden" name="_method" value="delete" />
                            </form>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection