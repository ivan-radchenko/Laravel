<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Rss\Create;
use App\Http\Requests\Admin\Rss\Edit;
use App\Models\Rss;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class RssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        return \view('admin.rss',[
            'rsses'=>Rss::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('admin.createRss');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request)
    {
        $rsses = new Rss($request->validated());
        if ($rsses->save()){
            return redirect()->route('admin.rss')->with('success',__('Was saved successfully'));
        }
        return back()->with('error',__('We can not save item, pleas try again'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Rss $rsses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rss $rsses)
    {
        return view('admin.editRss', [
            'rsses' => $rsses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Edit $request, Rss $rsses)
    {
        $rsses = $rsses->fill($request->validated());

        if ($rsses->save())
        {
            return redirect()->route('admin.rss')->with('success',__('Was saved successfully'));
        }
        return back()->with('error',__('We can not save item, pleas try again'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rss $rsses): JsonResponse
    {
        try{
            $rsses->delete();

            return response()->json('ok');

        } catch (\Exception $e) {
            \Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
