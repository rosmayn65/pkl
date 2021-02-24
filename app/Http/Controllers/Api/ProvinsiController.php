<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use Validator; 

class ProvinsiController extends Controller
{

    public function index()
    {
        $provinsi = Provinsi::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Provinsi',
            'data' => $provinsi
        ], 200);
    }

    public function store(Request $request)
    {
        //validasi data
        $validator = Validator::make($request->all(), [
            'kode_prov' => 'required|unique:provinsis',
            'nama_prov' => 'required'
        ],
            [
                'kode_prov.required' => 'Masukan Kode Provinsi',
                'kode_prov.unique' => 'Kode Provinsi Sudah Ada',
                'nama_prov.required' => 'Masukan Nama Provinsi',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data' => $validator->errors()
            ],400);

        } else {

             $provinsi = Provinsi::create([
                'kode_prov' => $request->input('kode_prov'),
                'nama_prov'   => $request->input('nama_prov')
            ]);


            if ($provinsi) {
                return response()->json([
                    'success' => true,
                    'message' => 'Provinsi Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Provinsi Gagal Disimpan!',
                ], 400);
            }
        }
    }

    public function show($id)
    {
        $provinsi = Provinsi::whereId($id)->first();

        if ($provinsi) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Provinsi!',
                'data'    => $Provinsi
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Provinsi Tidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
    }


    public function update(Request $request, $id)
    {
        //validasi data
        $validator = Validator::make($request->all(), [
            'kode_prov' => 'required|unique:provinsis',
            'nama_prov' => 'required',
        ],
            [
                'kode_prov.required' => 'Masukkan Kode Provinsi',
                'kode_prov.unique' => 'Kode Provinsi Sudah Ada',
                'nama_prov.required' => 'Masukkan Nama Provinsi',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Data Yang Kosong',
                'data' => $validator->errors()
            ],400);

        } else {

            $provinsi = Provinsi::whereId($request->input('id'))->update([
                'kode_prov' => $request->input('kode_prov'),
                'nama_prov' => $request->input('nama_prov'),
            ]);


            if ($provinsi) {
                return response()->json([
                    'success' => true,
                    'message' => 'Provinsi Berhasil DiUpdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Provinsi Gagal DiUpdate!',
                ], 500);
            }

        }

    }

    
    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();

        if ($provinsi) {
            return response()->json([
                'success' => true,
                'message' => 'Provinsi Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Provinsi Gagal Dihapus!',
            ], 500);
        }

    }
}