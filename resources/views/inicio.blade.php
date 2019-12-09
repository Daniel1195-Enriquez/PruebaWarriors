@extends('plantilla')

@section('content')
 <div class="row">
   <!--etiquetas usuario-->
    <div class="col-md-12">
        <h3 class="text-center mb-4">Agregar usuarios</h3>

            <form action="{{route('store')}}" method="POST">
                   @csrf

                    <div class="form-gruop">
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombre del usuario" required>
                    </div>
                    @error('nombre')
                        <div class="alert alert-danger">
                            El nombre es requerido
                        </div>
                    @enderror
                    <br>                                            
                    <div class="form-gruop">
                        <input type="text" name="ape_paterno" id="ape_paterno" class="form-control" value="{{old('ape_paterno')}}" placeholder="Apellido Paterno" required>
                    </div>
                    @error('ape_paterno')
                        <div class="alert alert-danger">
                            El primer apellido es requerido
                        </div>
                    @enderror
                    <br>
                    <div class="form-gruop">
                            <input type="text" name="ape_materno" id="ape_materno" class="form-control" value="{{old('ape_materno')}}" placeholder="Apellido Materno" required>
                    </div>
                    @error('ape_materno')
                        <div class="alert alert-danger">
                            El segundo apellido es requerido
                        </div>
                    @enderror
                    <br>
                    <div class="form-gruop">
                            <input type="number" name="edad" id="edad" class="form-control" value="{{old('edad')}}" placeholder="Edad" required>
                    </div>
                    @error('edad')
                        <div class="alert alert-danger">
                            La edad es requerido
                        </div>
                    @enderror
                    <!---->
                    <h3 class="text-center mb-4">Agregar direcciones</h3>
                    <div class="form-gruop">
                    <input type="text" name="calle" id="calle" class="form-control" value="{{old('calle')}}" placeholder="Calle" required>
                    </div>
                    <!--error al faltar calle-->
                    @error('calle')
                        <div class="alert alert-danger">
                            La calle es requerida
                        </div>
                    @enderror
                    <br>

                    <div class="form-gruop">
                        <input type="text" name="colonia" id="colonia" class="form-control" value="{{old('colonia')}}" placeholder="Colonia" required>
                    </div>
                    @error('colonia')
                        <div class="alert alert-danger">
                            La colonia es requerida
                        </div>
                    @enderror
                    <br>
                    <div class="form-gruop">
                        <input type="text" name="delegacion" id="delegacion" class="form-control" value="{{old('delegacion')}}" placeholder="Delegación" required>
                    </div>
                    @error('delegacion')
                        <div class="alert alert-danger">
                            La delegacion es requerida
                        </div>
                    @enderror
                    <br>
                    <div class="form-gruop">
                        <input type="number" name="numero" id="numero" class="form-control"  value="{{old('numero')}}" placeholder="Número" required>
                    </div>
                    @error('numero')
                        <div class="alert alert-danger">
                            El número es requerida
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-success btn-black">Create</button>    

            </form>
            
            
            @if (session('agregar'))
                <div class="alert alert-success mt=3">
                   {{session('agregar')}} 
                </div>    
            @endif
            
        </div> 
    
    </div>   
    
    <!--inicio tabla-->
    <div class="col-md-12">
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Edad</th>
                <th>Calle</th>
                <th>Colonia</th>
                <th>Delegación</th>
                <th>Número</th>
                <th>Acciones</th>
            </tr>

            @foreach ($usuarios as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->ape_paterno}}</td>
                    <td>{{$item->ape_materno}}</td>
                    <td>{{$item->edad}}</td> 
                    <td>{{$item->direccion->calle}}</td>
                    <td>{{$item->direccion->colonia}}</td>
                    <td>{{$item->direccion->delegacion}}</td>
                    <td>{{$item->direccion->numero}}</td>                   
                    <td><!--no eliminar-->                      
                        <!--botones para las acciones-->
                        <a href="{{route('editar', $item->id)}}" class="btn btn-warning">Read</a>
                        <form action="{{route('eliminar', $item->id)}}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>                  
                    </td>
                </tr>
            @endforeach
        </table>
        @if (session('eliminar'))
            <div class="alert alert-success mt-3">
                {{session('eliminar')}}
            </div>
        @endif
        {{$usuarios->links()}}
    </div>    
    <!--fin tabla-->    
@endsection