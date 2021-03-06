@extends('layouts.app')

@section('body-class','product-page')

@section('content')

        <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
           
        </div>

        <div class="main main-raised">
            <div class="container">
                <div class="section">
                    <h2 class="title text-center">Edit Product</h2>

                    @if ($errors -> any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors -> all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ url('/admin/products/'.$product -> id.'/edit')}}" method="post" accept-charset="utf-8">
                        {{ csrf_field()  }}

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Name Product</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $product -> name) }}">
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Price Product</label>
                                <input type="number" step="0.01" class="form-control" name="price" value="{{ old('price', $product -> price) }}">
                            </div>
                        </div>
                       
                    </div>

                        <div class="form-group label-floating">
                                <label class="control-label">Descript Product</label>
                                <input type="text" class="form-control" name="description" value="{{ old('description', $product -> description) }}">
                        </div>

                        <textarea class="form-control" placeholder="Write a long description..." rows="5" name="long_description" >{{ old('long_description', $product -> long_description) }}</textarea>
                        
                        
                        <button class="btn btn-primary">Save Product</button>
                        <a href="{{ url('/admin/products') }}" class="btn brn-default">Cancel</a>
                    </form>

                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://presentation.creative-tim.com">
                               About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; 2016, made with <i class="fa fa-heart heart"></i> by Creative Tim
                </div>
            </div>
        </footer>
@endsection
