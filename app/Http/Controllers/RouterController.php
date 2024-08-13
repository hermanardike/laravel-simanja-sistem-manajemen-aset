<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Pengadaan;
use App\Models\Router;
use App\Models\Temporaryfiles;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;




class RouterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $router = Router::all();
        $countActive = Router::where('r_status', 'Aktif')->count();
        $countRusak = Router::where('r_status', 'Rusak')->count();
        $countMati = Router::where('r_status', 'Mati')->count();

        return view("networking.router.index", [
            'router' => $router,
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
        return view('networking.router.create', [
            'lokasi' => $lokasi,
            'vendor' => $vendor,
            'pengadaan' => $pengadaan,
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
            'r_name' => 'required',
            'r_ip' => 'required|ipv4',
            'id_lokasi' => 'required',
            'r_lokasi' => 'required',
            'id_vendor' => 'required',
            'id_pengadaan' => 'required',
            'r_keterangan' => 'required',
            'r_status' => 'required',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
        Storage::disk('public')->put('/router/thumbnails/' . $tmp->filename, $img->encode());
        Storage::copy('tmp/' . $tmp->foldername . '/' . $tmp->filename, 'public/router/' . $tmp->filename);

        $router = new Router();
        $router->r_name = $request->r_name;
        $router->r_ip = $request->r_ip;
        $router->id_lokasi = $request->id_lokasi;
        $router->r_lokasi = $request->r_lokasi;
        $router->id_vendor = $request->id_vendor;
        $router->id_pengadaan = $request->id_pengadaan;
        $router->r_keterangan = $request->r_keterangan;
        $router->r_status = $request->r_status;
        $router->r_image = $tmp->filename;
        $router->r_auth = $request->r_auth;
        // Jika r_auth juga diperlukan

        // Proses upload gambar jika ada


        $router->r_author = Auth::user()->name;
        $router->save();
        Storage::deleteDirectory('tmp/' . $tmp->foldername);

        return redirect()->route('router.index')->with('success', 'Data Router berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $router = Router::find($id);
        $lokasi = Lokasi::all();
        $vendor =  Vendor::all();
        $pengadaan =  Pengadaan::all();

        return view('networking.router.show', [
            'router' => $router,
            'lokasi' => $lokasi,
            'vendor' => $vendor,
            'pengadaan' => $pengadaan,
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
    public function update(Request $request, Router $router)
{
    $validator = Validator::make($request->all(), [
        'r_name' => 'required',
        'r_ip' => 'required|ipv4',
        'id_lokasi' => 'required',
        'r_lokasi' => 'required',
        'id_vendor' => 'required',
        'id_pengadaan' => 'required',
        'r_keterangan' => 'required',
        'r_status' => 'required',
    ]);

    //mengambil data image lama untuk dihapus
    $oldImage = $router->r_image;

    //mengambil data image baru untuk di upload
    $tmp = Temporaryfiles::where('foldername', $request->image)->first();

    if ($validator->fails()) {
        if ($tmp) {
            Storage::deleteDirectory('tmp/' . $tmp->foldername);
            $tmp->delete();
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }

    if ($tmp) {
        //Mengambil data dari request image
        $img = Image::make(storage_path('app/tmp/' . $tmp->foldername . '/' . $tmp->filename))
            ->fit(671, 485);
        Storage::disk('public')->put('/router/thumbnails/' . $tmp->filename, $img->encode());
        Storage::copy('tmp/' . $tmp->foldername . '/' . $tmp->filename, 'public/router/' . $tmp->filename);

        //update Data Server dengan gambar baru
        $router->r_image = $tmp->filename;

        //Hapus gambar lama jika ada
        if ($oldImage) {
            Storage::disk('public')->delete('router/' . $oldImage);
            Storage::disk('public')->delete('router/thumbnails/' . $oldImage);
        }

        Storage::deleteDirectory('tmp/' . $tmp->foldername);
        $tmp->delete();
    }

    //Update Data Server (tanpa gambar baru jika tidak ada gambar yang diupload)
    $router->r_name = $request->r_name;
    $router->r_ip = $request->r_ip;
    $router->r_auth = $request->r_auth;
    $router->id_lokasi = $request->id_lokasi;
    $router->r_lokasi = $request->r_lokasi;
    $router->id_vendor = $request->id_vendor;
    $router->id_pengadaan = $request->id_pengadaan;
    $router->r_keterangan = $request->r_keterangan;
    $router->r_status = $request->r_status;
    $router->r_author = Auth::user()->name;

    $router->save();

    return redirect()->back()->with('status', 'Data router berhasil diubah');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $router = Router::find($id);
        // dd($accespoint);
        // Storage::disk('public')->delete('router/' . $router->ap_image);
        // Storage::disk('public')->delete('router/thumbnails/' . $router->ap_image);
        $router->delete();
        return redirect()->route('router.index')->with('status', 'Berhasil Menghapus Data');
    }
}
