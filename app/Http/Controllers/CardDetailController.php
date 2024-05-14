<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessCard;

class CardDetailController extends Controller
{
    // Menampilkan detail kartu nama
    public function show($id)
    {
        $businessCard = BusinessCard::findOrFail($id);
        return view('card_details.show', compact('businessCard'));
    }

    // Menampilkan detail kartu nama dengan nama lain
    public function display($id)
    {
        $businessCard = BusinessCard::findOrFail($id);
        return view('template.template', compact('businessCard'));
    }
}

