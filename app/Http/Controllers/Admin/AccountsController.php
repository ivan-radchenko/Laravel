<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Account\Edit;
use App\Http\Requests\Admin\Account\EditPassword;
use App\Http\Requests\Admin\Categories\Create;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        return \view('admin.accounts',[
            'accounts'=>User::all()
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
    public function store(Create $request)
    {
        //
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
    public function edit(User $user)
    {
        return view('admin.editAccount', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Edit $request, user $user): RedirectResponse
    {
        $user = $user->fill($request->validated());

        if ($user->save())
        {
            return redirect()->route('admin.accounts')->with('success','данные успешно сохранены');
        }
        return back()->with('error','не удалось обновить данные');
    }

    public function updatePassword(EditPassword $request, user $user): RedirectResponse
    {
        /*        dd($request->validated());*/
        $user = $user->fill($request->validated());

        if ($user->save())
        {
            return redirect()->route('admin.accounts')->with('success','данные успешно сохранены');
        }
        return back()->with('error','не удалось обновить данные');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): JsonResponse
    {
        try{
            $user->delete();

            return response()->json('ok');

        } catch (\Exception $e) {
            \Log::error($e->getMessage(), $e->getTrace());
            return response()->json('error', 400);
        }
    }
}
