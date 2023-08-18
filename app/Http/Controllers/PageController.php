<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function page1()
    {
        $user = Auth::user();// ログインしているユーザ情報を取得
        $email = $user->email; // ログインしチエルユーザのメールアドレスを取得

        // 一般ユーザ向けのページ
        return Inertia::render('Main', ['userEmail' => $email]);
    }

    public function page2(Request $request)
    {
        // 管理ユーザ向けのページ
        $roles = $request->input('roles', []); // ロール情報を配列として取得
        return Inertia::render('AdMain', ['roles' => $roles]);
    }

    public function page3(Request $request)
    {
        // マスターユーザ向けのページ
        $roles = $request->input('roles', []); // ロール情報を配列として取得
        return Inertia::render('AdMain', ['roles' => $roles]);
    }
}