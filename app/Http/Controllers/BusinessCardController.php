<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessCard;
use Illuminate\Support\Str;

class BusinessCardController extends Controller
{
    // Menampilkan semua kartu nama
    public function index()
    {
        $businessCards = BusinessCard::all();
        return view('business_cards.index', compact('businessCards'));
    }

    // Menampilkan form untuk membuat kartu nama baru
    public function create()
    {
        return view('business_cards.create');
    }

    // Menyimpan kartu nama baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required|email',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Buat kartu nama baru dengan UUID sebagai ID
        $businessCard = new BusinessCard();
        $businessCard->id = Str::uuid()->toString(); // Menggunakan UUID sebagai ID
        $businessCard->fill($request->all());
        $businessCard->save();

        return redirect()->route('business_cards.index')
            ->with('success', 'Kartu nama berhasil ditambahkan.');
    }

    // Menampilkan detail kartu nama
    public function show($id)
    {
        $businessCard = BusinessCard::findOrFail($id);
        return view('business_cards.show', compact('businessCard'));
    }


    // Menampilkan form untuk mengedit kartu nama
    public function edit($id)
    {
        $businessCard = BusinessCard::findOrFail($id);
        return view('business_cards.edit', compact('businessCard'));
    }


    // Mengupdate kartu nama yang ada di database
    public function update(Request $request, BusinessCard $businessCard)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_telepon' => 'required',
            'email' => 'required|email',
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        $businessCard->update($request->all());

        return redirect()->route('business_cards.index')
            ->with('success', 'Kartu nama berhasil diperbarui.');
    }

    // Menghapus kartu nama dari database
    public function destroy($id)
    {
        // Mencari kartu nama dengan UUID dan menghapusnya
        BusinessCard::findOrFail($id)->delete();

        return redirect()->route('business_cards.index')
            ->with('success', 'Kartu nama berhasil dihapus.');
    }
}
