<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\Create;
use App\Http\Requests\Admin\News\Edit;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return \view('admin.news.index',[
            'newsList'=>News::query()
                ->status()
                ->with('category','source')
                ->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('admin.news.create',['categories'=>Category::All(),'sources'=>Source::All()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request)
    {

        $news = new News($request->validated());
        if ($news->save()){
            return redirect()->route('admin.news')->with('success', __('Was saved successfully'));
        }
        return back()->with('error',__('We can not save item, pleas try again'));
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return response()->json($this->getNews(), 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        $sources = Source::all();
        return view('admin.news.edit', [
            'categories' => $categories,
            'sources'=>$sources,
            'news' => $news,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Edit $request, News $news)
    {
        $news = $news->fill($request->validated());

        if ($news->save())
        {
            return redirect()->route('admin.news')->with('success',__('Was saved successfully'));
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
