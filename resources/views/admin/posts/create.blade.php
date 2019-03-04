@extends('admin.layouts.app')
@section('page-title')
    <p>Articles</p>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-info">
                    <i class="fas fa-plus-square"></i> Formulaire de création d'article
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('posts.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="postMainTitle">Titre</label>
                                <input type="text" name="post_title" class="form-control" id="postMainTitle" placeholder="Titre Principal">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="postSubTitle">Sous-titre</label>
                                <input type="text" name="post_subtitle" class="form-control" id="postSubTitle" placeholder="Sous-titre">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pageParent">Page parent</label>
                                <select id="pageParent" class="form-control" name="pages_id">
                                    <option selected>Choisir...</option>
                                    @foreach($pages as $page)
                                        <option value="{{ $page->id }}">{{ $page->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @include('admin/components/background_select', ['class' => 'col-md-6'])
                        </div>
                        @include('admin/components/image_preview')
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="content">Contenu</label>
                                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nameLinkA">Nom lien 1</label>
                                <input type="text" name="nameLinkA" class="form-control" id="nameLinkA" placeholder="Nom lien 1">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="linkA">Lien 1</label>
                                <input type="text" name="linkA" class="form-control" id="linkA" placeholder="Sous-titre">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nameLinkB">Nom lien 2</label>
                                <input type="text" name="nameLinkB" class="form-control" id="nameLinkB" placeholder="Nom lien 1">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="linkB">Lien 2</label>
                                <input type="text" name="linkB" class="form-control" id="linkB" placeholder="Sous-titre">
                            </div>
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