@extends('admin.layouts.app')
@section('page-title')
    <p>En-têtes</p>
    <a href="{{ URL::to('admin/headers/' . $header->id . '/edit')  }}" type="button" class="btn btn-success"><i class="fas fa-edit"></i> Éditer</a>
@endsection
@section('content')
<div class="container d-flex justify-content-between border">
    @include('admin.components.header', ['classes' => 'left-side-content laptop-layout w-75 border-right'])
    @include('admin.components.header', ['classes' => 'right-side-content mobile-layout w-25'])
</div>   
@endsection
@section('page-script')
<script>

</script>
@endsection