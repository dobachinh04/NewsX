<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

use Exception;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function index()
    {
        $data = Tag::get();

        return view('admin.tags.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Tag::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('admin.tags.index')->with('success', 'Thêm thành công');
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
        $tag = Tag::findOrFail($id);

        return view('admin.tags.update', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $tag = Tag::findOrFail($id);
        $tag->update([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('admin.tags.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Tìm category theo ID và xóa nó
        $tag = Tag::findOrFail($id);
        $tag->delete();

        // Chuyển hướng về trang danh sách categories với flash session thành công
        return redirect()->route('admin.tags.index')->with('success', 'Xóa thành công');
    }
}
