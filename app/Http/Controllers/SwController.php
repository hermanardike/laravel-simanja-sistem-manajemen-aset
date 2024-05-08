<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Pengadaan;
use App\Models\Server;
use App\Models\Sw;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SwitchStoreRequest;

class SwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sw = Sw::all();
        return view('networking.switch.index',[
            'sw' => $sw
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
        return view('networking.switch.create',[
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
    public function store(SwitchStoreRequest $request)
    {
            $request->validated();

        Sw::create([
            'sw_name' => $request->sw_name,
            'sw_ip' => $request->sw_ip,
            'sw_auth' => $request->sw_auth,
            'sw_uplink' => $request->sw_uplink,
            'id_lokasi' => $request->id_lokasi,
            'sw_lokasi' => $request->sw_lokasi,
            'id_vendor' => $request->id_vendor,
            'id_pengadaan' => $request->id_pengadaan,
            'sw_keterangan' => $request->sw_keterangan,
            'sw_status' => $request->sw_status,
            'sw_image' => $request->sw_image,
            'sw_backup' => $request->sw_backup,
            'sw_author' => Auth::user()->name,
        ]);

        return redirect()->route('switch.index')->with('success','Data Switch berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sw = Sw::find($id);
        $lokasi = Lokasi::all();
        $vendor =  Vendor::all();
        $pengadaan =  Pengadaan::all();

        return view('networking.switch.show',[
            'sw' => $sw,
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'sw_name' => 'required',
            'sw_ip' => 'ipv4',
            'sw_uplink' => 'required',
            'id_lokasi' => 'required',
            'sw_lokasi' => 'required',
            'id_vendor' => 'required',
            'id_pengadaan' => 'required',
            'sw_keterangan' => 'required',
            'sw_status' => 'required',
        ]);
        $sw = Sw::find($id);
        $sw->update([
            'sw_name' => $request->sw_name,
            'sw_ip' => $request->sw_ip,
            'sw_auth' => $request->sw_auth,
            'sw_uplink' => $request->sw_uplink,
            'id_lokasi' => $request->id_lokasi,
            'sw_lokasi' => $request->sw_lokasi,
            'id_vendor' => $request->id_vendor,
            'id_pengadaan' => $request->id_pengadaan,
            'sw_keterangan' => $request->sw_keterangan,
            'sw_status' => $request->sw_status,
            'sw_image' => $request->sw_image,
            'sw_backup' => $request->sw_backup,
            'sw_author' => Auth::user()->name,
        ]);
        return redirect()->back()->with('success','Data Switch berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
