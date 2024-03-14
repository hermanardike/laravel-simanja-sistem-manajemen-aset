<?php

namespace App\Http\Controllers;

use App\Models\Temporaryfiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilepondController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
       // Membuat Unique Name Folder
        $foldername =  uniqid() . '-' . now()->timestamp;

        // Upload Filenya ke TMP Folder
        $request->file('image')->store('tmp/' . $foldername);

        Temporaryfiles::create([
            'foldername' => $foldername,
            'filename' => $request->file('image')->hashName(),
        ]);

        return $foldername;
    }

    public function destroy(Request $request)
    {

        Storage::deleteDirectory('tmp/' . $request->getContent());
        Temporaryfiles::where('foldername', $request->getContent())->delete();
    }
}
