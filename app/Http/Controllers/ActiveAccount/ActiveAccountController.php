<?php

namespace App\Http\Controllers\ActiveAccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Carbon\Carbon;

use App\Http\Requests\ActiveAccount\ActiveAccountRequest;
use Redirect;

class ActiveAccountController extends Controller
{
    public function show(Request $request) 
    {
        return view('active_account.index', ['user_id'=>$request->id]);
    }

    public function store(ActiveAccountRequest $request) 
    {
        $user = User::whereCodeConfirm($request->code)->first();
        if ($user) {
            $user->update([
                'code_confirm'=>null,
                'email_verified_at'=>Carbon::now()
            ]);
            return redirect('/login')->with("success", "Ya puedes iniciar sesion");
        }
        return view('active_account.index')->with(['warning' => 'El código es invalido']);
        //return view('active_account.index', ['warning' => 'El código es invalido']);
    }
}
