<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        $data = $request->only(['name','description']);

        $categories = new Category($data);
        if ($categories->save()){
            return redirect()->route('admin.categories')->with('success','категория успешно сохранена');
        }
        return back()->with('error','ошибка сохранения категории');
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
    public function update(Request $request, Category $categories)
    {
        $data = $request->only(['name','description']);
        $categories = $categories->fill($data);

        if ($categories->save())
        {
            return redirect()->route('admin.categories')->with('success','категория успешно изменена');
        }
        return back()->with('error','ошибка изменения категории');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
