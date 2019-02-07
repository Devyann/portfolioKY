@extends('admin.layouts.app')
@section('page-title')
    <p>Articles</p>
    <a href="{{ URL::to('admin/posts/create')  }}" type="button" class="btn btn-success"><i class="fas fa-plus-square"></i> Ajouter un article</a>
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
                            <th class="text-center">Contenu</th>
                            <th class="text-center">liens</th>
                            <th class="text-center">Page parent</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td class="text-center">{{ $post->post_title }}</td>
                                <td class="text-center">{{ $post->post_subtitle }}</td>
                                <td class="text-center">{{ str_limit($post->content, 25) }}</td>
                                <td class="text-center">
                                    {{ count($post->links) }}
                                </td>
                                <td class="text-center">{{ $post->page->name }}</td>
                                <td class="text-center">
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                        <a href="{{ URL::to('admin/posts/' . $post->id)  }}" type="button" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{ URL::to('admin/posts/' . $post->id . '/edit')  }}" type="button" class="btn btn-warning"><i class="fas fa-edit"></i></a>                                    
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