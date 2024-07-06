<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Gate;

class UserController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($request->ajax()) {
            $query = User::with(['userType', 'roles'])->get();
            $table = Datatables::of($query);

            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'user_read';
                $editGate      = 'user_update';
                $deleteGate    = 'user_delete';
                $crudRoutePart = 'users';
                $primaryKey = 'userID';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row',
                    'primaryKey'
                ));
            });

            $table->editColumn('name', function ($row) {
                return $row->name;
            });
            $table->addColumn('email', function ($row) {
                return $row->email;
            });
            $table->addColumn('dateCreated', function ($row) {
                return $row->dateCreated;
            });

            $table->editColumn('userType', function ($row) {
                return $row->userType->userType;
            });

            $table->editColumn('roles', function ($row) {
                $labels = [];

                foreach ($row->roles as $role) {
                    $labels[] = sprintf('<span class="badge bg-info">%s</span>', $role->roleName);
                }

                return implode(' ', $labels);
            });

            $table->rawColumns(['actions','roles']);

            return $table->make(true);
        }
        return view('admin.users.index');
    }

    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = \App\Models\Role::all()->sortBy('roleName');
        return view('admin.users.create',compact('roles'));
    }

    public function store(UserStoreRequest $request)
    {
        DB::beginTransaction();
        try {
        $request->merge([
                'password' => Hash::make($request->password)
            ]);
        $request['userTypeID'] = 2;
        $user = User::create($request->except(['roleID','confirmPassword']));
        $user->roles()->attach($request->roleID);
            DB::commit();
            $request->session()->flash('message', 'User added successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'An error occurred while adding user!');
        }
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('user_read'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('user_update'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $roles = \App\Models\Role::all()->sortBy('roleName');
        $userRoles = $user->roles->map(function ($item, $key) {
            return $item->roleID;
        })->toArray();
        return view('admin.users.edit',compact('user','roles','userRoles'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        DB::beginTransaction();
        try {
            $newPassword = $user->password;
            if (strlen(trim($request->password))) {
                $newPassword = Hash::make($request->password);
            }
            $request->merge([
                'password' => $newPassword
            ]);
            $request['userTypeID'] = 2;
            $user->update($request->except(['roleID','confirmPassword']));
            $user->roles()->sync($request->roleID);
            DB::commit();
            $request->session()->flash('message', 'User updated successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'An error occurred while updating user!');
        }

        return redirect()->route('users.index');
    }

    public function destroy(User $user, Request $request)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        DB::beginTransaction();
        try {
            $user->roles()->detach();
            $user->delete();
            DB::commit();
            $request->session()->flash('message', 'User deleted successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            $request->session()->flash('error', 'An error occurred while deleting user!');
        }
        return redirect()->route('users.index');
    }

}
