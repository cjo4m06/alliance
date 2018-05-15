<?php

namespace App\Http\Controllers;

use App\Entities\Repositories\GuildRepository;
use App\Entities\Repositories\UserRepository;
use App\Http\Requests\AuthenticateRequest;
use App\Http\Requests\RegisterRequest;
use Auth;

class AuthController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;
    /**
     * @var GuildRepository
     */
    protected $guildRepository;

    public function __construct(UserRepository $userRepository,
                                GuildRepository $guildRepository)
    {
        $this->userRepository = $userRepository;
        $this->guildRepository = $guildRepository;
    }

    public function show()
    {
        $guilds = $this->guildRepository->getAllGuild();

        return view('register', compact('guilds'));
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->only(['account', 'password', 'name', 'guild_id']);
        $this->userRepository->registerByAccountPassword($data);

        return redirect()->route('web.login')->with('success', '需王族在後台開通才算正式完成註冊。');
    }

    public function login()
    {
        return view('login');
    }

    public function authenticate(AuthenticateRequest $request)
    {
        $attempt = $request->only('account', 'password');
        $account = Auth::once($attempt);
        $attempt['is_active'] = true;

        if (Auth::attempt($attempt, $request->has('remember'))) {
            return redirect()->route('web.index');
        }

        $message = '帳號或密碼錯誤';
        if ($account) {
            $message = '帳號未開通，請找幹部開通！';
        }

        return back()->withInput()->withErrors($message);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
