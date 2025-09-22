@extends('layouts.blog')
@section('title','Create')
@section('content')
    <!-- /resources/views/post/create.blade.php -->

    <h1>Create Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Create Post Form -->
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('blog.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" value="" class="form-control" placeholder="Title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="creator" class="form-label">Creator</label>
                    <select class="form-control" name="creator">
                        <option value="0">Choose Creator</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-outline-primary">Create</button>
                <a href="{{ route('blog.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
