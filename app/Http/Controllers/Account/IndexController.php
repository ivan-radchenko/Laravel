<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Account\Edit;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index():View
    {
        $userId= Auth::user()->id;
/*        dd(User::all()->find($userId));*/
        return \view('account.index',['user'=>User::all()->find($userId)]);
    }

    public function update(Edit $request, user $users): RedirectResponse
    {
        $users = $users->fill($request->validated());

        if ($users->save())
        {
            return redirect()->route('account')->with('success','данные успешно сохранены');
        }
        return back()->with('error','не удалось обновить данные');
    }
}
