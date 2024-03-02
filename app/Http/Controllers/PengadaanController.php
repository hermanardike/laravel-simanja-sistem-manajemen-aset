<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pengadaan = Pengadaan::query()
            ->when($request->input('search'), function ($query, $search)
            {
                $query->where('thn_pengadaan', 'like' , "%" . $search . "%");
            })->paginate('5');
        return view('settings.pengadaan.index', [
            'pengadaan' => $pengadaan
        ] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('settings.pengadaan.create');
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
            'thn_pengadaan' => ['required','unique:pengadaan','string','max:4'],
        ]);
        $pengadaan = new Pengadaan();
        $pengadaan->thn_pengadaan = $request->thn_pengadaan;
        $pengadaan->save();
        return redirect()->back()->with('status','Berhasil Menambahkan Tahun Pengadaan');
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
        $pengadaan = Pengadaan::find($id);
        return view('settings.pengadaan.edit', [
            'pengadaan' => $pengadaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengadaan $pengadaan)
    {
        $request->validate([
            'thn_pengadaan' => ['required',Rule::unique('pengadaan','thn_pengadaan')->ignore($pengadaan)],
        ]);
        $pengadaan->thn_pengadaan = $request->thn_pengadaan;
        $pengadaan->save();
        return redirect()->back()->with('status','Berhasil Mengubah Tahun Pengadaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengadaan::destroy($id);
        return redirect()->back()->with('status','Berhasil Menghapus Tahun Pengadaan');
    }
}
