<?php

namespace App\Http\Controllers;

use App\Models\DataPtM;
use Illuminate\Http\Request;
use App\Models\DataKategoriM;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            ->addColumn('action', function($row){
                return
                '<button type="button" class="btn btn-sm btn-primary" style="border-radius: 5px" data-bs-toggle="modal" data-bs-target="#editPT'.$row->id_pt.'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M5 23.7q-.825 0-1.413-.587T3 21.7v-14q0-.825.588-1.413T5 5.7h8.925L7 12.625V19.7h7.075L21 12.75v8.95q0 .825-.588 1.413T19 23.7H5Zm4-6v-4.25l7.175-7.175l4.275 4.2l-7.2 7.225H9Zm12.875-8.65L17.6 4.85l1.075-1.075q.6-.6 1.438-.6t1.412.6l1.4 1.425q.575.575.575 1.4T22.925 8l-1.05 1.05Z"/></svg>
                </button>

                <button type="button" class="btn btn-sm btn-danger" style="border-radius: 5px" data-bs-toggle="modal" data-bs-target="#hapusPT'.$row->id_pt.'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                </button>

                <form action="/detail_pt/edit/'.$row->id_pt.'" method="post">
				<input type="hidden" name="_token" id="csrf-token" value="'.Session::token().'" />
                <div class="modal fade" id="editPT'.$row->id_pt.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Perguruan Tinggi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body m-1">
                                <div class="mb-3">
                                    <label class="form-label" for="inputUsername">Nama Perguruan Tinggi</label>
                                    <input type="text" class="form-control" id="nama_pt" name="nama_pt" placeholder="Nama Perguruan Tinggi" value="'.$row->nama_pt.'" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label" for="inputUsername">Alamat</label>
                                    <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control">'.$row->alamat.'</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><p  width="60" height="60">Batal</p></button>
                                <button type="submit" class="btn btn-primary " id="btn_save"><p  width="40" height="40">Simpan Perubahan</p></button>
                            </div>
                        </div>
                    </div>
                    </form>
            </div>
            <div class="modal fade" id="hapusPT'.$row->id_pt.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Perguruan Tinggi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body m-2">
                                <div class="mb-3">
                                Yakin ingin menghapus perguruan tinggi
                                </div>
                                <div class="">
                                <strong style="margin: top 10px;">'.$row->nama_pt.'</strong>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><p  width="40" height="40">Batal</p></button>
                            <form action="/detail_pt/hapus/'.$row->id_pt.'" method="post">
                            <input type="hidden" name="_token" id="csrf-token" value="'.Session::token().'" />
                            <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-primary"><p  width="40" height="40">Hapus</p></button>
                            </form>
                        </div>
                    </div>
                    </form>
            </div>';

            })

            ->rawColumns(['action'])
            ->make(true);
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $data = User::select('*');
            $data = $this->model->data()
                // ->join('t_pt', 't_pt.id_pt', '=', 't_jurnal.id_pt')
                ->groupBy('nama_pt')
                ->get();
            // $data = DB::table("t_pt")->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){


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

        // if ($cek == 0) {
        //     Session::flash('error', 'Data sudah ada');
        // } else {
            $this->model->data()->insert($data);
            Session::flash('success', 'Berhasil menambahkan data');
        // }
        return redirect()->route('daftar_pt');
    }

    public function update(Request $request, $kode)
    {
        $input = $request->validate([
            'nama_pt' => 'required|max:70',
            'alamat'  => 'required|max:255',
        ]);

        $data    = [
            'nama_pt' => $request->nama_pt,
            'alamat'  => $request->alamat,
        ];

        // $cek = $this->model->data()->where('nama_pt', $request->nama_pt)->count();

        // if ($cek == 0) {
        //     Session::flash('gagal', 'Tidak dapat memperbarui data, data sudah ada');
        // } else {
            $this->model->data()->where('id_pt', $kode)->update($data);
            Session::flash('success', 'Berhasil memperbarui data');
        // }
        return redirect()->route('daftar_pt');
    }

    public function delete($kode)
    {
        try {
            $query = $this->model->data()->where('id_pt', $kode)->delete();
            return redirect()->route('daftar_pt')->with('success', 'Berhasil Menghapus Data User');
        } catch (Exception $e) {
            return redirect()->route('daftar_pt')->with('error', 'Gagal Menghapus Data User');
        }

    }
    // public function delete($kode)
    // {
    //     $this->model->data()->where('id_pt', $kode)->delete();
    //     Session::flash('success', 'Berhasil menghapus data');
    //     return redirect()->route('daftar_pt');
    // }
}
