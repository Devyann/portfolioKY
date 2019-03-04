@extends('admin.layouts.app')
@section('page-title')
    <p>Images</p>
    <a href="{{ URL::to('admin/images/create')  }}" type="button" class="btn btn-success"><i class="fas fa-plus-square"></i> Ajouter une image</a>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card-columns">
                @foreach($images as $image)                    
                    <div class="card" id="image{{ $image->id }}">
                        <a href="{{ url($image->imagepath) }}" class="image-link">
                            <img class="card-img-top"
                                 src="{{ url($image->thumbpath) }}"
                                 alt="image">
                        </a>
                        <div class="card-footer text-muted">
                            <div class="text-right d-flex justify-content-between">
                                <em>{{ $image->name }}</em>
                                <form action="{{ route('images.destroy', $image->id) }}" method="POST">                                   
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div id="app"></div>
@endsection
@section('page-script')
<script>
    $(() => {
        $('[data-toggle="tooltip"]').tooltip()
        $('.card-columns').magnificPopup({
            delegate: 'a.image-link',
            type: 'image',
            tClose: '@lang("Fermer (Esc)")'@if(count($images) > 1),
            gallery: {
                enabled: true,
                tPrev: '@lang("Précédent (Flèche gauche)")',
                tNext: '@lang("Suivant (Flèche droite)")'
            },
            callbacks: {
                buildControls: function () {
                    this.contentContainer.append(this.arrowLeft.add(this.arrowRight))
                }
            }@endif
        })
    })
</script>
@endsection

