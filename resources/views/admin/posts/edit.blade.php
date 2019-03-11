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
                    <i class="fas fa-edit"></i> Édition d'un article
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('posts.update', $post->id) }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="postMainTitle">Titre</label>
                                <input type="text" name="post_title" class="form-control" id="postMainTitle" value="{{ $post->post_title }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="postSubTitle">Sous-titre</label>
                                <input type="text" name="post_subtitle" class="form-control" id="postSubTitle" value="{{ $post->post_subtitle }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pageParent">Page parent</label>
                                <select id="pageParent" class="form-control" name="page_id">
                                    <option>Choisir...</option>
                                    @foreach($pages as $page)
                                        <option value="{{ $page->id }}" @if($page->id === $post->pages_id) selected @endif>{{ $page->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($post->image)
                                @include('admin/components/background_select', ['class' => 'col-md-6', 'element_id' => $post->image->id, 'name' => 'bg_url', 'label' => 'Background-Image', 'id' => 'bgUrl'])
                            @else
                                @include('admin/components/background_select', ['class' => 'col-md-6', 'name' => 'bg_url', 'label' => 'Background-image', 'id' => 'bgImg'])
                            @endif
                        </div>
                        @if ($post->image)
                            @include('admin/components/image_preview', ['thumb_url' => $post->image->thumbpath, 'class' => '', 'id' => 'preview'])
                        @else
                            @include('admin/components/image_preview', ['element_id' => 'bgImg', 'id' => 'preview', 'class' => ''])
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="content">Contenu</label>
                                <textarea class="form-control" id="content" name="content" rows="3">{{ $post->content }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nameLinkA">Nom lien 1</label>
                                <input type="text" name="nameLinkA" class="form-control" id="nameLinkA" @if($linkA) value="{{ $linkA->name }}" @else placeholder="Nom lien 1" @endif>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="linkA">Lien 1</label>
                                <input type="text" name="linkA" class="form-control" id="linkA" @if($linkA) value="{{ $linkA->href }}" @else placeholder="Url" @endif>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="nameLinkB">Nom lien 2</label>
                                <input type="text" name="nameLinkB" class="form-control" id="nameLinkB" @if($linkB) value="{{ $linkB->name }}" @else placeholder="Nom lien 2" @endif>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="linkB">Lien 2</label>
                                <input type="text" name="linkB" class="form-control" id="linkB" @if($linkB) value="{{ $linkB->href }}" @else placeholder="url" @endif>
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