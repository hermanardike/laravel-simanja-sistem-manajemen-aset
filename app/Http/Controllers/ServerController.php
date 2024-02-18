<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Models\Rack;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $server = Server::paginate(5);

            return view('server.index', ['server' => $server]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengadaan = Pengadaan::all();
        $rack = Rack::all();
        return view('server.create',[
            'pengadaan' => $pengadaan,
            'rack' => $rack
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
        $server = new Server();
        $server->srv_name = $request->srv_name;
        $server->srv_ip = $request->srv_ip;
        $server->srv_auth = $request->srv_auth;
        $server->srv_spec = $request->srv_spec;
        $server->srv_owner = $request->srv_owner;
        $server->srv_status    = $request->srv_status;
        $server->srv_keterangan = $request->srv_keterangan;
        $server->id_pengadaan = $request->id_pengadaan;
        $server->id_rack = $request->id_rack;
        $server->save();
        return redirect()->back()->with('status','Success adding new server Devices');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
