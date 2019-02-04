@extends('admin.layouts.app')
@section('page-title')
    <p>Pages</p>
    <a href="{{ URL::to('admin/pages/create')  }}" type="button" class="btn btn-success"><i class="fas fa-plus-square"></i> Ajouter une page</a>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        </div>
    </div>
</div>
@endsection
@section('page-script')
<script>
    
</script>
@endsection