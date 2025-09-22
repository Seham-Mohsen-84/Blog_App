@extends('layouts.blog')
@section('title','Blogs')
@section('content')
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Posted_By</th>
            <th>Created_At</th>
            <th colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($blogs as $blog)
        <tr>
            <td>{{$blog->id}}</td>
            <td>{{$blog->title}}</td>
            <td>{{$blog->user ? $blog->user->name: 'NotFound'}}</td>
            <td>{{$blog->created_at}}</td>
            <td colspan="3">
                <a href="{{route('blog.show',$blog->id)}}" class="btn btn-outline-info">View</a>
                <a href="{{ route('blog.edit',$blog->id) }}" class="btn btn-outline-warning">Edit</a>
                <form method="post" action="{{route('blog.destroy',$blog->id)}}" style="display: inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Delete this Blog?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
