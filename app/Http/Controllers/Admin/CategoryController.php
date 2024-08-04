<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::get();

        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Tạo mới category
        Category::create([
            'name' => $request->input('name'),
        ]);

        // Chuyển hướng về index category và truyền thêm flash session success
        return redirect()->route('admin.categories.index')->with('success', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.update', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Lấy category theo ID và cập nhật dữ liệu
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->input('name'),
        ]);

        // Chuyển hướng về trang danh sách categories với flash session thành công
        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Tìm category theo ID và xóa nó
        $category = Category::findOrFail($id);
        $category->delete();

        // Chuyển hướng về trang danh sách categories với flash session thành công
        return redirect()->route('admin.categories.index')->with('success', 'Xóa thành công');
    }

}
