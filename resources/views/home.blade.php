@extends('layouts.app')

@section('content')

{{-- <section class="jumbotron text-center" style="url('https://images.pexels.com/photos/2284166/pexels-photo-2284166.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940') no-repeat scroll 0px 10% / cover transparent;"> --}}
  <section class="jumbotron text-center">
    <div class="container">
      <h1><strong>Consulta online los productos</strong></h1>
      <p class="lead">Ahora podes encontrar comercios de Venado Tuerto y hacer pedidos online</p>
        {{-- <form action="{{route('list.index')}}" class="form-inline justify-content-center">
          <select class="form-control">
            <option value="1">Pizzas</option>
            <option value="1">Empanadas</option>
          </select>
          <input type="text" placeholder="Buscar comercio" class="form-control">
          <input type="submit" value="Buscar" class="btn btn-primary mx-2">
      </form> --}}
      <a href="{{route('list.index')}}" class="btn btn-warning btn-sm mt-2"><strong>Ver todos los comercios</strong></a> 
    </div>
</section>

{{-- <section class="pt-1 bg-light">
    <h4 class="mb-4 d-flex justify-content-center">Comercios destacados</h4>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="100" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
              <div class="card-body">
                <div class="d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="100" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
            <div class="card-body">
              <div class="d-flex justify-content-end align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="100" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"></text></svg>
            <div class="card-body">
              <div class="d-flex justify-content-end align-items-center">
                  <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>
</section> --}}

<section class="text-center">
    <div class="container mt-5">
        <h4 class="d-flex justify-content-center">Unite a la plataforma</h4>
        <hr width="30%">
        <a href="{{route('register.request')}}" class="btn btn-success">Registrarme</a>
    </div>
    <div class="container my-5">
        <p>Tenes un comercio y queres estar en la plataforma? <a href="#">Trabaja con nosotros</a></p>
    </div>
</section>

@endsection
