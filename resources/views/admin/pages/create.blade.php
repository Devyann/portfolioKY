@extends('admin.layouts.app')
@section('page-title')
    <p>Pages</p>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-info">
                    <i class="fas fa-plus-square"></i> Formulaire de création de page
                </div>
                <div class="card-body">
                    <!--<h5 class="card-title">Ajouter une page</h5>-->
                    <h6 class="card-subtitle mb-2 text-muted">Entrer le nom de la nouvelle page</h6>
                    <form class="form-inline justify-content-around card-text" method="post" action="{{ route('pages.store') }}">
                        <div class="form-group mb-2">
                            @csrf
                            <label for="pageNumber" class="sr-only"></label>
                            <input type="text" readonly class="form-control-plaintext text-primary font-weight-bold"id="pageNumber" value="Page n° {{ $newPageNumber }}">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label for="inputPageName" class="sr-only">Nom</label>
                            <input type="text" name="name" class="form-control" id="inputPageName" placeholder="Nom">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Créer</button>
                    </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-script')
<script>
    
</script>
@endsection