@extends('plantilla')

@section('content')
    <h3 class="text center mb-e pt-3">Editar los datos del usuario con id {{$usuarioActualizar->id}}</h3>

    <form action="{{route('update', $usuarioActualizar->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <input type="text" name="nombre" id="nombre" value="{{$usuarioActualizar->nombre}}" class="form-control">
        </div>

        <div class="form-group">
            <input type="text" name="ape_paterno" id="ape_paterno" value="{{$usuarioActualizar->ape_paterno}}" class="form-control">
        </div>

        <div class="form-group">
                <input type="text" name="ape_materno" id="ape_materno" value="{{$usuarioActualizar->ape_materno}}" class="form-control">
        </div>

        <div class="form-group">
                <input type="text" name="edad" id="edad" value="{{$usuarioActualizar->edad}}" class="form-control">
        </div>
        
        <div class="form-group">
                <input type="text" name="calle" id="calle" value="{{$usuarioActualizar->direccion->calle}}" class="form-control">
        </div>
        
        <div class="form-group">
                <input type="text" name="colonia" id="colonia" value="{{$usuarioActualizar->direccion->colonia}}"  class="form-control">
        </div>

        <div class="form-group">
                <input type="text" name="delegacion" id="delegacion" value="{{$usuarioActualizar->direccion->delegacion}}" class="form-control">
        </div>

        <div class="form-group">
                <input type="text" name="numero" id="numero" value="{{$usuarioActualizar->direccion->numero}}" class="form-control">
        </div>
        <button type="submit" class="btn btn-warning btn-block">Update</button>
    </form>
    @if (session('update'))
        <div class="alert alert-success mt-3">
            {{session('update')}}
        </div>
    @endif
@endsection
