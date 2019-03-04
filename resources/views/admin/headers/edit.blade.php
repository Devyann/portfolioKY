@extends('admin.layouts.app')
@section('page-title')
    <p>En-têtes</p>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-info">
                    <i class="fas fa-edit"></i> Edition d'un en-têtes
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('headers.update', $header->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="headMainTitle">Titre</label>
                                <input type="text" name="site_title" class="form-control" id="headMainTitle" value="{{ $header->site_title }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="headerSubTitle">Sous-titre</label>
                                <input type="text" name="site_subtitle" class="form-control" id="headerSubTitle" value="{{ $header->site_subtitle }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pageParent">Page parent</label>
                                <select id="pageParent" class="form-control" name="page_id">
                                    <option>Choisir...</option>
                                    @foreach($pages as $page)
                                        <option value="{{ $page->id }}" @if($page->id === $header->pages_id) selected @endif>{{ $page->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @include('admin/components/background_select', ['class' => 'col-md-6', 'element_id' => $header->image->id, 'name' => 'bg_url', 'label' => 'Background-Image', 'id' => 'bgUrl'])
                        </div>
                        @include('admin/components/image_preview', ['thumb_url' => $header->image->thumbpath, 'class' => '', 'id' => 'preview'])
<!--                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="Check1" name="center_rounded_image">
                                    <label class="form-check-label" for="Check1">Ajouter une photo ronde centrale</label>
                                </div> 
                            </div>
                        </div>-->
                        <div class="form-row" id="rounded_img_select">
                            @if (isset($header->rounded_image))
                                @include('admin/components/background_select', ['element_id' => $header->rounded_image->id, 'class' => 'col-md-6 rounded_img', 'name' => 'rounded_image_id', 'label' =>'Image arrondie', 'id' => 'rounded_img'])
                                @include('admin/components/image_preview', ['element_id' => 'rounded_img', 'id' => 'preview_2', 'class' => 'col-md-6', 'thumb_url' => $header->rounded_image->thumbpath])
                                @else
                                @include('admin/components/background_select', ['element_id' => '', 'class' => 'col-md-6 rounded_img', 'name' => 'rounded_image_id', 'label' =>'Image arrondie', 'id' => 'rounded_img'])
                                @include('admin/components/image_preview', ['element_id' => 'rounded_img', 'id' => 'preview_2', 'class' => 'col-md-6', 'thumb_url' => ''])
                            @endif
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Valider</button>
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