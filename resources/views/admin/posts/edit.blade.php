@extends('adminlte::page')

@section('title', 'Apuntes Web - Panel Administrativo')

@section('content_header')
    <h1>Editar el post</h1>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($post,['route' => ['admin.posts.update', $post], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}

            {!! Form::hidden('user_id', auth()->user()->id) !!}

            @include('admin.posts.partials.form')

            {!! Form::submit('Actualizar post', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

{{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop --}}


@section('css')
    <style>
        .image-wrapper {

            position: relative;
            padding-bottom: 56.25%;

        }

        .image-wrapper img {

            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;

        }
        
    </style>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.1/classic/ckeditor.js"></script>


    <script>
        $(document).ready( function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
        });
    </script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#extract' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );

        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){

            var file = event.target.files[0];

            var reader = new FileReader();

            reader.onload= (event)=>{

                document.getElementById("picture").setAttribute('src', event.target.result)

            };

            reader.readAsDataURL(file);

        }
    </script>
@endsection