@extends('adminlte::page')

@section('title', 'Apuntes Web - Panel Administrativo')

@section('content_header')

    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.posts.create')}}">Nuevo Post</a>

    <h1>Listado de posts</h1>
@stop

@section('content')

    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    @endif

    @livewire('admin.posts-index')
@stop