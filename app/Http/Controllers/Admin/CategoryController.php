<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::get();

        return view('admin.categories.index', compact('data'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $request->validate([
                    'name' => 'required',
                    'image' => 'required|image',
                ]);

                $dataPost = [
                    'name' => $request->name,
                ];

                if ($request->hasFile('image')) {
                    $dataPost['image'] = Storage::put('images/categories', $request->file('image'));
                }

                Category::query()->create($dataPost);
            });

            return redirect()->route('admin.categories.index')->with('success', 'Thêm thành công');
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function show(Category $category)
    {
    }

    public function edit(Category $category)
    {
        return view('admin.categories.update', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        try {
            DB::transaction(function () use ($request, $category) {
                $request->validate([
                    'name' => 'required',
                    'image' => 'nullable|image',
                ]);

                $dataPost = [
                    'name' => $request->name,
                ];

                // Cập nhật ảnh nếu có
                if ($request->hasFile('image')) {
                    // Xóa ảnh cũ nếu cập nhật
                    if ($category->image && Storage::exists($category->image)) {
                        Storage::delete($category->image);
                    }

                    // Cập nhật ảnh mới
                    $dataPost['image'] = Storage::put('images/categories', $request->file('image'));
                }

                $category->update($dataPost);
            });

            return redirect()->route('admin.categories.index')->with('success', 'Cập nhật thành công');
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

    public function destroy(Category $category)
    {
        try {
            DB::transaction(function () use ($category) {
                // Xóa bài viết
                $category->delete();
            });

            // Xóa ảnh
            if ($category->image && Storage::exists($category->image)) {
                Storage::delete($category->image);
            }

            return redirect()->route('admin.categories.index')->with('success', 'Xóa thành công');
        } catch (Exception $e) {
            return back()->withErrors($e->getMessage())->withInput();
        }
    }

}
