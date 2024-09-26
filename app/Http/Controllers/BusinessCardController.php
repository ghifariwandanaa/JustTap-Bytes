<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessCard;
use Illuminate\Support\Str;

class BusinessCardController extends Controller
{
    // Menampilkan semua kartu nama
    public function index(Request $request)
    {
        $search = $request->get('search');
        $perPage = $request->get('per_page', 10); // Default 10 data per halaman
        $sortBy = $request->get('sort_by', 'nama'); // Default sorting by 'nama'
        $sortDirection = $request->get('sort_direction', 'asc'); // Default sorting direction 'asc'

        $businessCards = BusinessCard::when($search, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        })
            ->orderBy($sortBy, $sortDirection)
            ->paginate($perPage);

        return view('business_cards.index', compact('businessCards', 'search', 'perPage', 'sortBy', 'sortDirection'));
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
            'custom_link' => 'nullable|url', // Menambahkan validasi untuk custom_link
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        // Buat kartu nama baru dengan UUID sebagai ID
        $businessCard = new BusinessCard();
        $businessCard->id = Str::uuid()->toString(); // Menggunakan UUID sebagai ID
        $businessCard->fill($request->all()); // Mengisi semua field dari request
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
            'custom_link' => 'nullable|url', // Menambahkan validasi untuk custom_link
            // tambahkan validasi lainnya sesuai kebutuhan
        ]);

        $businessCard->update($request->all()); // Memperbarui semua field dari request

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
