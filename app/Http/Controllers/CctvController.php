<?php

namespace App\Http\Controllers;

use App\Models\Cctv;
use App\Models\Kodecctv;
use App\Models\Lokasi;
use App\Models\Pengadaan;
use App\Models\Vendor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Temporaryfiles;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CctvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cctv = Cctv::all();
        $countActive = Cctv::where('cctv_status', 'Aktif')->count();
        $countRusak = Cctv::where('cctv_status', 'Rusak')->count();
        $countMati = Cctv::where('cctv_status', 'Mati')->count();
        return view('networking.cctv.index', [
            'cctv' => $cctv,
            'countActive' => $countActive,
            'countRusak' => $countRusak,
            'countMati' => $countMati
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lokasi  = Lokasi::all();
        $vendor = Vendor::all();
        $pengadaan = Pengadaan::all();
        $kodecctv = Kodecctv::all();
        return view('networking.cctv.create', [
            'lokasi' => $lokasi,
            'vendor' => $vendor,
            'pengadaan' => $pengadaan,
            'kodecctv' => $kodecctv,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_kodecctv' => 'required',
            'cctv_number' => 'required',
            'cctv_mac' => 'required|unique:cctv,cctv_mac',
            'id_lokasi' => 'required',
            'cctv_ip' => 'required|ipv4',
            'cctv_lokasi' => 'required',
            'cctv_auth' => 'required',
            'cctv_type' => 'required',
            'id_vendor' => 'required',
            'id_pengadaan' => 'required',
            'cctv_keterangan' => 'required',
            'cctv_status' => 'required',
        ]);


        $tmp = Temporaryfiles::where('foldername', $request->image)->first();
        if (!$tmp) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        if ($validator->fails() && $tmp) {
            Storage::deleteDirectory('tmp/' . $tmp->foldername);
            $tmp->delete();
            return redirect()->back()->withErrors($validator)->withInput();
        } elseif ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $img = Image::make(storage_path('app/tmp/' . $tmp->foldername . '/' . $tmp->filename))
            ->fit(671, 485);
        Storage::disk('public')->put('/cctv/thumbnails/' . $tmp->filename, $img->encode());
        Storage::copy('tmp/' . $tmp->foldername . '/' . $tmp->filename, 'public/cctv/' . $tmp->filename);

        $cctv = new Cctv();
        $cctv->id_kodecctv = $request->id_kodecctv;
        $cctv->cctv_number = $request->cctv_number;
        $cctv->cctv_mac = $request->cctv_mac;
        $cctv->cctv_type = $request->cctv_type;
        $cctv->cctv_ip = $request->cctv_ip;
        $cctv->cctv_auth = $request->cctv_auth;
        $cctv->id_lokasi = $request->id_lokasi;
        $cctv->cctv_lokasi = $request->cctv_lokasi;
        $cctv->id_vendor = $request->id_vendor;
        $cctv->id_pengadaan = $request->id_pengadaan;
        $cctv->cctv_keterangan = $request->cctv_keterangan;
        $cctv->cctv_status = $request->cctv_status;
        $cctv->cctv_image = $tmp->filename;
        $cctv->cctv_author = Auth::user()->name;
        $cctv->save();

        Storage::deleteDirectory('tmp/' . $tmp->foldername);

        return redirect()->route('cctv.index')->with('success', 'Data cctv berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cctv = Cctv::find($id);
        $lokasi = Lokasi::all();
        $vendor =  Vendor::all();
        $pengadaan =  Pengadaan::all();
        $kodecctv = Kodecctv::all();
        return view('networking.cctv.show', [
            'cctv' => $cctv,
            'lokasi' => $lokasi,
            'vendor' => $vendor,
            'pengadaan' => $pengadaan,
            'kodecctv' => $kodecctv,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cctv $cctv)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'id_kodecctv' => 'required',
            'cctv_number' => 'required',
            'cctv_mac' => Rule::unique('cctv', 'cctv_mac')->ignore($cctv),
            'id_lokasi' => 'required',
            'cctv_ip' => 'required|ipv4',
            'cctv_lokasi' => 'required',
            'cctv_type' => 'required',
            'id_vendor' => 'required',
            'id_pengadaan' => 'required',
            'cctv_keterangan' => 'required',
            'cctv_status' => 'required',
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
            Storage::disk('public')->put('/cctv/thumbnails/' . $tmp->filename, $img->encode());
            Storage::copy('tmp/' . $tmp->foldername . '/' . $tmp->filename, 'public/cctv/' . $tmp->filename);

            // Hapus file gambar lama jika ada
            if ($cctv->cctv_image) {
                Storage::disk('public')->delete('/cctv/' . $cctv->cctv_image);
                Storage::disk('public')->delete('/cctv/thumbnails/' . $cctv->cctv_image);
            }

            $cctv->cctv_image = $tmp->filename;

            // Hapus file sementara
            Storage::deleteDirectory('tmp/' . $tmp->foldername);
        }

        // Update data CCTV
        $cctv->id_kodecctv = $request->id_kodecctv;
        $cctv->cctv_number = $request->cctv_number;
        $cctv->cctv_mac = $request->cctv_mac;
        $cctv->cctv_ip = $request->cctv_ip;
        $cctv->id_lokasi = $request->id_lokasi;
        $cctv->cctv_lokasi = $request->cctv_lokasi;
        $cctv->cctv_type = $request->cctv_type;
        $cctv->id_vendor = $request->id_vendor;
        $cctv->id_pengadaan = $request->id_pengadaan;
        $cctv->cctv_keterangan = $request->cctv_keterangan;
        $cctv->cctv_status = $request->cctv_status;
        $cctv->cctv_author = Auth::user()->name;
        $cctv->save();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->back()->with('status', 'Data CCTV berhasil diubah');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cctv = Cctv::find($id);
        dd($cctv);
        Storage::disk('public')->delete('cctv/' . $cctv->ap_image);
        Storage::disk('public')->delete('cctv/thumbnails/' . $cctv->ap_image);
        $cctv->delete();
        return redirect()->route('cctv.index')->with('status', 'Berhasil Menghapus Data');
    }
}
