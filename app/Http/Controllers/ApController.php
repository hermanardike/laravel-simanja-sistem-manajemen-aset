<?php

namespace App\Http\Controllers;

use App\Models\Accespoint;
use App\Models\Lokasi;
use App\Models\Pengadaan;
use App\Models\Temporaryfiles;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ApController extends Controller
{
    public function index()
    {
        $accespoint = Accespoint::all();
        $countActive = Accespoint::where('ap_status', 'Aktif')->count();
        $countRusak = Accespoint::where('ap_status', 'Rusak')->count();
        $countMati = Accespoint::where('ap_status', 'Mati')->count();

        return view('networking.accespoint.index', [
            'accespoint' => $accespoint,
            'countActive' => $countActive,
            'countRusak' => $countRusak,
            'countMati' => $countMati
        ]);
    }

    public function create()
    {
        $lokasi  = Lokasi::all();
        $vendor = Vendor::all();
        $pengadaan = Pengadaan::all();
        return view('networking.accespoint.create', [
            'lokasi' => $lokasi,
            'vendor' => $vendor,
            'pengadaan' => $pengadaan,
        ]);
    }
    public function show($id)
    {
        $accespoint = Accespoint::find($id);
        $lokasi = Lokasi::all();
        $vendor =  Vendor::all();
        $pengadaan =  Pengadaan::all();

        return view('networking.accespoint.show', [
            'ap' => $accespoint,
            'lokasi' => $lokasi,
            'vendor' => $vendor,
            'pengadaan' => $pengadaan,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id_kode' => 'required',
            'ap_number' => 'required',
            'ap_mac' => 'required|unique:accespoint,ap_mac',
            'id_lokasi' => 'required',
            'ap_lokasi' => 'required',
            'id_vendor' => 'required',
            'id_pengadaan' => 'required',
            'ap_keterangan' => 'required',
            'ap_status' => 'required',
            // 'ap_image' => 'required|string', 
        ]);

        // Temukan file sementara yang terkait dengan gambar yang diupload
        $tmp = Temporaryfiles::where('foldername', $request->image)->first();
        // dd($tmp);

        // Jika file sementara tidak ditemukan
        if (!$tmp) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika validasi gagal dan file sementara ditemukan, hapus file sementara
        if ($validator->fails()) {
            Storage::deleteDirectory('tmp/' . $tmp->foldername);
            $tmp->delete();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Proses gambar yang diupload
        $img = Image::make(storage_path('app/tmp/' . $tmp->foldername . '/' . $tmp->filename))
            ->fit(671, 485);
        Storage::disk('public')->put('/accespoint/thumbnails/' . $tmp->filename, $img->encode());
        Storage::copy('tmp/' . $tmp->foldername . '/' . $tmp->filename, 'public/accespoint/' . $tmp->filename);

        // Simpan data Accespoint baru
        $accespoint = new Accespoint();
        $accespoint->id_kode = $request->id_kode;
        $accespoint->ap_number = $request->ap_number;
        $accespoint->ap_mac = $request->ap_mac;
        $accespoint->id_lokasi = $request->id_lokasi;
        $accespoint->ap_lokasi = $request->ap_lokasi;
        $accespoint->id_vendor = $request->id_vendor;
        $accespoint->id_pengadaan = $request->id_pengadaan;
        $accespoint->ap_keterangan = $request->ap_keterangan;
        $accespoint->ap_status = $request->ap_status;
        $accespoint->ap_image = $tmp->filename;
        $accespoint->ap_author = Auth::user()->name;
        $accespoint->save();

        // Hapus file sementara
        Storage::deleteDirectory('tmp/' . $tmp->foldername);

        // Redirect kembali ke halaman index dengan pesan sukses
        // return redirect()->route('accespoint.index')->with('success', 'Data Accespoint berhasil ditambahkan');

        return redirect()->back()->with('status', 'Data Acces Point berhasil ditambah');
    }


    public function update(Request $request, Accespoint $accespoint)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id_kode' => 'required',
            'ap_number' => 'required',
            'ap_mac' => Rule::unique('accespoint','ap_mac')->ignore($accespoint),
            'id_lokasi' => 'required',
            'ap_lokasi' => 'required',
            'id_vendor' => 'required',
            'id_pengadaan' => 'required',
            'ap_keterangan' => 'required',
            'ap_status' => 'required',
            // 'ap_image' => 'required|string', 
        ]);

        // Temukan file sementara yang terkait dengan gambar yang diupload
        $tmp = Temporaryfiles::where('foldername', $request->image)->first();

        // Jika validasi gagal
        if ($validator->fails()) {
            if ($tmp) {
                Storage::deleteDirectory('tmp/' . $tmp->foldername);
                $tmp->delete();
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika ada file gambar yang diupload, proses gambar tersebut
        if ($tmp) {
            $img = Image::make(storage_path('app/tmp/' . $tmp->foldername . '/' . $tmp->filename))
                ->fit(671, 485);
            Storage::disk('public')->put('/accespoint/thumbnails/' . $tmp->filename, $img->encode());
            Storage::copy('tmp/' . $tmp->foldername . '/' . $tmp->filename, 'public/accespoint/' . $tmp->filename);

            // Hapus file gambar lama jika ada
            if ($accespoint->ap_image) {
                Storage::disk('public')->delete('/accespoint/' . $accespoint->ap_image);
                Storage::disk('public')->delete('/accespoint/thumbnails/' . $accespoint->ap_image);
            }

            $accespoint->ap_image = $tmp->filename;

            // Hapus file sementara
            Storage::deleteDirectory('tmp/' . $tmp->foldername);
        }

        // Update data Accespoint
        $accespoint->id_kode = $request->id_kode;
        $accespoint->ap_number = $request->ap_number;
        $accespoint->ap_mac = $request->ap_mac;
        $accespoint->id_lokasi = $request->id_lokasi;
        $accespoint->ap_lokasi = $request->ap_lokasi;
        $accespoint->id_vendor = $request->id_vendor;
        $accespoint->id_pengadaan = $request->id_pengadaan;
        $accespoint->ap_keterangan = $request->ap_keterangan;
        $accespoint->ap_status = $request->ap_status;
        $accespoint->ap_author = Auth::user()->name;
        $accespoint->save();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->back()->with('status', 'Data Acces Point berhasil diubah');
    }

    public function destroy($id)
    {
        $accespoint = Accespoint::find($id);
        // dd($accespoint);
        Storage::disk('public')->delete('accespoint/' . $accespoint->ap_image);
        Storage::disk('public')->delete('accespoint/thumbnails/' . $accespoint->ap_image);
        $accespoint->delete();
        return redirect()->route('accespoint.index')->with('status', 'Berhasil Menghapus Data');
    }
}
