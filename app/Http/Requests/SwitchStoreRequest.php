<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SwitchStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'sw_name' => 'required',
            'sw_ip' => 'ipv4',
            'sw_uplink' => 'required',
            'id_lokasi' => 'required',
            'sw_lokasi' => 'required',
            'id_vendor' => 'required',
            'id_pengadaan' => 'required',
            'sw_keterangan' => 'required',
            'sw_status' => 'required',
            'image' =>'required|string',
        ];
    }


    public function messages()
    {
        return [
          'sw_name.required' => 'Nama Switch Tidak Boleh Kosong',
          'sw_ip.ipv4' => 'Gunakan IP Address Yang Valid',
          'sw_uplink.required' => 'Masukan Data Uplink Switch',
          'id_lokasi.required' => 'Pilih Lokasi Switch',
          'sw_lokasi.required' => 'Detail Lokasi Switch tidak boleh kosong',
          'id_vendor.required' => 'Pilih Vendor Switch',
          'id_pengadaan.required' => 'Pilih Tahun Pengadaan Switch',
          'sw_keterangan.required' => 'Keterangan Switch Tidak Boleh Kosong',
          'sw_status.required' => 'Pilih Status Switch',
        ];
    }
}
