<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\order;
use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return \view('admin.orders',[
            'orderList'=>order::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(order $orders)
    {
        return response()->json($this->getNews(), 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $orders)
    {
        $categories = Category::all();
        $sources = Source::all();
        return view('admin.editOrder', [
            'categories' => $categories,
            'sources'=>$sources,
            'orders' => $orders,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order $orders)
    {
        $data = $request->only(['customer','phone','email','category_id','source_id','description']);
        $orders = $orders->fill($data);

        if ($orders->save())
        {
            return redirect()->route('admin.orders')->with('success','заказ успешно изменен');
        }
        return back()->with('error','ошибка изменения заказа');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
