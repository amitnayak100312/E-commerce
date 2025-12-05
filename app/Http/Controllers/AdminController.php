<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;

class AdminController extends Controller
{

    //category details

    //add a category
    public function addcategory()
    {
        return view('admin.addcategory');
    }

    //funtion add category
    public function postaddcategorty(Request $request)
    {
        $category = new Category();
        $category->category = $request->category;
        $category->save();
        return redirect()->back()->with('category_message', 'Category added successfully!');
    }

    //view category
    public function viewCategory()
    {
        $categories = Category::paginate(2);
        return view('admin.viewcategory', compact('categories'));
    }

    //delete a category
    function categorydelete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('deletecategoryMessge', 'Deleted successfully');
    }

    //update a category
    function categoryUpdate($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categoryupdate', compact('category'));
    }

    //funtion a update category
    function postupdatecategory(Request $request, $id)
    {
        $category  = Category::findOrFail($id);

        $category->category = $request->category;
        $category->save();
        return redirect()->back()->with('category_upadated_message', 'Category Updated successfully!');
    }

    // search a category
    public function search(Request $request)
    {
        $categories = Category::where('category', 'LIKE', '%' . $request->search . '%')->paginate(2);
        return view('admin.viewcategory', compact('categories'));
    }


    //product details


    //add a product
    public function addProduct()
    {
        $categories = Category::all();
        return view('admin.addproduct', compact('categories'));
    }

    //add funtion product
    public function postaddproduct(Request $request)
    {
        $product = new Product();
        $product->product_title = $request->product_titel;
        $product->product_description = $request->product_description;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;

        $image = $request->product_image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $product->product_image = $imagename;
        }

        $product->product_category = $request->porduct_category;
        $product->save();

        if ($image && $product->save()) {
            $request->product_image->move('products', $imagename);
        }

        return redirect()->back()->with('product_message', 'Products Add Successfully!');
    }


    //view product
    public function viewProduct()
    {
        $products = Product::paginate(2);

        return view('admin.viewproduct', compact('products'));
    }

    //delete a product
    public function deleteProdcut($id)
    {
        $product = Product::findOrFail($id);
        $image_path = public_path('products/' . $product->product_image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $product->delete();
        return redirect()->back()->with('deleteprodcutMessge', 'Deleted successfully!');
    }

    //update a product

    function productUpdate($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.productupdate', compact('product', 'categories'));
    }

    //funtion a update product
    function postupdateproduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->product_title = $request->product_titel;
        $product->product_description = $request->product_description;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;

        $image = $request->product_image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $product->product_image = $imagename;
        }

        $product->product_category = $request->porduct_category;
        $product->save();

        if ($image && $product->save()) {
            $request->product_image->move('products', $imagename);
        }

        return redirect()->back()->with('productUpdateMsg', 'Product Updated successfully!');
    }
    //search product
    public function searchproduct(Request $request)
    {
        $products = Product::where('product_title', 'LIKE', '%' . $request->search . '%')
            ->orWhere('product_category', 'LIKE', '%' . $request->search . '%')
            ->orWhere('product_description', 'LIKE', '%' . $request->search . '%')
            ->paginate(2);
        return view('admin.viewproduct', compact('products'));
    }
}
