@extends('layouts.blog')
@section('title','Edit')
@section('content')
    <h1>Edit Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('blog.update',$blog->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" value="{{$blog->title}}" class="form-control" placeholder="Title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Description">{{$blog->description}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="creator" class="form-label">Creator</label>
                    <select class="form-control" name="creator">
                        <option value="" disabled selected>Choose Creator</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $blog->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>

                </div>

                <button type="submit" class="btn btn-outline-warning">Update</button>
                <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
