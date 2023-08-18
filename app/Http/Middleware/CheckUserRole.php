<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $userRole = auth()->user()->role;

        // ログインしているユーザーのロールが許可されているロールに含まれているかチェック
        if (!in_array($userRole, $roles)) {
            abort(403, 'Unauthorized action.');
        }

        // ロール情報を配列として$requestに追加
        $request->merge(['roles' => $roles]);

        return $next($request);
    }
}
