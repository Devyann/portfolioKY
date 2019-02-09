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
                    <div class="card" id="image{{ $image['filename'] }}">
                        <a href="{{ url('images/' . $image['basename']) }}" class="image-link">
                            <img class="card-img-top"
                                 src="{{ url('thumbs/' . $image['basename']) }}"
                                 alt="image">
                        </a>
                        <div class="card-footer text-muted">
                            <div class="text-right">
                                <form action="{{ route('images.destroy', $image['filename']) }}" method="POST">                                   
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

