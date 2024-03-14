<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequestServer;
use App\Models\Host;
use App\Models\Pengadaan;
use App\Models\Rack;
use App\Models\Server;
use App\Models\Temporaryfiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Auth;
use Intervention\Image\Facades\Image;



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

        $srv_aktif = Server::where('srv_status', 'Aktif')->count();
        $srv_rusak = Server::where('srv_status', 'Rusak')->count();
        $srv_mati = Server::where('srv_status', 'Mati')->count();
        $jumlahServer = Server::all()->count();
        $jumlahHost = Host::all()->count();
            return view('server.index', [
                'srv_aktif' => $srv_aktif,
                'srv_rusak' => $srv_rusak,
                'srv_mati' => $srv_mati,
                'server' => $server,
                'jumlahserver' => $jumlahServer,
                'jumlahhost' => $jumlahHost,

            ]);
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

        $validator = Validator::make($request->all(),[
            'srv_name' => ['required','string','max:255'],
            'srv_ip' => 'required|ipv4|unique:servers',
            'srv_auth' => ['required','string','max:255'],
            'srv_spec' => 'required|max:2000',
            'srv_owner' => ['required','string','max:255'],
            'srv_status' => 'required',
            'srv_keterangan' => 'required|max:2000',
            'id_pengadaan' =>'required',
            'id_rack' =>'required',
            'image' =>'required|string',
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

        $tmp= Temporaryfiles::where('foldername', $request->image)->first();

    if ($validator->fails() && $tmp)
    {
        Storage::deleteDirectory('tmp/' . $tmp->foldername);
        $tmp->delete();
        return redirect()->back()->withErrors($validator)->withInput();
    }elseif ($validator->fails())
    {
        return redirect()->back()->withErrors($validator)->withInput();
    }
        $img = Image::make(storage_path('app/tmp/' . $tmp->foldername . '/' . $tmp->filename))
            ->fit(671, 485);
        Storage::disk('public')->put('/servers/thumbnails/' . $tmp->filename, $img->encode());
        Storage::copy('tmp/' . $tmp->foldername . '/' . $tmp->filename, 'public/servers/' . $tmp->filename);
        $server = new Server();
        $server->srv_name = $request->srv_name;
        $server->srv_ip = $request->srv_ip;
        $server->srv_auth = $request->srv_auth;
        $server->srv_spec = $request->srv_spec;
        $server->srv_owner = $request->srv_owner;
        $server->srv_image = $tmp->filename;
        $server->srv_status    = $request->srv_status;
        $server->srv_keterangan = $request->srv_keterangan;
        $server->id_pengadaan = $request->id_pengadaan;
        $server->id_rack = $request->id_rack;
        $server->author = Auth::user()->name;
        $server->save();
        Storage::deleteDirectory('tmp/' . $tmp->foldername);
        $tmp->delete();

        return redirect()->route('server.index')->with('status','Success adding new server Devices');
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


    public function update(Request $request, Server $server )
    {
        $validator = Validator::make($request->all(),[
            'srv_name' => ['required','string','max:255'],
            'srv_ip' => Rule::unique('servers','srv_ip')->ignore($server),
            'srv_auth' => ['required','string','max:255'],
            'srv_spec' => 'required|max:1000',
            'srv_owner' => ['required','string','max:255'],
            'srv_status' => 'required',
            'srv_keterangan' => 'required|max:1000',
            'id_pengadaan' =>'required',
            'id_rack' =>'required',
            'image' =>'required|string',
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

        //mengambil data image lama untuk di hapus
        $oldImage = $server->srv_image;

        //mengambil data image baru untuk di upload
        $tmp= Temporaryfiles::where('foldername', $request->image)->first();

        if ($validator->fails() && $tmp)
        {
            Storage::deleteDirectory('tmp/' . $tmp->foldername);
            $tmp->delete();
            return redirect()->back()->withErrors($validator)->withInput();
        }elseif ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

            if($tmp->foldername != null)
            {
                //Mengambil data dari request image
                $img = Image::make(storage_path('app/tmp/' . $tmp->foldername . '/' . $tmp->filename))
                    ->fit(671, 485);
                Storage::disk('public')->put('/servers/thumbnails/' . $tmp->filename, $img->encode());
                Storage::copy('tmp/' . $tmp->foldername . '/' . $tmp->filename, 'public/servers/' . $tmp->filename);
                //update Data Server
                $server->srv_name = $request->srv_name;
                $server->srv_ip = $request->srv_ip;
                $server->srv_auth = $request->srv_auth;
                $server->srv_spec = $request->srv_spec;
                $server->srv_owner = $request->srv_owner;
                $server->srv_image = $tmp->filename;
                $server->srv_status = $request->srv_status;
                $server->srv_keterangan = $request->srv_keterangan;
                $server->id_pengadaan = $request->id_pengadaan;
                $server->id_rack = $request->id_rack;
                $server->author = Auth::user()->name;
                $server->save();
                Storage::deleteDirectory('tmp/' . $tmp->foldername);
                $tmp->delete();
                Storage::disk('public')->delete('servers/' . $oldImage);
                Storage::disk('public')->delete('servers/thumbnails/' . $oldImage);
            } else {
                $server->srv_name = $request->srv_name;
                $server->srv_ip = $request->srv_ip;
                $server->srv_auth = $request->srv_auth;
                $server->srv_spec = $request->srv_spec;
                $server->srv_owner = $request->srv_owner;
//                $server->srv_image = $tmp->filename;
                $server->srv_status = $request->srv_status;
                $server->srv_keterangan = $request->srv_keterangan;
                $server->id_pengadaan = $request->id_pengadaan;
                $server->id_rack = $request->id_rack;
                $server->author = Auth::user()->name;
                $server->save();
            }


            return redirect()->back()->with('status','Berhasil Merubah Data Server');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $server = Server::find($id);
        Storage::disk('public')->delete('servers/' . $server->srv_image);
        Storage::disk('public')->delete('servers/thumbnails/' . $server->srv_image);
        $server->delete();
        return redirect()->route('server.index')->with('status','Berhasil Menghapus Data');


    }
}
