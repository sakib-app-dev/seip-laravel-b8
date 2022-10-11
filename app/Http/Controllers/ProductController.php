<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::pluck('name', 'id')->toArray();

        return view('products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = [
            'name' => $request->name,
            'is_active' => $request->is_active ? true : false,
            'image' =>  $this->uploadImage($request->file('image'))
        ];

        Product::create($data);

        return redirect()
            ->route('products.index')
            ->withMessage('Created Successfully!');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('Product'));
    }

    public function update(ProductRequest $request,Product $product)
    {
        $data = [
            'name' => $request->name,
            'is_active' => $request->is_active ? true : false,
        ];

        if($request->hasFile('image')){
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        $product->update($data);

        return redirect()
            ->route('products.index')
            ->withMessage('Updated Successfully!');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('Product'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()
            ->route('products.index')
            ->withMessage('Deleted Successfully!');
    }

    public function trash()
    {
        $products = Product::onlyTrashed()->get();
        return view('products.trash', compact('products'));
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->find($id);
        $product->restore();

        return redirect()
            ->route('products.trash')
            ->withMessage('Restored Successfully!');
    } 

    public function delete($id)
    {
        $product = Product::onlyTrashed()->find($id);
        $product->forceDelete();

        return redirect()
            ->route('products.trash')
            ->withMessage('Deleted Successfully!');
    } 

    public function downloadPdf()
    {
        $products = Product::all();
        $pdf = Pdf::loadView('products.pdf', compact('products'));
        return $pdf->download('Product-list.pdf');
    }

    public function uploadImage($file){
        $fileName = date('y-m-d').'-'.time().'.'.$file ->getClientOriginalExtension();
        // $file->move(storage_path('app/public/products'), $fileName);

        Image::make($file)
                ->resize(200, 200)
                ->save(storage_path() . '/app/public/products/' . $fileName);

        return $fileName;
    }
}
