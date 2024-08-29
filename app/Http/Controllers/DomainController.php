<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Lokasi;
use App\Models\Pengadaan;
use App\Models\Subdomain;
use App\Models\Vendor;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domain = Domain::all();
        $countActive = domain::where('domain_status', 'aktif')->count();
        $countSuspend = domain::where('domain_status', 'suspend')->count();
        return view('digitalasset.domain.index', [
            'domain' => $domain,
            'countActive' => $countActive,
            'countSuspend' => $countSuspend,
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
        $subdomains = Subdomain::all();
        return view('digitalasset.domain.create', [
            'lokasi' => $lokasi,
            'vendor' => $vendor,
            'pengadaan' => $pengadaan,
            'subdomains' => $subdomains,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
            'domain_name' => 'required|unique:domain,domain_name',
            'domain_ip' => 'required|ipv4',
            'domain_type' => 'required',
            'id_sub' => 'required',
            'id_lokasi' => 'required',
            'domain_owner' => 'required',
            'domain_kontak' => 'required',
            'domain_email' => 'required',
            'id_pengadaan' => 'required',
            'domain_keterangan' => 'required',
            'domain_status' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $domain = new Domain();
        $domain->domain_name = $request->domain_name;
        $domain->domain_ip = $request->domain_ip;
        $domain->id_sub = $request->id_sub;
        $domain->id_lokasi = $request->id_lokasi;
        $domain->domain_owner = $request->domain_owner;
        $domain->domain_kontak = $request->domain_kontak;
        $domain->domain_email = $request->domain_email;
        $domain->id_pengadaan = $request->id_pengadaan;
        $domain->domain_keterangan = $request->domain_keterangan;
        $domain->domain_status = $request->domain_status;
        $domain->author = Auth::user()->name;
        $domain->save();

        // return redirect()->route('domain.index')->with('success', 'Domain berhasil ditambahkan');
        return redirect()->back()->with('status', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $domain = Domain::find($id);
        $lokasi = Lokasi::all();
        $vendor =  Vendor::all();
        $pengadaan =  Pengadaan::all();
        $subdomains = Subdomain::all();
        return view('digitalasset.domain.show', [
            'domain' => $domain,
            'lokasi' => $lokasi,
            'vendor' => $vendor,
            'pengadaan' => $pengadaan,
            'subdomains' => $subdomains,
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
    public function update(Request $request, Domain $domain)
{
    $validator = Validator::make($request->all(), [
        'domain_name' => 'required' , 
        'domain_ip' => 'required|ipv4',
        'domain_type' => 'required',
        'id_sub' => 'required',
        'id_lokasi' => 'required',
        'domain_owner' => 'required',
        'domain_kontak' => 'required',
        'domain_email' => 'required',
        'id_pengadaan' => 'required',
        'domain_keterangan' => 'required',
        'domain_status' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $domain->domain_name = $request->domain_name;
    $domain->domain_ip = $request->domain_ip;
    $domain->id_sub = $request->id_sub;
    $domain->id_lokasi = $request->id_lokasi;
    $domain->domain_owner = $request->domain_owner;
    $domain->domain_kontak = $request->domain_kontak;
    $domain->domain_email = $request->domain_email;
    $domain->id_pengadaan = $request->id_pengadaan;
    $domain->domain_keterangan = $request->domain_keterangan;
    $domain->domain_status = $request->domain_status;
    $domain->author = Auth::user()->name;
    $domain->save();

    // return redirect()->route('domain.index')->with('success', 'Domain berhasil diupdate');
    return redirect()->back()->with('status', 'Data berhasil diupdate');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $domain = Domain::find($id);
        $domain->delete();
        return redirect()->route('domain.index')->with('status', 'Berhasil Menghapus Data');
    }
}
