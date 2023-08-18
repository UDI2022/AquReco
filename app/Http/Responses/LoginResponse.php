<?php 
namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Session;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        // ログインに成功した場合
        if ($request->wantsJson()) {
            // JSONレスポンスが要求された場合
            return response()->json(['message' => 'Login success'], 200);
        } else {
            // 通常のリクエストの場合
            $role = $request->user()->role;

            // ログイン済フラグをセッションに保存
            Session::put('is_logged_in', true);

            // TopPageにリダイレクト
            return redirect()->intended('TopPage')->with('role', $role);
        }
    }

    public function toFailedResponse($request)
    {
        // ログインに失敗した場合
        if ($request->wantsJson()) {
            // JSONレスポンスが要求された場合
            return response()->json(['message' => 'Login failed'], 422);
        } else {
            // 通常のリクエストの場合
            return redirect()->intended('Main');
        }
    }
}