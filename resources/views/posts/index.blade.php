@extends('main')

@section('title', '| All Posts')

@section('stylesheets')
    @vite('resources/css/styles.css')
@endsection

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-primary d-grid btn-h1-spacing">Create new post</a>
        </div>

        <div class="col-md-12">
            <hr>
        </div>

    </div><!--End of row -->

    <div class="row">
        <div class="col-md-12">
            <div class="pagination-container">
                {{$posts->links()}}
            </div>
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th>
                                {{ $post->id }}
                            </th>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td>
                                {{ substr($post->body,0,50) }}{{ strlen($post->body) > 50 ? "..." : "" }}
                            </td>
                            <td>
                                {{ $post->created_at->format('M j, Y g:i A') }}
                            </td>
                            <td>
                                <a href="{{route('posts.show',$post->id)}}" class="btn btn-light">View</a>
                                <a href="{{route('posts.edit',$post->id)}}" class="btn btn-light">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
