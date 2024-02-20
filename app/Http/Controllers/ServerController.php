<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Models\Rack;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $server = Server::with('pengadaan','rack')
            ->when($request->input('search'), function ($query, $search){
                $query->where('srv_name', 'like',"%" .   $search . "%")
                    ->orwhere('srv_ip', 'like',"%" . $search . "%")
                    ->orwhere('srv_status', 'like',"%" . $search . "%")
                    ->orWhereHas('pengadaan', function ($query)  use ($search) {
                    $query->where('thn_pengadaan', 'like',"%" . $search . "%");
                    })
                ->orwhereHas('rack', function ($query) use ($search) {
                    $query->where('rack_number','like',"%" . $search . "%");
                });

            })->paginate('10');
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
        $request->validate([
            'srv_name' => ['required','string','max:255'],
            'srv_ip' => 'required|ipv4|unique:servers',
            'srv_auth' => ['required','string','max:255'],
            'srv_spec' => 'required|max:1000',
            'srv_owner' => ['required','string','max:255'],
            'srv_status' => 'required',
            'srv_keterangan' => 'required|max:1000',
            'id_pengadaan' =>'required',
            'id_rack' =>'required',
        ],[
              'srv_name.required' => 'Nama Server Harus Diisi',
              'srv_ip.required' => 'IP Server Harus Diisi',
                    'srv_ip.ipv4' => 'Masukan Alamat IPv4 Yang Valid',
                    'srv_ip.unique' => 'IPv4 sudah digunakan',

              'srv_auth.required' => 'Server Username dan Password harus Diisi',
               'srv_spec.required' => 'Spesifikasi Server Harus Diisi',
               'srv_owner.required' => 'Pengelola Server Harus Diisi',
               'srv_status.required' => 'Tambahkan Status Server ',
              'srv_keterangan.required' => 'Tambahkan Keterangan Kondisi Server',
               'id_pengadaan.required' => 'Tambahkan Tahun Pengadaan Server',
              'id_rack.required' => 'Tambahkan Rack Server',
        ]);

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
        return view('server.show',
            ['server' => Server::find($id)]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $server = Server::find($id);
        $pengadaan = Pengadaan::all();
        $rack = Rack::all();
       return view('server.edit', ['server' => $server,
       'pengadaan' => $pengadaan,
           'rack' => $rack,
       ]);
    }


    public function update(Request $request, $id)
    {

        $request->validate([
                    'srv_name' => ['required'],
                     'srv_ip' => 'required|ipv4|unique:servers,srv_ip,'. 'id_srv',

        ]);
        $server = Server::FindOrFail($id);
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
        dd($server);
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
