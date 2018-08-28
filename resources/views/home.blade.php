
@extends('layouts.app')

@section('body-class','landing-page')

@section('content')

        <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
           
        </div>

        <div class="main main-raised">
            <div class="container">
                <div class="section">
                    <h2 class="title text-center">DashBoard</h2>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <ul class="nav nav-pills nav-pills-primary" role="tablist">
                            <li class="active">
                                <a href="#dashboard" role="tab" data-toggle="tab">
                                    <i class="material-icons">dashboard</i>
                                    Carrito Compras
                                </a>
                            </li>
                        
                            <li>
                                <a href="#tasks" role="tab" data-toggle="tab">
                                    <i class="material-icons">list</i>
                                    Histórico Pedidos
                                </a>
                            </li>
                        </ul>
                        @foreach(auth()->user()->cart->details as $detail )
                            <ul>
                                <li>{{ $detail }}</li>
                            </ul>
                        @endforeach
                         <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="col-md-2 text-center">Name</th>
                                        <th class="col-md-5 text-center">Description</th>
                                        <th class="text-center">Category</th>
                                        <th>Price</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td class="text-center"><img src="{{ $product -> feautured_image_url }}"></td>
                                        <td><a href="{{ $product -> name }}"></td>
                                        <td class="text-right">&euro; {{ $product -> price }}</td>
                                        <td class="td-actions text-right">
                                            
                                            <form action="{{ url('/admin/products/'.$product -> id ) }}" method="post" accept-charset="utf-8">

                                                 {{ csrf_field() }}
                                                 {{ method_field('DELETE')}}
                                                
                                                <a href="#" type="button" rel="tooltip" title="View Product" class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-info"></i>
                                                </a>
                                                
                                                <button type="submit" rel="tooltip" title="Remove Product" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="fa fa-times"></i>
                                                </button> 
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach        
                                </tbody>
                           </table>     
                    
                </div>
            </div>
        </div>

        @include('includes.footer')
@endsection

