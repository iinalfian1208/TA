@extends('admin.template')
@section('detail_jurnal')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Data Umum Jurnal</h5>
                    {{-- <p class="text-primary mb-0">Anda bisa melakukan perubahan data.</p> --}}
                </div>
                <div class="card-body">
                    <form action="/detail_jurnal/edit/{{ $data->id_jurnal }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="d-flex align-items-center d-flex justify-content-between mb-2">
                                        <label class="form-label mb-0" for="inputUsername">URL</label>
                                        {{-- <a href="{{ $data->url }}" class="badge badge-primary-light" target="_blank">Kunjungi Website</a> --}}
                                        <button type="button" class="btn btn-sm btn-pill btn-primary float-right mb-1" name="simpan" id="simpan">
                                            <a href="{{ $data->url }}" target="_blank" style="color : white">Kunjungi Website</a>
                                        </button>
                                    </div>
                                    <input type="url" class="form-control" id="url" name="url" placeholder="URL" value="{{ $data->url }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputUsername">Nama Jurnal</label>
                                    <textarea name="nama_jurnal" cols="55" rows="2" id="nama_jurnal" required>{{ $data->nama_jurnal }}</textarea>
                                    {{-- <input type="text" class="form-control" id="nama_jurnal" name="nama_jurnal" placeholder="{{ $data->nama_jurnal }}" value="" required> --}}
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputUsername">Perguruan Tinggi</label>
                                    <select class="form-control" id="pt" name="pt" required>
                                        <option value="{{ $data->id_pt }}">{{ $data->nama_pt }}</option>
                                        {{-- <option disabled>Choose...</option> --}}
                                        {{-- @foreach ($kategori as $kategori)
                                        <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option> --}}
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="inputUsername">Peringkat</label>
                                        <select class="form-control" id="peringkat" name="peringkat" required>
                                            <option value="{{ $data->peringkat }}">SINTA {{ $data->peringkat }}</option>
                                            <option disabled>Choose...</option>
                                            <option value="1">SINTA 1</option>
                                            <option value="2">SINTA 2</option>
                                            <option value="3">SINTA 3</option>
                                            <option value="4">SINTA 4</option>
                                            <option value="5">SINTA 5</option>
                                            <option value="6">SINTA 6</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="inputUsername">Tanggal Pembaruan Data</label>
                                        <input type="text" class="form-control" id="tgl_ubah" name="tgl_ubah" placeholder="-" value="{{ $data->tgl_ubah }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (Auth::user()->level == 1)
                            <button type="submit" class="btn btn-primary float-right mt-1" name="simpan" id="simpan" >Simpan Data</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-5 grid-margin stretch-card">
          {{-- <div class="card"> --}}
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Data Publikasi Jurnal</h5>
                </div>
                {{-- @php
                    $image = DB::table('gambar')->where('produk_id', $p->id_produk)->get();
                @endphp --}}
                <div class="card-body">
                    <form action="/detail_jurnal/tambah/jp/{{ $data->id_jurnal }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <select class="form-control" id="bulan" name="bulan">
                                        <option selected disabled>Pilih Bulan</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Tambahkan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Jadwal</th>
                                    @if (Auth::user()->level == 1)
                                        <th colspan="2" class="text-center">Aksi</th>
                                    @else
                                        <th class="text-center">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $jp = 1;
                                @endphp
                                @foreach ($j_publikasi as $j_p)
                                    @php
                                        switch($j_p->bulan){
                                            case 1: $bln = 'Januari'; break;
                                            case 2: $bln = 'Februari'; break;
                                            case 3: $bln = 'Maret'; break;
                                            case 4: $bln = 'April'; break;
                                            case 5: $bln = 'Mei'; break;
                                            case 6: $bln = 'Juni'; break;
                                            case 7: $bln = 'Juli'; break;
                                            case 8: $bln = 'Agustus'; break;
                                            case 9: $bln = 'September'; break;
                                            case 10: $bln = 'Oktober'; break;
                                            case 11: $bln = 'November'; break;
                                            case 12: $bln = 'Desember'; break;
                                            default: $bln = null;
                                        }
                                    @endphp
                                    @if ($bln != null)
                                        <tr>
                                            <td class="text-center">{{ $jp++ }}</td>
                                            <form action="/detail_jurnal/edit/jp/{{ $j_p->id_publikasi_jurnal }}" method="post">
                                                {{ csrf_field() }}
                                                <td>
                                                    <select name="bulan" id="bulan" class="form-control form-control-sm-5">
                                                        <option value="{{ $j_p->bulan }}" selected>{{ $bln }}</option>
                                                        <option disabled>Pilih Bulan</option>
                                                        <option value="1">Januari</option>
                                                        <option value="2">Februari</option>
                                                        <option value="3">Maret</option>
                                                        <option value="4">April</option>
                                                        <option value="5">Mei</option>
                                                        <option value="6">Juni</option>
                                                        <option value="7">Juli</option>
                                                        <option value="8">Agustus</option>
                                                        <option value="9">September</option>
                                                        <option value="10">Oktober</option>
                                                        <option value="11">November</option>
                                                        <option value="12">Desember</option>
                                                    </select>
                                                </td>

                                                <td class="table-action text-center" style="width: 3px">
                                                    <a href="/detail_jurnal">
                                                        <button class="btn btn-sm btn-primary" style="border-radius: 5px"> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="currentColor" d="M5 23.7q-.825 0-1.413-.587T3 21.7v-14q0-.825.588-1.413T5 5.7h8.925L7 12.625V19.7h7.075L21 12.75v8.95q0 .825-.588 1.413T19 23.7H5Zm4-6v-4.25l7.175-7.175l4.275 4.2l-7.2 7.225H9Zm12.875-8.65L17.6 4.85l1.075-1.075q.6-.6 1.438-.6t1.412.6l1.4 1.425q.575.575.575 1.4T22.925 8l-1.05 1.05Z"/></svg></i></button>
                                                    </a>
                                                </td>
                                            </form>
                                            @if (Auth::user()->level == 1)
                                                <td class="table-action text-center" style="width: 3px">
                                                    <a type="button" data-toggle="modal" data-target="#hapus{{ $j_p->id_publikasi_jurnal }}">
                                                        <button class="btn btn-sm btn-danger" style="border-radius: 5px"><i class="fas fa-trash"></i>  <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg></button>
                                                    </a>
                                                </td>
                                            @endif
                                        </tr>
                                        {{-- Modal Hapus --}}
                                        <div class="modal fade" id="hapus{{ $j_p->id_publikasi_jurnal }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"><strong>Hapus Data Publikasi Jurnal</strong></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body m-3">
                                                        <p class="mb-0">Yakin ingin menghapus bulan <strong>{{ $bln }}</strong>?</p>
                                                        {{-- <p class="mb-0">Yakin ingin menghapus bulan <strong></strong>?</p> --}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <form action="/detail_jurnal/hapus/jp/{{ $j_p->id_publikasi_jurnal }}" method="post">
                                                            <form action="/detail_jurnal/hapus/jp/{" method="post">
                                                            {{ csrf_field() }}
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-primary">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </tbody>

                            {{-- @endforeach --}}
                        </table>
                    </div>
                </div>
            </div>
          {{-- </div> --}}
        </div>
        {{-- <div class="col-md-7 grid-margin stretch-card"></div> --}}
            <div class="col-md-7 grid-margin stretch-card">
            <div class="card">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Data Kategori Jurnal</h5>
                    </div>
                    {{-- @php
                        $image = DB::table('gambar')->where('produk_id', $p->id_produk)->get();
                    @endphp --}}

                    <div class="card-body">
                        <form action="/detail_jurnal/tambah/kat/{{ $data->id_jurnal }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <input type="hidden" name="produk" value="">
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <select class="form-control" id="kategori" name="kategori">
                                            <option selected disabled>Pilih Kategori</option>
                                            @foreach ($kategori as $k)
                                                <option value=""></option>
                                                <option value="{{ $k->nama_kategori }}">{{ $k->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Tambahkan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Kategori</th>
                                        @if (Auth::user()->level == 1)
                                            <th colspan="2" class="text-center">Aksi</th>
                                        @else
                                            <th class="text-center">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $jk = 1;
                                    @endphp
                                    @foreach ($j_kategori as $j_k)
                                        <tr>
                                            <td class="text-center">{{ $jk++ }}</td>
                                            <form action="/detail_jurnal/edit/kat/{{ $j_k->id_kategori }}" method="post">
                                                 {{ csrf_field() }}
                                                <td>
                                                    <select class="form-control" id="kategori" name="kategori">
                                                      <option value="{{ $j_k->id_kategori }}" selected>{{ $j_k->nama_kategori }}</option>
                                                        <option disabled>Pilih Kategori</option>
                                                        @foreach ($kategori as $k)
                                                            <option value="{{ $k->nama_kategori }}">{{ $k->nama_kategori }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="table-action text-center" style="width: 3px">
                                                    {{-- <a href="/detail_jurnal"> --}}
                                                        <button class="btn btn-sm btn-primary" style="border-radius: 5px"> <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="currentColor" d="M5 23.7q-.825 0-1.413-.587T3 21.7v-14q0-.825.588-1.413T5 5.7h8.925L7 12.625V19.7h7.075L21 12.75v8.95q0 .825-.588 1.413T19 23.7H5Zm4-6v-4.25l7.175-7.175l4.275 4.2l-7.2 7.225H9Zm12.875-8.65L17.6 4.85l1.075-1.075q.6-.6 1.438-.6t1.412.6l1.4 1.425q.575.575.575 1.4T22.925 8l-1.05 1.05Z"/></svg></i></button>
                                                    {{-- </a> --}}
                                                </td>
                                            </form>
                                            @if (Auth::user()->level == 1)
                                                <td class="table-action text-center" style="width: 3px">
                                                    <a type="button" data-toggle="modal" data-target="#hapusK{{ $j_k->id_kategori }}">
                                                    {{-- <a type="button" data-toggle="modal" data-target="#hapusK"> --}}
                                                        <button class="btn btn-sm btn-danger" style="border-radius: 5px"><i class="fas fa-trash"></i>  <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg></button>
                                                    </a>
                                                </td>
                                            @endif
                                        </tr>
                                        {{-- Modal Hapus --}}

                                            <div class="modal fade" id="hapusK{{ $j_k->id_kategori }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"><strong>Hapus Data Kategori Jurnal</strong></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body m-3">
                                                        <p class="mb-0">Yakin ingin menghapus kategori <strong>{{ $j_k->nama_kategori }}</strong>?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <form action="/detail_jurnal/hapus/kat/{{ $j_k->id_kategori }}" method="post">
                                                            <form action="/detail_jurnal/hapus/kat/\" method="post">
                                                            {{ csrf_field() }}
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-primary">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>

                                {{-- @endforeach --}}
                            </table>
                        </div>
                    </div>
                </div>
          {{-- </div> --}}

      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->

    <!-- partial -->
  </div>


@endsection


