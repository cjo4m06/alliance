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
}
