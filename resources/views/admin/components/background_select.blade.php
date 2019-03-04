<div class="form-group {{ $class }}">
    <label for="{{ $id }}">{{ $label }}</label>
    <select id="{{ $id }}" class="form-control" name="{{ $name }}">
        <option selected data-imgurl="#" value="none">Choisir...</option>
        @isset($images)
            @foreach( $images as $img )
                <option value="{{ $img->id }}" data-imgurl="{{ asset($img->thumbpath) }}" @isset($element_id) @if($img->id === $element_id) selected @endif @endisset>{{ $img->name }}</option>
            @endforeach
        @endisset
    </select>
</div>
{{--
    $class = ajouter des classes 
    $element_id = id de l'élément (header, post, page...)
--}}


