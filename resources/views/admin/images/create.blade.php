@extends('admin.layouts.app')
@section('page-title')
    <p>Images</p>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-info">
                    <i class="fas fa-plus-square"></i> Ajouter une image
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('images.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="imageName">Nom</label>
                            <input type="text" name="nom_image" class="form-control" id="imageName" placeholder="Nom de l'image">
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" id="image" name="image"
                                       class="custom-file-input" required>
                                <label class="custom-file-label" for="image"></label>                                
                            </div>
                            <br>
                        </div>
                        <div class="form-group">
                            <img id="preview" class="img-fluid" src="#" alt="">
                        </div>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-script')
<script>
   $(() => {
            $('input[type="file"]').on('change', (e) => {
                let that = e.currentTarget
                if (that.files && that.files[0]) {
                    $(that).next('.custom-file-label').html(that.files[0].name)
                    let reader = new FileReader()
                    reader.onload = (e) => {
                        $('#preview').attr('src', e.target.result)
                    }
                    reader.readAsDataURL(that.files[0])
                }
            })
        }); 
</script>
@endsection