<div class="{{ $classes }}">
    <div class="row justify-content-center h-100">
        <div class="col-md-10 d-flex flex-column align-items-center justify-content-between h-100">
            <div class="container pf-header w-100 text-center p-0 h-100">
                @if($header->image_id != null)
                    <div class="bg-image h-100 d-flex flex-column align-items-center justify-content-around" style="background-image: url({{ asset($header->image->imagepath) }}); background-size: cover; background-position: center;">
                @else
                    <div class="bg-image h-100 d-flex flex-column align-items-center justify-content-around">
                @endif
                    <div class="row">
                        <div class="col-sm-auto">
                            <h1 class="pf-site-title text-white">{{ $header->site_title }}</h1>                
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-auto">
                            <h3 class="pf-site-subtitle text-white">{{$header->site_subtitle }}</h3>                            
                        </div>
                    </div>
                </div>
                <div id="photo_identite" style="background-image: url('http://127.0.0.1:8000/images/identite_carre.jpeg')"></div>
            </div>                
        </div>
    </div>
</div>


