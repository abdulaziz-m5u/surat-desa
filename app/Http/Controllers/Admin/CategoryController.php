<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\Admin\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        if($request->validated()) {
            $image = $request->file('template')->store(
                'images', 'public'
            );
            Category::create($request->except('template') + [ 'template' => $image ]);
        }

        return redirect()->route('admin.categories.index')->with([
            'message' => 'Berhasil dibuat',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request,Category $category)
    {
        if($request->validated()) {
            if ($request->template) {
                unlink('storage/'. $category->template);
                $image = $request->file('template')->store(
                    'images', 'public'
                );
                $category->update($request->except('template') + [ 'template' => $image ]);
            }else {
                $category->update($request->except('template'));
            }
        }

        return redirect()->route('admin.categories.index')->with([
            'message' => 'Berhasil diedit',
            'alert-type' => 'info'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with([
            'message' => 'Berhasil dihapus',
            'alert-type' => 'danger'
        ]);
    }

     /**
     * Delete all selected Permission at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        Category::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
