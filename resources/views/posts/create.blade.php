@extends('layouts.app')

@section('title', 'Crear publicación')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('image.store') }}" id="dropzone"
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf()
            </form>

            @error('image')
                <span class="text-red-500 text-sm">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf()
                <div class="mb-5">
                    <label for="title" class="mb-2 block uppercase text-gray-500 font-bold">
                        Título
                    </label>
                    <input type="text" id="title" name="title" placeholder="Título de la publicación"
                        value="{{ old('title') }}"
                        class="p-3 border w-full rounded-lg @error('title') border-red-500 @enderror">

                    @error('title')
                        <span class="text-red-500 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea type="text" id="description" name="description" placeholder="Descripción de la publicación"
                        class="p-3 border w-full rounded-lg @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>

                    @error('description')
                        <span class="text-red-500 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="hidden" name="image" id="inputImage" value={{ old('image') }}>

                </div>

                <input type="submit" value="Publicar"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
