@extends('admin.layouts.app')
@section('page-title')
    <p>En-têtes</p>
    <a href="{{ URL::to('admin/headers/create')  }}" type="button" class="btn btn-success"><i class="fas fa-plus-square"></i> Ajouter un en-tête</a>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row justify-content-center">
                <table class="table table-striped table-bordered" id="table">
                    <thead>
                        <tr>
                            <th class="text-center">Titre</th>
                            <th class="text-center">Sous-titre</th>
                            <th class="text-center">Background</th>
                            <th class="text-center">Image Arrondie</th>
                            <th class="text-center">Page parent</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($headers as $header)
                            <tr>
                                <td class="text-center">{{ $header->site_title }}</td>
                                <td class="text-center">{{ $header->site_subtitle }}</td>
                                <td class="text-center">@if(isset($header->image))
                                                            {{ $header->image->name }}
                                                        @else 
                                                             - 
                                                        @endif
                                </td>
                                <td class="text-center">@if(isset($header->rounded_image))
                                                            {{ $header->rounded_image->name }}
                                                        @else 
                                                             - 
                                                        @endif
                                </td>
                                <td class="text-center">{{ $header->page->name }}</td>
                                <td class="text-center">
                                    <form action="{{ route('headers.destroy', $header->id) }}" method="POST">
                                        <a href="{{ URL::to('admin/headers/' . $header->id)  }}" type="button" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ URL::to('admin/headers/' . $header->id . '/edit')  }}" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>                                    
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="app"></div>
@endsection
@section('page-script')
<script>
    window.$ = $;
    $(document).ready(function() {
        $('#table').dataTable({
            language: {
                url: '/js/french.json'
            },
            "autoWidth": false, 
            "columns": [
                { "width": "20%" },                
                { "width": "20%" },                
                { "width": "18%" },                
                { "width": "17%" },                
                { "width": "25%" }                
            ]
        });
    });
</script>
@endsection