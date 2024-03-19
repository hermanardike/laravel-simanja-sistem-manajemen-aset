<?php

namespace App\Http\Controllers;

use App\Models\Rack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class RackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Gate::denies('index-server')){
           abort('404','Anda Tidak Memiliki Akses');
        }
        $rack = Rack::query()
            ->when($request->input('search'), function ($query, $search) {
             $query->where('rack_number', 'like' , "%" . $search . "%");
            })->paginate('10');
        return  view('settings.rack.index', compact('rack'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('create-server')) {
            abort('404', 'Anda Tidak Memiliki Akses');
        }
        return view('settings.rack.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Gate::denies('store-server')) {
            abort('404', 'Anda Tidak Memiliki Akses');
        }

        $request->validate([
            'rack_number' => ['required','string','max:255','unique:rack'],
        ]);
        $rack = new Rack();
        $rack->rack_number = $request->input('rack_number');
        $rack->save();
        return redirect()->back()->with('status', 'Berhasil Menambahkan Data Rack');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::denies('show-server')) {
            abort('404', 'Anda Tidak Memiliki Akses');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('edit-server')) {
            abort('404', 'Anda Tidak Memiliki Akses');
        }
        $rack = Rack::find($id);
        return view('settings.rack.edit', compact('rack'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rack $rack)
    {
        if (Gate::denies('update-server')) {
            abort('404', 'Anda Tidak Memiliki Akses');
        }

        $request->validate([
            'rack_number' => ['required','string','max:255', Rule::unique('rack','rack_number')->ignore($rack)],
        ]);
        $rack->rack_number = $request->input('rack_number');
        $rack->save();
        return redirect()->back()->with('status','Berhasil Merubah Data Rack');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('destroy-server')) {
            abort('404', 'Anda Tidak Memiliki Akses');
        }
        Rack::destroy($id);
        return redirect()->back()->with('status','Berhasil Menghapus Data Rack');
    }
}
