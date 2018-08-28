<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;


class ProductController extends Controller
{
    

	public function index()
	{
		$products = Product::paginate(10);
		return view('admin.products.index')->with(compact('products')); //listar
	}

	public function create()
	{
		return view('admin.products.create');
	}

	public function store(Request $request)
	{

		//dd($request -> all());
		
		//validar datos.
		
		$messages = [
			'name.required' => 'El nombre del producto es obligatorio.',
			'name.min'	=> 'La longitud mínima del nombre debe ser 3.',
			'description.required' => 'El descripción del producto es obligatoria.',
			'description.max'	=> 'La longitud mínima de la descripcion debe inferor a 200.',
			'price.required' => 'El precio es obligatorio.',
			'price.numeric' => 'El precio debe ser numérico.',
			'price.min'	=> 'El precio debe ser 0 o superior.',

		];

		$rules = [
			'name' => 'required|min:3',
			'description' => 'required|max:200',
			'price' => 'required|numeric|min:0'
		];

		$this -> validate($request, $rules, $messages);

		$product = new Product();
		$product -> name = $request -> input('name');
		$product -> description = $request -> input('description');
		$product -> price = $request -> input('price');
		$product -> long_description = $request -> input('long_description');

		$product -> save(); //Insertamos rexistro.

		return redirect('/admin/products');

	}


	public function edit($id)
	{

		//return "mostrar edicion $id";

		$product = Product::find($id);
		return view('admin.products.edit') -> with(compact('product'));
	}

	public function update(Request $request, $id)
	{

		//dd($request -> all());
		
		$messages = [
			'name.required' => 'El nombre del producto es obligatorio.',
			'name.min'	=> 'La longitud mínima del nombre debe ser 3.',
			'description.required' => 'El descripción del producto es obligatoria.',
			'description.max'	=> 'La longitud mínima de la descripcion debe inferor a 200.',
			'price.required' => 'El precio es obligatorio.',
			'price.numeric' => 'El precio debe ser numérico.',
			'price.min'	=> 'El precio debe ser 0 o superior.',

		];

		$rules = [
			'name' => 'required|min:3',
			'description' => 'required|max:200',
			'price' => 'required|numeric|min:0'
		];

		$this -> validate($request, $rules, $messages);

		$product =  Product::find($id);
		$product -> name = $request -> input('name');
		$product -> description = $request -> input('description');
		$product -> price = $request -> input('price');
		$product -> long_description = $request -> input('long_description');

		$product -> save(); //Modificamos rexistro.

		return redirect('/admin/products');

	}


	public function destroy($id)
	{

		//return "mostrar edicion $id";

		$product = Product::find($id);
		$product -> delete();

		return back() ;
	}

	public function show()
	{

	}


}
