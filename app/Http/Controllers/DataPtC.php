<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPtM;
use App\Models\DataKategoriM;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class DataPtC extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->model = new DataPtM();
        // $this->kategori = new DataKategoriM();
    }

    public function json()
    {
        $data = DB::table("t_pt")->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($data){

                $btn = '<button type="button" class="btn btn-sm btn-primary editPT" style="border-radius: 5px" data-bs-toggle="modal" data-bs-target="#editPT"  id="'.$data->id_pt.'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M5 23.7q-.825 0-1.413-.587T3 21.7v-14q0-.825.588-1.413T5 5.7h8.925L7 12.625V19.7h7.075L21 12.75v8.95q0 .825-.588 1.413T19 23.7H5Zm4-6v-4.25l7.175-7.175l4.275 4.2l-7.2 7.225H9Zm12.875-8.65L17.6 4.85l1.075-1.075q.6-.6 1.438-.6t1.412.6l1.4 1.425q.575.575.575 1.4T22.925 8l-1.05 1.05Z"/></svg>
                        </button>';
                $btn .= '<button type="button" class="btn btn-sm btn-danger hapusPT" style="border-radius: 5px" data-bs-toggle="modal" data-bs-target="#hapusPT"  id="'.$data->id_pt.'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                        </button>';
                        return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $data = User::select('*');
            $data = DB::table("t_pt")->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '<button type="button" class="btn btn-sm btn-primary" style="border-radius: 5px" data-bs-toggle="modal" data-bs-target="#edit{{ $d->id_pt }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M5 23.7q-.825 0-1.413-.587T3 21.7v-14q0-.825.588-1.413T5 5.7h8.925L7 12.625V19.7h7.075L21 12.75v8.95q0 .825-.588 1.413T19 23.7H5Zm4-6v-4.25l7.175-7.175l4.275 4.2l-7.2 7.225H9Zm12.875-8.65L17.6 4.85l1.075-1.075q.6-.6 1.438-.6t1.412.6l1.4 1.425q.575.575.575 1.4T22.925 8l-1.05 1.05Z"/></svg>
                        </button>';
                        $btn .= '<button type="button" class="btn btn-sm btn-danger" style="border-radius: 5px" data-bs-toggle="modal" data-bs-target="#hapus{{ $d->id_pt }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                                </button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.daftarPT');

        // $data = $this->model->data()
        //         // ->join('t_pt', 't_pt.id_pt', '=', 't_jurnal.id_pt')
        //         ->groupBy('nama_pt')
        //         ->get();

        // return view('admin.daftarPT', ['data' => $data]);
    }

    public function create(Request $request)
    {
        $input = $request->validate([
            'nama_pt' => 'required|max:70',
            'alamat'  => 'required|max:255',
        ]);

        $data    = [
            'nama_pt' => $request->nama_pt,
            'alamat'  => $request->alamat,
        ];

        $cek = $this->model->data()->where('nama_pt', $request->nama_pt)->count();

        if ($cek == 0) {
            Session::flash('gagal', 'Data sudah ada');
        } else {
            $this->model->data()->insert($data);
            Session::flash('sukses', 'Berhasil menambahkan data');
        }
        return redirect()->route('daftar_pt');
    }

    public function getPT(Request $request){

        ## Read POST data

        $id = $request->post('id_pt');
        $data = DB::table("t_pt")->get($id_pt);

        // $data = Employees::find($id);

        $response = array();
        if(!empty($data)){

            $response['nama_pt'] = $data->nama_pt;
            $response['alamat'] = $data->alamat;

            $response['success'] = 1;
        }else{
            $response['success'] = 0;
        }

        return response()->json($response);

    }


    // Update Employee record
    public function update(Request $request){
        ## Read POST data
        $id = $request->post('id_pt');

        $data = DB::table("t_pt")->post($id_pt);

        $response = array();
        if(!empty($data)){
             $updata['nama_pt'] = $request->post('nama_pt');
             $updata['alamat'] = $request->post('alamat');

             if($data->update($updata)){
                  $response['success'] = 1;
                  $response['msg'] = 'Update successfully';
             }else{
                  $response['success'] = 0;
                  $response['msg'] = 'Record not updated';
             }

        }else{
             $response['success'] = 0;
             $response['msg'] = 'Invalid ID.';
        }

        return response()->json($response);
    }

    // Delete Employee
    public function hapus(Request $request){

        ## Read POST data
        $id = $request->post('id_pt');

        $data = DB::table("t_pt")->post($id_pt);

        if($data->delete()){
            $response['success'] = 1;
            $response['msg'] = 'Delete successfully';
        }else{
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }

        return response()->json($response);


    }



    // public function update(Request $request, $kode)
    // {
    //     $input = $request->validate([
    //         'nama_pt' => 'required|max:70',
    //         'alamat'  => 'required|max:255',
    //     ]);

    //     $data    = [
    //         'nama_pt' => $request->nama_pt,
    //         'alamat'  => $request->alamat,
    //     ];

    //     // $cek = $this->model->data()->where('nama_pt', $request->nama_pt)->count();

    //     // if ($cek == 0) {
    //     //     Session::flash('gagal', 'Tidak dapat memperbarui data, data sudah ada');
    //     // } else {
    //         $this->model->data()->where('id_pt', $kode)->update($data);
    //         Session::flash('sukses', 'Berhasil memperbarui data');
    //     // }
    //     return redirect()->route('daftar_pt');
    // }

    // public function delete($kode)
    // {
    //     $this->model->data()->where('id_pt', $kode)->delete();
    //     Session::flash('sukses', 'Berhasil menghapus data');
    //     return redirect()->route('daftar_pt');
    // }
}
