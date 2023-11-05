<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductsController extends Controller
{
    //Index Page
    public function index(){
        if (!Auth::check() && !Request::is('login')){
            return Redirect()->route('login')->with('error', 'You must be logged in to access this page!');
        }else{
            $products = Products::all();
            return view('products.index',compact('products'));
        }
    }

    public function AddProducts(){
        if (!Auth::check() && !Request::is('login')){
            return Redirect()->route('login')->with('error', 'You must be logged in to access this page!');
        }else{
            return view('products.add');
        }
    }

    public function StoreProducts(Request $request){
        Products::insert([
            'name'=>$request->name,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'description'=>$request->description,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('products')->with('success','Products Inserted Successful');
    }

    public function UpdateProducts($id){
        if (!Auth::check() && !Request::is('login')){
            return Redirect()->route('login')->with('error', 'You must be logged in to access this page!');
        }else{
            $products = Products::find($id);
            return view('products.update',compact('products'));
        }
    } 

    public function StoreUpdateProducts(Request $request){
        $id = $request->id;
        
        $data = array();
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['stock'] = $request->stock;
        $data['description'] = $request->description;
        $data['updated_at'] = Carbon::now();
        DB::table('products')->where('id',$id)->update($data);

        return Redirect()->route('products')->with('success','Products Updated Successful');
    }

    public function DeleteProducts($id){
        $delete = Products::find($id)->delete();
        return Redirect()->route('products')->with('success','Products Deleted Successful');
    }
}
