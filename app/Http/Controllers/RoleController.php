<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Employee;
use App\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    public function index()
    {
        $data['admin'] = Admin::get();
        $data['manager'] = Manager::get();
        $data['employee'] = Employee::get();
        return view('backEnd.admin.roles.index', compact('data'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        if ($request->role == 1) {
            Admin::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'status' => $request->status,
                'password' => Hash::make($request->password)
            ]);
        } elseif ($request->role == 2) {
            Manager::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'status' => $request->status,
                'password' => Hash::make($request->password)
            ]);
        } elseif ($request->role == 3) {
            Employee::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'status' => $request->status,
                'password' => Hash::make($request->password)
            ]);
        } else {
            return back()->with('warning', 'Something Went Wrong');
        }

        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.roles')->with('success', 'User Created Successfully');
        } elseif (Auth::guard('manager')->check()) {
            return redirect()->route('manager.roles')->with('success', 'User Created Successfully');
        } else {
            return back()->with('warning', 'Something Went Wrong');
        }
    }

    public function update(Request $request)
    {
        //dd($request->all());
        if ($request->password) {
            $pass = Hash::make($request->password);
        } else {
            $pass = $request->old_password;
        }
        if ($request->old_role == 1 && $request->id == 1){
            $status = 1;
        }else{
            $status = $request->status;
        }
        if ($request->old_role == 1) {
            Admin::where('id', $request->id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'status' => $status,
                'password' => $pass
            ]);
        } elseif ($request->old_role == 2) {
            Manager::where('id', $request->id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'status' => $request->status,
                'password' => $pass
            ]);
        } elseif ($request->old_role == 3) {
            Employee::where('id', $request->id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'status' => $request->status,
                'password' => $pass
            ]);
        } else {
            return back()->with('warning', 'Something Went Wrong');
        }

        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.roles')->with('success', 'User Updated Successfully');
        } elseif (Auth::guard('manager')->check()) {
            return redirect()->route('manager.roles')->with('success', 'User Updated Successfully');
        } else {
            return back()->with('warning', 'Something Went Wrong');
        }
    }

    public function delete($id, $role)
    {
        if ($role == 1) {
            Admin::where('id', $id)->delete();
        } elseif ($role == 2) {
            Manager::where('id', $id)->delete();
        } elseif ($role == 3) {
            Employee::where('id', $id)->delete();
        } else {
            return back()->with('warning', 'Something Went Wrong');
        }

        return back()->with('success', 'Role Deleted Successfully');
    }
}
