@extends('admin.layouts.app')
@section('page-title')
    <p>Pages</p>
    <a href="{{ URL::to('admin/pages/create')  }}" type="button" class="btn btn-success"><i class="fas fa-plus-square"></i> Ajouter une page</a>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row justify-content-center">
                <table class="table table-striped table-bordered" id="table">
                    <thead>
                        <tr>
                            <th class="text-center">N° Page</th>
                            <th class="text-center">Nom</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td class="text-center">{{ $page->id }}</td>
                                <td class="text-center">{{ $page->name }}</td>
                                <td class="text-center">
                                    <form action="{{ route('pages.destroy', $page->id) }}" method="POST">
                                        <a href="{{ URL::to('admin/pages/' . $page->id)  }}" type="button" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ URL::to('admin/pages/' . $page->id . '/edit')  }}" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>                                    
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
@endsection
@section('page-script')
<script>
    window.$ = $;
    $(document).ready(function() {
        console.log($('#table'));
        $('#table').dataTable({
            language: {
                url: '/js/french.json'
            }
        });
    } );
</script>
@endsection