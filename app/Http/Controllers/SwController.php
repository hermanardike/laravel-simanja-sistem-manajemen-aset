<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Pengadaan;
use App\Models\Sw;
use App\Models\Temporaryfiles;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SwitchStoreRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
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
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'sw_name' => 'required',
                'sw_ip' => 'ipv4',
                'sw_uplink' => 'required',
                'id_lokasi' => 'required',
                'sw_lokasi' => 'required',
                'id_vendor' => 'required',
                'id_pengadaan' => 'required',
                'sw_keterangan' => 'required',
                'sw_status' => 'required',
//                'sw_image' => 'required|string',
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
        Storage::disk('public')->put('/switch/thumbnails/' . $tmp->filename, $img->encode());
        Storage::copy('tmp/' . $tmp->foldername . '/' . $tmp->filename, 'public/switch/' . $tmp->filename);
        $switch = new Sw();
        $switch->sw_name = $request->sw_name;
        $switch->sw_ip =  $request->sw_ip;
        $switch->sw_auth =  $request->sw_auth;
        $switch->sw_uplink = $request->sw_uplink;
        $switch->id_lokasi =  $request->id_lokasi;
        $switch->sw_lokasi = $request->sw_lokasi;
        $switch->id_vendor =  $request->id_vendor;
        $switch->id_pengadaan =  $request->id_pengadaan;
        $switch->sw_keterangan = $request->sw_keterangan;
        $switch->sw_status =  $request->sw_status;
        $switch->sw_image = $tmp->filename;
        $switch->sw_backup = $request->sw_backup;
        $switch->sw_author = Auth::user()->name;
        $switch->save();

        Storage::deleteDirectory('tmp/' . $tmp->foldername);
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
    public function update(Request $request, Sw $switch)
    {

        $validator = Validator::make($request->all(),[
            'sw_name' => ['required','string',],
            'sw_ip' => Rule::unique('switch','sw_ip')->ignore($switch),
            'sw_auth' => ['required','string','max:255'],
            'sw_uplink' => 'required|max:1000',
            'id_lokasi' => ['required','string','max:255'],
            'sw_lokasi' => 'required',
            'id_vendor' => 'required|max:1000',
            'id_pengadaan' =>'required',
            'sw_keterangan' =>'required',
            'sw_status' =>'required',
        ]);

        //mengambil data image lama untuk di hapus
        $oldImage = $switch->sw_image;

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

        if(empty($tmp->foldername))
        {
            $switch->sw_name = $request->sw_name;
            $switch->sw_ip = $request->sw_ip;
            $switch->sw_auth = $request->sw_auth;
            $switch->sw_uplink = $request->sw_uplink;
            $switch->id_lokasi = $request->id_lokasi;
            $switch->sw_lokasi = $request->sw_lokasi;
            $switch->id_vendor = $request->id_vendor;
            $switch->id_pengadaan = $request->id_pengadaan;
            $switch->sw_keterangan = $request->sw_keterangan;
            $switch->sw_status = $request->sw_status;
            $switch->save();

        } else{
            //Mengambil data dari request image
            $img = Image::make(storage_path('app/tmp/' . $tmp->foldername . '/' . $tmp->filename))
                ->fit(671, 485);
            Storage::disk('public')->put('/switch/thumbnails/' . $tmp->filename, $img->encode());
            Storage::copy('tmp/' . $tmp->foldername . '/' . $tmp->filename, 'public/switch/' . $tmp->filename);
            //update Data Server
            $switch->sw_name = $request->sw_name;
            $switch->sw_ip = $request->sw_ip;
            $switch->sw_auth = $request->sw_auth;
            $switch->id_lokasi = $request->id_lokasi;
            $switch->sw_lokasi = $request->sw_lokasi;
            $switch->id_vendor = $request->id_vendor;
            $switch->id_pengadaan = $request->id_pengadaan;
            $switch->sw_keterangan = $request->sw_keterangan;
            $switch->sw_status = $request->sw_status;
            $switch->sw_image = $tmp->filename;
            $switch->sw_author = Auth::user()->name;
            $switch->save();
            Storage::deleteDirectory('tmp/' . $tmp->foldername);
            $tmp->delete();
            Storage::disk('public')->delete('switch/' . $oldImage);
            Storage::disk('public')->delete('switch/thumbnails/' . $oldImage);
        }
        return redirect()->back()->with('status','Data Switch berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $switch = Sw::find($id);
        Storage::disk('public')->delete('switch/' . $switch->sw_image);
        Storage::disk('public')->delete('switch/thumbnails/' . $switch->sw_image);
        $switch->delete();
        return redirect()->route('switch.index')->with('status','Berhasil Menghapus Data');
    }
}
