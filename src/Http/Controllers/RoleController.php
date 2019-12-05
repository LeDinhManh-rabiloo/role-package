<?php

namespace Manhle\RolePackage\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\RoleDataTable;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RoleDataTable $table)
    {
        return $table->render('backs.pages.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role();
        $allPermissions = Permission::all();
        $inPermissions = [];

        return view('backs.pages.roles.create', compact('allPermissions', 'role', 'inPermissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required',
        ]);

        $role = Role::create($data);

        $this->syncPermissions($role, $request);

        // TODO: Flash message
        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return $this->edit($role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $allPermissions = Permission::all();
        $inPermissions = $role->getPermissionNames()->toArray();

        return view('backs.pages.roles.update', compact('allPermissions', 'role', 'inPermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $data = $this->validate($request, [
            'name' => 'required',
        ]);

        $role->fill($data)->saveOrFail();

        $this->syncPermissions($role, $request);

        // TODO: Flash message

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        // TODO: Don't allow delete assigned role
        if (false) {
            $role->delete();
            // TODO: Flash message
        } else {
            // TODO: Flash message
        }

        return redirect()->route('roles.index');
    }
}
