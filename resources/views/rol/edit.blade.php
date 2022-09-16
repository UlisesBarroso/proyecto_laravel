@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Editar rol
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="POST" action="{{ route('rol.update', $rol->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" class="form-control" readonly="true" value="{{$rol->id}}" name="id" />
            </div>
            <div class="form-group">
                <label for="Descripcion">Descripcion:</label>
                <input type="text" value="{{$rol->Descripcion}}" class="form-control" name="Descripcion" />
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection