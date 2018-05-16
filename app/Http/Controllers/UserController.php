<?php

namespace App\Http\Controllers;

use App\Entities\Repositories\UserRepository;
use App\Entities\User;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $user = Auth::user();

        return view('web.user', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        if (! $user->update($request->all())) {
            return back()->withErrors('修改錯誤！');
        }

        return back()->with('success', '修改完成！');
    }

    public function password(User $user, PasswordRequest $request)
    {
        if (! $user->update($request->only('password'))) {
            return back()->withErrors('密碼修改錯誤！');
        }

        return back()->with('success', '密碼修改完成！');
    }

    public function manage(Request $request)
    {
        $keywords = $request->input('keywords', null);
        $users = $this->userRepository->getMember($keywords);

        return view('web.userManage', compact('users', 'keywords'));
    }


    public function disableManage(User $user)
    {
        if (! $user->update(['is_manager' => false])) {
            return back()->withErrors($user->name . ' 取消權限失敗。');
        }

        return back()->with('success', $user->name . ' 已取消權限。');
    }

    public function enableManage(User $user)
    {
        if (! $user->update(['is_manager' => true])) {
            return back()->withErrors($user->name . ' 受予權限失敗。');
        }

        return back()->with('success', $user->name . ' 已受予權限。');
    }
}
