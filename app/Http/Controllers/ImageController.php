<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{
    


    public function index($id)
    {

    	$product = Product::find($id);
    	$images = $product -> images() -> orderBy('featured','desc') -> get();

    	return view('admin.products.images.index') -> with((compact('product','images')));
    }

    public function store(Request $request, $id)
    {

    	//guardar la imagen.
    	$file = $request -> file('photo');
    	$path = public_path() . '/images/products';//ruta donde se guarda.
    	$fileName = uniqid() . $file -> getClientOriginalName();
    	$moved = $file -> move($path, $fileName);

    	//crear registro en table product_images.
    	
    	if ($moved){
	    	$producImage = new ProductImage();
	    	$producImage -> image = $fileName;
	    	$producImage -> product_id = $id;
	    	$producImage -> save();
    	}

    	return back();

    	
    }

    public function destroy(Request $request)
    {

    	//eliminar archivo.
    	$producImage = ProductImage::find($request -> image_id);

    	if (substr($producImage -> image, 0, 4) ===  "http") 
    	{
    		$deleted = true;
    	}else
    	{
    		$fullPath = public_path() . '/images/products/' . $producImage -> image;
    		$deleted = File::delete($fullPath);
    	}

    	//eliminar el registro de la imagen en BD.
    	if($deleted)
    	{
    		$producImage -> delete();
    	}

    	return back();

    }

    public function select($id, $imageId)
    {

    	ProductImage::where('product_id', $id) -> update(
    		[
    			'featured' => false
    		]);

    	$productImage = ProductImage::find($imageId);
    	$productImage -> featured = true;
    	$productImage -> save();

		return back();    	
    }


}
