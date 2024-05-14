<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function show($id)
    {
        $pathToFile = storage_path('app/qrcode.svg');
        // Buat URL berdasarkan ID yang diterima
        $url = 'https://bytes.biz.id/card/display/' . $id;

        // Generate QR Code dengan URL yang dibuat
        QrCode::size(300)->margin(2)->generate($url, $pathToFile);

        return response()->download($pathToFile);
    }
}
