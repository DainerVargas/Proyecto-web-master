@extends('layouts.until')

@section('content')
    <form method="POST" action="{{ route('Pagina|Principal.store') }}" enctype="multipart/form-data">
        <img src="/images/Captura_de_pantalla_2023-10-12_195342-removebg-preview.png" alt="" width="130"
            height="">
        @csrf
        <input type="text" name="name" placeholder="Nombre del juego" value="{{ old('name') }}">
        @error('name')
            <small style="color: red">*{{ $message }}</small>
        @enderror

        <select name="platforms_id" id="">
            <option value="" selected hidden>Seleccione la plataforma</option>
            @foreach ($platforms as $item)
                <option value="{{ $item->id }}"
                    {{ old('platforms_id') == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
        @error('platforms_id')
            <small style="color: red">*{{ $message }}</small>
        @enderror

        <select name="categories_id" id="">
            <option value="" selected hidden>Seleccione la categoria</option>
            @foreach ($categories as $item)
                <option value="{{ $item->id }}"
                    {{ old('categories_id') == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
        @error('categories_id')
            <small style="color: red">*{{ $message }}</small>
        @enderror

        <input type="file" name="cover" id="archivo" accept="image/*">

        @if (old('archivo'))
            <p>Archivo anteriormente cargado: {{ old('archivo') }}</p>
        @endif
        @error('cover')
            <small style="color: red">*{{ $message }}</small>
        @enderror

        <input type="date" name="year" placeholder="year" value="{{ old('year') }}">
        @error('year')
            <small style="color: red">*{{ $message }}</small>
        @enderror

        <textarea name="descripcion" id="" cols="30" rows="5">{{ old('descripcion') }}</textarea>
        @error('descripcion')
            <small style="color: red">*{{ $message }}</small>
        @enderror

        <input type="submit" value="Registrar Juego">
    </form>
@endsection
