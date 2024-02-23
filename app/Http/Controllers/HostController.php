<?php

namespace App\Http\Controllers;

use App\Models\Host;
use App\Models\Os;
use App\Models\Server;
use Illuminate\Http\Request;

class HostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $server = Server::all();
        $jmlhost = Host::all()->count();
        $jumlahServer = Server::all()->count();
        $host = Host::query()
            ->when($request->input('search'), function($query, $search) {
               $query->where('host_name', 'like', "%" . $search . "%")
                   ->orWhere('host_ip', 'like', "%". $search. "%");
            })->paginate('5');
        return  view('server.host.index', [
            'host' => $host,
            'jmlhost' => $jmlhost,
            'jumlahserver' => $jumlahServer,
            'test' => $server
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $device =  Server::all();
        $os =  Os::all();
        return view( 'server.host.create',
            [
                'device' => $device,
                'os' => $os,
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
        $request->validate([
            'host_name' => ['required','string','max:255'],
            'host_ip' => ['required','ipv4','unique:hosts'],
            'host_auth' => ['required','string','max:255'],
            'id_os' => ['required','string','max:255'],
            'id_srv' => ['required','string','unique:hosts'],
            'status' => ['required','string'],
        ]);
        $host = new Host();
        $host->host_name = $request->host_name;
        $host->host_ip = $request->host_ip;
        $host->host_auth = $request->host_auth;
        $host->id_os = $request->id_os;
        $host->id_srv = $request->id_srv;
        $host->status  = $request->status;
        $host->save();
        return redirect()->route('host.index')->with('status', 'Berhasil Menambahkan Data Host');

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
