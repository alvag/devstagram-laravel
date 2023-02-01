@extends('layouts.app')

@section('title')
    Inicia Sesión
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="login">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('login') }}" method="POST">
                @csrf()

                @if (session('status'))
                    <div class="bg-red-500 p-3 rounded-lg mb-6 text-white text-center">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Correo electrónico
                    </label>
                    <input type="email" id="email" name="email" placeholder="Tu correo electrónico"
                        value="{{ old('email') }}"
                        class="p-3 border w-full rounded-lg @error('email') border-red-500 @enderror">

                    @error('email')
                        <span class="text-red-500 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña
                    </label>
                    <input type="password" id="password" name="password" placeholder="Tu contraseña"
                        class="p-3 border w-full rounded-lg @error('password') border-red-500 @enderror">

                    @error('password')
                        <span class="text-red-500 text-sm">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <input type="submit" value="Iniciar Sesión"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
