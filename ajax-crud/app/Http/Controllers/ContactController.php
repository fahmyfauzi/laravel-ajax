<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contact = Contact::latest()->get();

        return view('contact.index', [
            'contacts' => $contact
        ]);
    }

    public function store(Request $request)
    {
        //validasi
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:contacts,email',
            'phone' => 'required|unique:contacts,phone',
        ]);

        //cek validasi salah
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create store
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        //berhasil
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditambahkan!',
            'data' => $contact
        ]);
    }

    public function show(Contact $contact)
    {
        //menampilkan data contact
        return response()->json([
            'success' => true,
            'message' => 'Data Ditampilkan',
            'data' => $contact
        ]);
    }

    public function update(Request $request, Contact $contact)
    {
        //cek validasi
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:contacts,email,' . $contact->id,
            'phone' => 'required|unique:contacts,phone,' . $contact->id
        ]);

        //cek validasi salah
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        //update 
        $contact->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        //berhasil
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Ditampilkan',
            'data' => $contact
        ]);
    }

    public function destroy($id)
    {
        //pilih contact berdasarkan id
        Contact::where('id', $id)->delete();

        //berhasil
        return response()->json([
            'success' => true,
            'message' => 'Data Post Berhasil Dihapus!.',
        ]);
    }
}
