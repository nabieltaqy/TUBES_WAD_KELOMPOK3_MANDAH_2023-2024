<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Http\Controllers\MasterController;

class CustomersController extends MasterController
{
    

    public function index(Request $request)
    {
        $notifPesans = $this -> pesanmasukIndex();
        $notifPengajuans = $this ->pengajuanmasukIndex();

        $keyword = $request->keyword;
        $kontaks = Customers::where('fullnameCustomer', 'LIKE','%'.$keyword.'%')
        ->orWhere('username', 'LIKE','%'.$keyword.'%')
        ->orWhere('address', 'LIKE', '%'.$keyword.'%')
        ->orWhere('phonenumber', 'LIKE', '%'.$keyword.'%')
        ->orWhere('email', 'LIKE', '%'.$keyword.'%')
        ->paginate(5);

        return view('listKontak', ['kontaks' => $kontaks, 'keyword' => $keyword, 'notifPesans' => $notifPesans , 'notifPengajuans' => $notifPengajuans]);
    }

    public function create()
    {
        $notifPesans = $this -> pesanmasukIndex();
        $notifPengajuans = $this ->pengajuanmasukIndex();

        return view('tambahkontakbaru', compact('notifPesans', 'notifPengajuans'));
    }

    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'username' => 'required|unique:customers',
            'fullnameCustomer' => 'required',
            'phonenumber' => 'required|numeric',
            'password' => 'required|confirmed|min:6',
            'address' => 'required',
            'email' => 'required|email|unique:customers',
        ]);

        // Simpan data ke dalam database
        Customers::create([
            'username' => $request->input('username'),
            'fullnameCustomer' => $request->input('fullnameCustomer'),
            'phonenumber' => $request->input('phonenumber'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
        ]);

        return redirect()->route('listKontak')
            ->with('success', 'Kontak baru berhasil ditambahkan');
    }

    public function edit($id)
{
    $notifPesans = $this -> pesanmasukIndex();
    $notifPengajuans = $this ->pengajuanmasukIndex();
    $kontak = Customers::find($id);

    return view('edittambahkontak', compact('kontak', 'notifPesans', 'notifPengajuans'));
}

    public function update(Request $request, $id)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'username' => 'required|unique:customers,username,' . $id,
            'fullnameCustomer' => 'required',
            'phonenumber' => 'required|numeric',
            'address' => 'required',
            'email' => 'required|email|unique:customers,email,' . $id,
        ]);

        // Update data in the database
        Customers::find($id)->update([
            'username' => $request->input('username'),
            'fullnameCustomer' => $request->input('fullnameCustomer'),
            'phonenumber' => $request->input('phonenumber'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
        ]);

        return redirect()->route('listKontak')
            ->with('success', 'Kontak berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus data dari database
        Customers::destroy($id);

        return redirect()->route('listKontak')
            ->with('success', 'Kontak berhasil dihapus');
    }
}
