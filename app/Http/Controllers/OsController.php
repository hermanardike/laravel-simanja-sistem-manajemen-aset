<?php

namespace App\Http\Controllers;

use App\Models\Os;
use Illuminate\Http\Request;
use MongoDB\Driver\Query;

class OsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    $os = Os::query()->when($request->input('search'), function ($query, $search){
        $query->where('os_name', 'like', "%" . $search . "%");
    })->paginate('5');
        return view ('settings.os.index', [
            'os' => $os,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.os.create');
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
            'os_name' => ['required','string','max:255'],
        ]);

        $os = new Os();
        $os->os_name = $request->os_name;
        $os->save();
        return redirect()->back()->with('status','Berhasil Menambahkan Sistem Operasi');
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
        $os = Os::find($id);
        return view('settings.os.edit', [
            'os' => $os,
        ]);
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
            'os_name' => ['required','string','max:255'],
        ]);
        $os = Os::find($id);
        $os->os_name = $request->os_name;
        $os->save();
        return redirect()->back()->with('status','Berhasil Mengubah Sistem Operasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Os::destroy($id);
        return redirect()->route('os.index')->with('status','Berhasil Menghapus Sistem Operasi');
    }
}
