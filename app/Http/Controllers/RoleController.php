<?php

namespace App\Http\Controllers;

use App\Entities\Repositories\RoleRepository;
use App\Entities\Role;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
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

        return view('web.role', compact('roles'));
    }

    public function store(RoleRequest $request)
    {
        $request->merge([
            'user_id' => Auth::id(),
        ]);
        $this->roleRepository->createRole($request->all());

        return back()->with('success', '建立成功！');
    }

    public function update(Role $role, Request $request)
    {
        if (! $role->update($request->all())) {
            return back()->withErrors($role->name . ' 角色更新錯誤');
        }

        return back()->with('success', $role->name . ' 角色更新成功');
    }

    public function delete(Request $request)
    {
        $roleId = $request->input('role_id');
        $role = $this->roleRepository->findRole($roleId);

        if (! $this->roleRepository->deleteRole($roleId)) {
            return back()->withErrors($role->name . ' 角色刪除失敗。');
        }

        return back()->with('success', $role->name . ' 角色已刪除。');
    }
}
