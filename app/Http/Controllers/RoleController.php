<?php

namespace App\Http\Controllers;

use App\Entities\Repositories\RoleRepository;
use App\Entities\Role;
use App\Http\Requests\RoleRequest;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $roles = $this->roleRepository->getRolesByUserId(Auth::id());

        $jobs = Role::JOBS;

        return view('web.role', compact('roles', 'jobs'));
    }

    public function store(RoleRequest $request)
    {
        $request->merge([
            'user_id' => Auth::id(),
        ]);
        $this->roleRepository->createRole($request->all());

        return back()->with('success', '建立成功！');
    }
}
