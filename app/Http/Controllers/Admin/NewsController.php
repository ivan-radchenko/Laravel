<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\Create;
use App\Http\Requests\Admin\News\Edit;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use App\Services\Contracts\Upload;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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
    public function store(Create $request, Upload $upload): RedirectResponse
    {
        $validated = $request->validated();
        if ($request->hasFile('image')){
            $validated['image'] = $upload->upload($request->file('image'));
        }

        $news = new News($validated);
        if ($news->save()){
            return redirect()->route('admin.news')->with('success', __('Was saved successfully'));
        }
        return back()->with('error',__('We can not save item, pleas try again'));
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news): JsonResponse
    {
        return response()->json($this->getNews(), 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news):view
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
    public function update(Edit $request, News $news, Upload $upload): RedirectResponse
    {
        $validated = $request->validated();
        if ($request->hasFile('image')){
            $validated['image'] = $upload->upload($request->file('image'));
        }

        $news = $news->fill($validated);

        if ($news->save())
        {
            return redirect()->route('admin.news')->with('success',__('Was saved successfully'));
        }
        return back()->with('error',__('We can not save item, pleas try again'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news): JsonResponse
    {
        try{
            $news->delete();

            return response()->json('ok');

        } catch (\Exception $e) {
            \Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
