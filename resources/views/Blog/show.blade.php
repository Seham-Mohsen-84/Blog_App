@extends('layouts.blog')
@section('title','Show')
@section('content')
    <div class="card">
        <div class="card-header bg-primary-subtle">
            Blog Info
        </div>
        <div class="card-body">
            <h5 class="card-title"><b>Title : </b>{{$blog->title}}</h5>
            <p class="card-text"><b>Description : </b>{{$blog->description}}</p>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-header bg-primary-subtle">
            Blog Creator Info
        </div>
        <div class="card-body">
            <h5 class="card-title"><b>UserName : </b>{{$blog->user ? $blog->user->name:'NotFound'}}</h5>
            <p class="card-text"><b>UserEmail : </b>{{$blog->user ? $blog->user->email: 'NotFound'}}</p>
            <p class="card-text"><b>JoinAt : </b>{{$blog->user ? $blog->user->created_at->format('y-m-d'): 'NotFound'}}</p>
        </div>
    </div>
    <div class="mt-3">
        <a href="{{route('blog.index')}}" class="btn btn-outline-primary">Home</a>
    </div>
@endsection
