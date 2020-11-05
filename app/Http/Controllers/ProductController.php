<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5); 
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('image'))
        {
            $this->validate($request, [
                'name' => 'required|unique:products',
                'description' => 'required',
                'count' => 'required|numeric',
                'price' => 'required|numeric',
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'category_id' => 'required'
            ]);

            $image = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $image);

            Product::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'count' => $request->input('count'),
                'price' => $request->input('price'),
                'image' => $image,
                'category_id' => $request->input('category_id')
            ]);
        }
        else
        {
            $this->validate($request, [
                'name' => 'required|unique:products',
                'description' => 'required',
                'count' => 'required|numeric',
                'price' => 'required|numeric',
                'category_id' => 'required'
            ]);

            Product::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'count' => $request->input('count'),
                'price' => $request->input('price'),
                'category_id' => $request->input('category_id')
            ]);
        }

        Session::flash('message', 'Product successfully created!'); 
        Session::flash('alert-class', 'alert-success'); 

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('products.show', compact('product','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product','categories'));
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
        if($request->file('image'))
        {
            $this->validate($request, [
                'name' => 'required|max:255|unique:products,name,'.$id,
                'description' => 'required',
                'count' => 'required|numeric',
                'price' => 'required|numeric',
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $old_image = $request->old_image;
            if($old_image != "") {
                File::delete(public_path('images/'.$old_image));
            }

            $image = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $image);
    
            $product = Product::findOrFail($id);
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->count = $request->input('count');
            $product->price = $request->input('price');
            $product->image = $image;
        }
        else
        {
            $this->validate($request, [
                'name' => 'required|max:255|unique:products,name, '.$id,
                'description' => 'required',
                'count' => 'required|numeric',
                'price' => 'required|numeric',
            ]);
    
            $product = Product::findOrFail($id);
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->count = $request->input('count');
            $product->price = $request->input('price');
        }

        $product->update();

        Session::flash('message', 'Product successfully updated!'); 
        Session::flash('alert-class', 'alert-success'); 

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        Session::flash('message', 'Product successfully deleted!'); 
        Session::flash('alert-class', 'alert-success'); 

        $products = Product::paginate(5); 

        return view('products.index', compact('products'));
    }
}
