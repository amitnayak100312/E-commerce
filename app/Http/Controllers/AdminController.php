<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function addcategory()
    {
        return view('admin.addcategory');
    }

    public function postaddcategorty(Request $request){
        $category = new Category();
        $category->category = $request->category;
        $category->save();
        return redirect()->back()->with('category_message', 'Category added successfully!');
    }
    
    public function viewCategory(){
    
    $categories = Category::all(); 

    return view('admin.viewcategory', compact('categories')); 
}
    function categorydelete($id)  {
        $category = Category::findOrFail($id);
        
        $category->delete();
        
        return redirect()->back()->with('deletecategoryMessge','Deleted successfully');
    }
    
    function categoryUpdate($id){
              $category = Category::findOrFail($id);
              return view('admin.categoryupdate',compact('category'));
    }
    
    function postupdatecategory(Request $request,$id)  {
        $category  = Category::findOrFail($id);
        
        $category->category=$request->category;
        $category->save();
        return redirect()->back()->with('category_upadated_message', 'Category Updated successfully!');
    
    }
    
    public function addProduct(){
        return view('admin.addproduct');
    }
    
    public function postaddproduct(Request $request){
        
    }
    
}
