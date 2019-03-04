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
                    <form method="post" action="{{ route('pages.store') }}">
                        @csrf
                        <div class="form-row">    
                            <div class="form-group col-md-6">
                                <label for="inputPageName">Nom</label>
                                <input type="text" name="name" class="form-control" id="inputPageName" placeholder="Nom">
                            </div>
                            @include('admin/components/background_select', ['class' => 'col-md-6', 'name' => 'bg_url', 'label' => 'Background-image'])
                        </div>
                        @include('admin/components/image_preview')
                        <button type="submit" class="btn btn-primary mb-2">Créer</button>
                    </form>
              </div>
            </div>
        </div>
    </div>
</div>
<div id="app"></div>
@endsection
@section('page-script')
<script>
    
</script>
@endsection