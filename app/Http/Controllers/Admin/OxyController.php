<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Oxy;
use App\Models\OxyProducer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class OxyController extends Controller
{
    public function index(Request $request)
    {
        $products = Oxy::latest()->paginate(8);
        return view('admin.oxy_product.index')
            ->with(compact('products'));
    }

    protected function checkSlug($slug)
    {
        if (Oxy::where('slug', $slug)->count() > 0) {
            $slug = $slug . '-' . Carbon::now()->timestamp;
        }
        return $slug;
    }

    public function read(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->search;
            $search = str_replace(" ", "%", $search);
            $products = Oxy::where('name', 'like', '%' . $search . '%')->latest()->paginate(8);
            return view('admin.oxy_product.read')
                ->with('products', $products)->render();
        }
    }
    public function create()
    {
        $categories = OxyProducer::all();
        return view('admin.oxy_product.create')
            ->with(compact('categories'));
    }
    public function store(Request $request)
    {
        $product_id = $request->id;
        if ($product_id) {
            $product = Oxy::find($product_id);
            $this->updateProduct($request, $product);
            return response()->json(['message' => 'Cập nhật sản phẩm thành công']);
        } else {
            $this->addProduct($request);
            return response()->json(['message' => 'Thêm sản phẩm thành công']);
        }
    }

    public function addProduct($request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('assets/images/products/');
            $image->move($path, $fileName);
        }
        $product = new Oxy();
        $product->name = $request->name;
        $product->slug = $this->checkSlug(Str::slug($product->name));
        $product->short_desc = $request->short_desc;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->quantity = $request->quantity;
        $product->image = $fileName;
        $product->oxy_producer_id = $request->oxy_producer_id;
        $product->save();
    }
    public function updateProduct($request, $product)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('assets/images/products/');
            $image->move($path, $fileName);
            File::delete(public_path('assets/images/products/' . $product->image));
            $image = $fileName;
        } else {
            $image = $product->image;
        }
        $product->name = $request->name;
        $product->slug = $this->checkSlug(Str::slug($product->name));
        $product->short_desc = $request->short_desc;
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->quantity = $request->quantity;
        $product->image = $image;
        $product->oxy_producer_id = $request->oxy_producer_id;
        $product->update();
    }

    public function edit($id)
    {
        $categories = OxyProducer::all();
        $product = Oxy::find($id);
        return view('admin.oxy_product.edit')
            ->with([
                'categories' => $categories,
                'product' => $product
            ]);
    }
    public function remove($id)
    {
        $product = Oxy::find($id);
        File::delete(public_path('assets/images/products/' . $product->image));
        $product->delete();
        return response()->json([
            'message' => 'Xoá sản phẩm thành công'
        ]);
    }
}
