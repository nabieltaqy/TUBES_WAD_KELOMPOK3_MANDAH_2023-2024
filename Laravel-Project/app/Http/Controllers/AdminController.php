<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\MasterController;

class AdminController extends MasterController
{
    public function edit($id)
{
    $notifPesans = $this -> pesanmasukIndex();
$notifPengajuans = $this ->pengajuanmasukIndex();
    $admin = User::findOrFail($id);
    return view('editadmin', compact('admin', 'notifPesans', 'notifPengajuans'));
}

    public function update(Request $request, $id)
{
    // Validate the form data
    $request->validate([
        'fullname' => 'required',
        'user_type' => ['required', Rule::in(['Super Admin', 'Admin', 'Teknisi', 'Keuangan'])],
        'password' => 'sometimes|confirmed|min:6', // Only validate if a password is provided
    ]);

    // Find the admin by ID
    $admin = User::findOrFail($id);

    // Update the user information
    $admin->update([
        'fullname' => $request->input('fullname'),
        'user_type' => $request->input('user_type'),
        'password' => $request->filled('password') ? bcrypt($request->input('password')) : $admin->password,
    ]);

    // Redirect to the admin settings page or wherever you want
    return redirect()->route('pengaturanadmin')->with('success', 'Admin updated successfully.');
}
    public function create()
    {
        $notifPesans = $this -> pesanmasukIndex();
        $notifPengajuans = $this ->pengajuanmasukIndex();
        return view('tambahadmin', compact('notifPesans','notifPengajuans'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        
        $request->validate([
            'username' => 'required|unique:users',
            'fullname' => 'required',
            'user_type' => ['required', Rule::in(['Super Admin', 'Admin', 'Teknisi', 'Keuangan'])],
            'password' => 'required|confirmed|min:6'
        ]);

        try {
        // Create a new user in the database
        User::create([
            'username' => $request->input('username'),
            'fullname' => $request->input('fullname'),
            'user_type' => $request->input('user_type'),
            'password' => bcrypt($request->input('password')),
        ]);

        } catch (\Exception $e) {
            // print wrong messge
            dd($e->getMessage());
        }

        // Redirect to the admin settings page or wherever you want
        return redirect()->route('pengaturanadmin')->with('success', 'Admin added successfully.');
    }
    public function destroy($id)
{
    // Find the admin by ID
    $admin = User::findOrFail($id);

    // Delete the admin
    $admin->delete();

    // Redirect to the admin settings page or wherever you want
    return redirect()->route('pengaturanadmin')->with('success', 'Admin deleted successfully.');
}
    public function pengaturanadmin()
{
    $users = User::all();
    return view('pengaturanadmin', compact('users'));
}
}
