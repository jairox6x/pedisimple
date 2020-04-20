@extends('layouts.admin')

@section('main')
<form action="{{route('category.update', $category)}}" method="post">
  @csrf
  @method('PUT')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 border-bottom mb-3">
    <h4 style="font-weight: 900">Editar categoria</h4>
    <div class="btn-toolbar mb-2 mb-md-0 mr-3">
      <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
  </div>
  <div class="container container-fluid">
  <div class="row">
    <div class="col-xl-6 col-12 my-2">
        <div class="card">
          <h5 class="card-header">Detalles de la categoria</h5>
          <div class="card-body">
            <div class="form-group">
              <label>Nombre</label>
            <input type="text" class="form-control" name="name" value="{{$category->name}}">
            </div>
            <div class="form-group">
              <label>Descripcion</label>
              <textarea class="form-control" rows="3" name="description" value="{{$category->description}}"></textarea>
              <small class="form-text text-muted">Este campo es opcional</small>
            </div>
            <div class="form-group">
              <label>Estado</label>
              <select class="form-control" name="state">
                <option value="available" @if($category->state == 'available') selected @endif>Disponible</option>
                <option value="not-available" @if($category->state == 'not-available') selected @endif>No disponible</option>
              </select>
            </div>
          </div>
        </div>
      </div>
  </div>
  </div>
</form>
@endsection

