<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\Create;
use App\Http\Requests\Admin\Categories\Edit;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        return \view('admin.news.categories',[
            'categories'=>Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('admin.news.createCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request)
    {
        $categories = new Category($request->validated());
        if ($categories->save()){
            return redirect()->route('admin.categories')->with('success',__('Was saved successfully'));
        }
        return back()->with('error',__('We can not save item, pleas try again'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $categories)
    {
        return view('admin.news.editCategory', [
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Edit $request, Category $categories)
    {
        $categories = $categories->fill($request->validated());

        if ($categories->save())
        {
            return redirect()->route('admin.categories')->with('success',__('Was saved successfully'));
        }
        return back()->with('error',__('We can not save item, pleas try again'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
