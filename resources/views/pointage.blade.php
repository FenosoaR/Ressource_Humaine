@extends("page.master")
@section("contenu")


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <div class="row">
             <h6 class="m-0 font-weight-bold col-sm-9">Pointage</h6>
             <a href="{{ route ('ajouterPersonnel')}}" class='btn btn-success col-sm-3'>Ajouter <i class="fas fa-plus"></i></a>
        </div>
            
        </div>div class="table-responsive">
            <div class="d-flex justify-content-between mb-4">

                <div><a href="{{ route('ajouterPointage')}}" class='btn btn-primary'>Ajout</a></div>
            </div>

            @if(session()->has("successDelete"))
            <div class="alert alert-success">
                <p>{{session()->get("successDelete")}}</p>
            </div>
            @endif
            <table class="table table-bordered table-hover table-striped ">
                <thead>
                    <tr>

                        <th>Personnel</th>
                        <th>Date_pointage</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="" class='btn btn-info'>Editer</a>
                            <a href="" class="btn btn-danger" onclick="">Supprimer</a>

                        </td>
                        <td>
                            <form id="" action="" method="post">

                                @csrf
                                <input type="hidden" name="_method" value="delete" />
                            </form>

                        </td>

                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection