@extends('index')

@section('title', 'Registro')

@section('content')
    <h1>Registro de Usuário</h1>

    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/registro" method="POST" style="background-color: #f8f9fa; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Nome:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                   style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">E-mail:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                   style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password" style="display: block; margin-bottom: 5px; font-weight: bold;">Senha:</label>
            <input type="password" id="password" name="password" required
                   style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="password_confirmation" style="display: block; margin-bottom: 5px; font-weight: bold;">Confirme a Senha:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                   style="width: 100%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; box-sizing: border-box;">
        </div>

        <button type="submit" style="background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            Registrar
        </button>
    </form>
@endsection
