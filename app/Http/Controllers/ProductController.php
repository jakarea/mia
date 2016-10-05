<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use stdClass;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        $i=0;
        foreach ($products as $key => $value) {
           $products[$key]->status = ($products[$key]->status === 1)?"ok text-primary":"remove text-danger";
           $products[$key]->featured = ($products[$key]->featured === 1)?"ok text-primary":"remove text-danger";
           $products[$key]->sn = ++$i;
        }
        return view('products.list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create',["id" => 0]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $input = $request->all();
        $img = $request->file('uploadImageFile')->getPathName();
        $fileName = $request->file('file')->getClientOriginalExtension();
        
        if($id = $input['id']) {
            $entry = Product::find($input['id']);
            $entry->title = $input['title'];
            $entry->category = $input['category'];
            $entry->partner = $input['partner'];
            $entry->description = $input['description'];
            $entry->status = $input['status'];
            $entry->featured = $input['featured'];
            $entry->price = $input['price'];
            $entry->discount = $input['discount'];
            $entry->save();
        } else {
            $data = [];
            $data['title'] = $input['title'];
            $data['category'] = $input['category'];
            $data['partner'] = $input['partner'];
            $data['description'] = $input['description'];
            $data['status'] = $input['status'];
            $data['featured'] = $input['featured'];
            $data['price'] = $input['price'];
            $data['discount'] = $input['discount'];
            $data['file'] = $fileName;
            $id = Product::create($data)->id;
        }

         if (!file_exists('uploads/files')) {
                mkdir('uploads/files', 0777, true);
        }
        $path = base_path() . '/public/uploads/files/';
        $request->file('file')->move($path , $id.".".$fileName);
        $this->uploadImage($id,$img);

        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.create',['product'=>$product,'id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete($product);
        return redirect('products');
    }

    public function uploadImage($id,$img){
         if (!file_exists('uploads/products')) {
                mkdir('uploads/products', 0777, true);
        }
        $path = "uploads/products/";
        $dst = "uploads/products/".$id;
        
       
        if (($img_info = getimagesize($img)) === FALSE)
          die("Image not found or not an image");

        $width = $img_info[0];
        $height = $img_info[1];

        switch ($img_info[2]) {
          case IMAGETYPE_GIF  : $src = imagecreatefromgif($img);  break;
          case IMAGETYPE_JPEG : $src = imagecreatefromjpeg($img); break;
          case IMAGETYPE_PNG  : $src = imagecreatefrompng($img);  break;
          default : die("Unknown filetype");
        }

        $tmp = imagecreatetruecolor($width, $height);
        imagecopyresampled($tmp, $src, 0, 0, 0, 0, $width, $height, $width, $height);
        imagejpeg($tmp, $dst.".jpg");
    }
}
