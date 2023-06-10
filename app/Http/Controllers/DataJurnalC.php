<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataJurnalM;
use App\Models\DataKategoriM;
use App\Models\DataPtM;
use App\Models\DataPJM;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class DataJurnalC extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->model = new DataJurnalM();
        $this->kategori = new DataKategoriM();
        $this->pt = new DataPtM();
        $this->publikasi = new DataPJM();
    }

    public function json()
    {

        $data = $this->model->data()
                ->join('t_pt', 't_pt.id_pt', '=', 't_jurnal.id_pt')
                ->get();


        return Datatables::of($data)
            ->addIndexColumn()

            ->addColumn('action', function($row){

                $buttons = '<a href="/detail_jurnal/'.$row->id_jurnal.'">
                <button type="button" class="btn btn-sm btn-primary" style="border-radius: 5px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="30" viewBox="0 0 25 25"><path fill="currentColor" d="M5 23.7q-.825 0-1.413-.587T3 21.7v-14q0-.825.588-1.413T5 5.7h8.925L7 12.625V19.7h7.075L21 12.75v8.95q0 .825-.588 1.413T19 23.7H5Zm4-6v-4.25l7.175-7.175l4.275 4.2l-7.2 7.225H9Zm12.875-8.65L17.6 4.85l1.075-1.075q.6-.6 1.438-.6t1.412.6l1.4 1.425q.575.575.575 1.4T22.925 8l-1.05 1.05Z"/></svg>
                </button>
            </a>';

            if (Auth::user()->level == 1) {
                $buttons .= '<button type="button" class="btn btn-sm btn-danger" style="border-radius: 5px" data-bs-toggle="modal" data-bs-target="#hapus'.$row->id_jurnal.'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                </button>

                <div class="modal fade" id="hapus'.$row->id_jurnal.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Jurnal</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body m-2">
                                <div class="">
                                    <p class="mb-2">Yakin ingin menghapus perguruan tinggi</p><br>
                                    <strong style="margin: top 10px;">'.$row->nama_jurnal.' ?</strong>
                                </div>
                                <div class="">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><p  width="40" height="40">Batal</p></button>
                                <form action="/daftar_jurnal/hapus/'.$row->id_jurnal.'" method="post">
                                    <input type="hidden" name="_token" id="csrf-token" value="'.Session::token().'" />
                                    <button type="submit" class="btn btn-primary"><p  width="40" height="40">Hapus</p></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>';
            }

            return $buttons;
        })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $data = User::select('*');
            // $data = DB::table('t_jurnal')->get();

            $data = $this->model->data()
            ->join('t_pt', 't_pt.id_pt', '=', 't_jurnal.id_pt')
            ->get();

            // dd($data);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return
                '<a href="/detail_jurnal/'.$row->id_jurnal.'">
                    <button type="button" class="btn btn-sm btn-primary" style="border-radius: 5px">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="30" viewBox="0 0 25 25"><path fill="currentColor" d="M5 23.7q-.825 0-1.413-.587T3 21.7v-14q0-.825.588-1.413T5 5.7h8.925L7 12.625V19.7h7.075L21 12.75v8.95q0 .825-.588 1.413T19 23.7H5Zm4-6v-4.25l7.175-7.175l4.275 4.2l-7.2 7.225H9Zm12.875-8.65L17.6 4.85l1.075-1.075q.6-.6 1.438-.6t1.412.6l1.4 1.425q.575.575.575 1.4T22.925 8l-1.05 1.05Z"/></svg>
                    </button>
                </a>
                <button type="button" class="btn btn-sm btn-danger" style="border-radius: 5px" data-bs-toggle="modal" data-bs-target="#hapus'.$row->id_jurnal.'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                </button>

                <div class="modal fade" id="hapus'.$row->id_jurnal.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Jurnal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body m-2">
                    <div class="mb-3">
                    Yakin ingin menghapus perguruan tinggi<strong style="margin: top 10px;"> '.$row->nama_jurnal.' ?</strong>
                    </div>
                    <div class="">

                    </div>
                </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><p  width="40" height="40">Batal</p></button>
                        <form action="/daftar_jurnal/hapus/'.$row->id_jurnal.'" method="post">
                        <input type="hidden" name="_token" id="csrf-token" value="'.Session::token().'" />
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

        return view('admin.daftarJurnal');
                // $data = $this->model->data()
                //         ->join('t_pt', 't_pt.id_pt', '=', 't_jurnal.id_pt')
                //         ->paginate(10);
        // $data = $this->model->data()
        //         ->join('t_pt', 't_pt.id_pt', '=', 't_jurnal.id_pt')
        //         ->get();

        // return view('admin.daftarJurnal', ['data' => $data]);
    }
    public function cek()
    {
        if (Auth::user()->level == 1) {
            # code...
        return redirect()->route('daftar_jurnal.json');
        }else{
            return redirect()->route('daftar_jurnal.json');
        }
        # code...
    }

    public function create(Request $request)
    {
        // $input = $request->validate([
        //     'nama_jurnal'   => 'required|max:100',
        //     'url'           => $request->url,
        //     'peringkat'     => $request->peringkat,
        //     'id_pt'         => Hash::make($request->email),
        // ]);

        // if ($input->fails()) {
        //     Session::flash('gagal', 'Periksa kembali masukan anda');
        //     return redirect()->route('data_admin');
        // }
        $pt = $this->pt->data()->where('nama_pt', $request->pt)->first();

        $data    = [
            'nama_jurnal'=> $request->nama_jurnal,
            'url'        => $request->url,
            'peringkat'  => $request->peringkat,
            'id_pt'      => $pt->id_pt,
            'tgl_buat'   => date('Y-m-d H:i:s'),
        ];

        $this->model->data()->insert($data);
        Session::flash('sukses', 'Berhasil menambahkan data');
        return redirect()->route('daftar_jurnal');
    }

    public function update(Request $request, $kode)
    {
        $input = $request->validate([
            'nama_jurnal'=> 'required|max:100',
            'url'        => 'required|max:100',
            'peringkat'  => 'required|max:1',
            'id_pt'      => 'required',
        ]);

        $data    = [
            'nama_jurnal'  => $request->nama_jurnal,
            'url'          => $request->url,
            'peringkat'    => $request->peringkat,
            'id_pt'        => $request->id_pt,
            'tgl_ubah'     => date('Y-m-d H:i:s'),
        ];

        $this->model->data()->where('id_jurnal', $kode)->update($data);
        // Session::flash('sukses', 'Berhasil memperbarui data');
        return redirect('/detail_jurnal/'.$kode)->with('success', 'Berhasil memperbarui data');
    }

    public function delete($kode)
    {
        $this->model->data()->where('id_jurnal', $kode)->delete();
        // Session::flash('sukses', 'Berhasil menghapus data');
        return redirect('/daftar_jurnal')->with('success', 'Berhasil menghapus data jurnal');
    }

    public function indexDetail($kode)
    {
        $data       = $this->model->data()
                    ->join('t_pt', 't_pt.id_pt', '=', 't_jurnal.id_pt')
                    ->where('id_jurnal', $kode)
                    ->first();
        $j_kategori = $this->kategori->data()->where('id_jurnal', $kode)->get();
        $j_publikasi= $this->publikasi->data()->where('id_jurnal', $kode)->get();

        // $j_publikasi       = $this->model->data()
        //                     ->leftJoin('t_publikasi_jurnal', 't_publikasi_jurnal.id_jurnal', '=', 't_jurnal.id_jurnal')
        //                     ->where('t_jurnal.id_jurnal', $kode)
        //                     ->get();
        $kategori   = $this->kategori->data()->groupBy('nama_kategori')->get();

        return view('admin.detailJurnal', ['data' => $data, 'j_kategori' => $j_kategori, 'kategori' => $kategori, 'j_publikasi' => $j_publikasi]);
    }

    public function createJK(Request $request, $kode)
    {
        $data = [
            'id_jurnal'     => $kode,
            'nama_kategori' => $request->kategori
        ];
        $data = $this->kategori->data()->insert($data);
        // Session::flash('sukses', 'Berhasil menambahkan kategori');
        return redirect('/detail_jurnal/'.$kode)->with('success', 'Berhasil Menambahkan Kategori');
    }

    public function updateJK(Request $request, $kode)
    {
        $data = [
            'nama_kategori' => $request->kategori
        ];

        $j = $this->kategori->data()->where('id_kategori', $kode)->first();

        $data = $this->kategori->data()->where('id_kategori', $kode)->update($data);

        // Session::flash('sukses', 'Berhasil memperbarui kategori');
        return redirect('/detail_jurnal/'.$j->id_jurnal)->with('success', 'Berhasil Memperbarui Kategori');
    }

    public function deleteJK($kode)
    {
        $j = $this->kategori->data()->where('id_kategori', $kode)->first();

        $this->kategori->data()->where('id_kategori', $kode)->delete();

        // Session::flash('sukses', 'Berhasil menghapus kategori');
        return redirect('/detail_jurnal/'.$j->id_jurnal)->with('success', 'Berhasil Menghapus Kategori');
    }

    public function createJP(Request $request, $kode)
    {
        $data = [
            'id_jurnal'     => $kode,
            'bulan'         => $request->bulan
        ];
        $data = $this->publikasi->data()->insert($data);
        // Session::flash('sukses', 'Berhasil menambahkan jadwal publikasi');
        return redirect('/detail_jurnal/'.$kode)->with('success', 'Berhasil Menambahkan Jadwal Publikasi');
    }

    public function updateJP(Request $request, $kode)
    {
        $data = [
            'bulan' => $request->bulan
        ];

        $j = $this->publikasi->data()->where('id_publikasi_jurnal', $kode)->first();

        $data = $this->publikasi->data()->where('id_publikasi_jurnal', $kode)->update($data);

        // Session::flash('sukses', 'Berhasil memperbarui jadwal publikasi');
        return redirect('/detail_jurnal/'.$j->id_jurnal)->with('success', 'Berhasil Memperbarui Jadwal Publikasi');
        // return redirect()->route('data_user')->with('success', 'Berhasil Menambahkan Data User');
    }

    public function deleteJP($kode)
    {
        $j = $this->publikasi->data()->where('id_publikasi_jurnal', $kode)->first();

        $this->publikasi->data()->where('id_publikasi_jurnal', $kode)->delete();

        // Session::flash('sukses', 'Berhasil menghapus jadwal publikasi');
        return redirect('/detail_jurnal/'.$j->id_jurnal)->with('success', 'Berhasil Menghapus Jadwal Publikasi');
    }
}
