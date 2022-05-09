<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OxyProducer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OxyProducerController extends Controller
{
    public function index()
    {
        $categories = OxyProducer::paginate(8);
        return view('admin.oxy_producer.index')
            ->with('categories', $categories);
    }
    protected function checkSlug($slug)
    {
        if (OxyProducer::where('slug', $slug)->count() > 0) {
            $slug = $slug . '-' . Carbon::now()->timestamp;
        }
        return $slug;
    }
    protected function checkName($name)
    {
        if (OxyProducer::where('name', $name)->count() > 0) {
            $name = $name . '-' . Carbon::now()->timestamp;
        }
        return $name;
    }

    public function read(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->search;
            $search = str_replace(" ", "%", $search);
            $categories = OxyProducer::where('name', 'like', '%' . $search . '%')->paginate(8);
            return view('admin.oxy_producer.read')
                ->with('categories', $categories)->render();
        }
    }
    public function create()
    {
        return view('admin.oxy_producer.create');
    }
    public function store(Request $request)
    {
        $category_id = $request->id;
        if ($category_id) {
            $category = OxyProducer::find($category_id);
            $category->name = $this->checkName($request->name);
            $category->slug = $this->checkSlug(Str::slug($category->name));
            $category->update();
            return response()->json(['message' => 'Cập nhật danh mục thành công']);
        } else {
            $category = new OxyProducer();
            $category->name = $this->checkName($request->name);
            $category->slug = $this->checkSlug(Str::slug($category->name));
            $category->save();
            return response()->json(['message' => 'Thêm danh mục thành công']);
        }
    }
    public function edit($id)
    {
        $category = OxyProducer::find($id);
        return view('admin.oxy_producer.edit')
            ->with(compact('category'));
    }
    public function remove($id)
    {
        $category = OxyProducer::find($id);
        $category->delete();
        return response()->json([
            'message' => 'Xoá danh mục thành công'
        ]);
    }
}
