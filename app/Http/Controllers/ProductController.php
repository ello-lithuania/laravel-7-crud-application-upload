<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class ProductController extends Controller
{
    public function index()
    {
        // get data and sent to product page
        $product = DB::table('products')->latest()->paginate(4);
        return view('product.index',compact('product'));
    }
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        // save data to database
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;

        // upload image
        $image = $request->file('logo');
        if($image){
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'media/';
            $image_url = $upload_path . $image_full_name; 

            // move
            $success = $image->move($upload_path, $image_full_name);

            $data['logo'] = $image_url;
        }
        $product = DB::table('products')->insert($data);
        // with(ID) , ID - response id
        return redirect()->
        route('product.index')->
        with('success', 'Product Created Successfully');
    }
    public function edit($id) {
        $product = DB::table('products')->where('id', $id)->first();
        return view('product.edit', compact('product'));
    }
    public function update(Request $request, $id) {

        $oldlogo = $request->old_logo;

        // save data to database
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;

        // upload image
        $image = $request->file('logo');
        if($image){
            unlink($oldlogo);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'media/';
            $image_url = $upload_path . $image_full_name; 

            // move
            $success = $image->move($upload_path, $image_full_name);

            $data['logo'] = $image_url;
        }
        $product = DB::table('products')->where('id', $id)->update($data);
        // with(ID) , ID - response id
        return redirect()->
        route('product.index')->
        with('success', 'Product Updated Successfully');
    }
    public function delete($id) {
        $data = DB::table('products')->where('id', $id)->first();
        $image = $data->logo;
        unlink($image);
        $product = DB::table('products')->where('id', $id)->delete(); 
        return redirect()->
        route('product.index')->
        with('success', 'Product Deleted Successfully');
    }
    public function show($id) {
        $data = DB::table('products')->where('id', $id)->first();
        return view('product.show', compact('data'));
    }
}
