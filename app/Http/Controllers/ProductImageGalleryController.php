<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImageGallery;
use Illuminate\Http\Request;

class ProductImageGalleryController extends Controller
{
    public function index($id)
    {
       
        $product = Product::with('images')->find($id);
     
        // $galleryimages = ProductImageGallery::where('product_id', $id)->get();
        return view('backend.product.gallery', get_defined_vars());
    }

    public function store( Request $request)
    {


        $this->validate($request, [
            'gallaryimage' => 'required',
            'gallaryimage.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        foreach($request->gallaryimage as $image)
        {
        
            $productImageGallery = new ProductImageGallery();
            $productImageGallery->product_id = $request->product_id;
            $productImageGallery->image = uploadFile($image, 'Uploads/ productImages', 'productImage'.$request->product_id.'-'.rand(11111111111111,999999999999));
            $productImageGallery->save();
        }

        return back()->with('success', 'Image Uploaded successfully');
    }

    public function galleryDelete($id)
    {
        $image = ProductImageGallery::find($id);
        $image->delete();
        return redirect()->route('product.gallery', $image->product_id)->with('success', 'Product Gallery Deleted Successfully');
    }

    public function galleryDeleteAll($id)
    {
        // dd($id);
        $images = ProductImageGallery::where('product_id', $id)->get();
        foreach ($images as $image) {
            $image->delete();
        }
        // dd($image);
        // $image->delete();
        return redirect()->back()->with('success', 'Product Gallery Deleted Successfully');
    }
   
}
