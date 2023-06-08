@extends('admin.template')
@section('pengaturan')
<div class="main-panel">
    <div class="content-wrapper">
		<h1 class="h3 mb-2 text-black fw-bold">Pengaturan Scraping</h1>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card"></div>
          </div>
		{{-- @if(session()->has('sukses'))
			<div class="alert alert-success alert-dismissible" role="alert">
				<div class="alert-message">
					{{ session()->get('sukses') }}
				</div>
			</div>
		@endif
		@if(session()->has('error'))
			<div class="alert alert-danger alert-dismissible" role="alert">
				<div class="alert-message">
					{{ session()->get('error') }}
				</div>
			</div>
		@endif
		@if (count($errors) > 0)
			<div class="alert alert-danger alert-dismissible" role="alert">
				<div class="alert-message">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</div>
			</div>
		@endif --}}
		<div class="row">
			<div class="col-sm-6">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col mt-0">
								<h5 class="card-title">Jurnal</h5>
							</div>

						</div>
                        <h1 class="mt-1 mb-"></h1>
                        {{-- <h1 class="mt-1 mb-2">1500</h1> --}}
						<h1 class="mt-1 mb-3">{{ $total }}</h1>
						<div class="mb-0 d-flex align-items-center d-flex justify-content-between">
							<span class="text-muted " >Total Jurnal</span>
                            <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Mulai Scraping
                            </button></a></h4>
							{{-- <span><a type="button" data-toggle="modal" data-target="#jurnal"class="btn btn-primary">Mulai Scraping</a></span> --}}
						</div>
						{{-- Modal Jurnal --}}
						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
										<h5 class="modal-title"><strong>Tambah Data Jurnal</strong></h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body m-2">

										<div class="mb-3">
											<div class="col-auto">
												<p class="form-control form-control-md border-0" style="background-color: #a0b4b6" name="total" id="totalInSinta">{{ $coba }} (Pada Sinta)</p>
												<p class="form-control form-control-md border-0" name="total" style="background-color: #a0b4b6" id="totalInDb">Jumlah di Database {{ $total }}</p>
                                                {{-- <p class="form-control form-control-md bg-light border-0" name="total" id="totalInSinta">177 (Pada Sinta)</p>
												<p class="form-control form-control-md bg-light border-0" name="total" id="totalInDb">Jumlah di Database 1500</p> --}}
											</div>
										</div>
										<form action="/pengaturan/scraping_jurnal" method="POST" id="scrap" style="display: block;">
										{{ csrf_field() }}
										<input type="hidden" value="" name="peringkat">
											<div class="row">
												<div class="col-md-6">
													<div class="mb-3">
														<label class="form-label" for="inputUsername">Mulai dari Page</label>
														<input type="number" class="form-control" id="start_page" name="start_page" max={{$max_page}} min=1 required>
                                                        {{-- <input type="number" class="form-control" id="start_page" name="start_page"  min=1 required> --}}
													</div>
												</div>

												<div class="col-md-6">
													<div class="mb-3">
														<label class="form-label" for="inputUsername">Hingga Page</label>
														<input type="number" class="form-control" id="end_page" name="end_page" max={{$max_page}} min=1 required>
                                                        {{-- <input type="number" class="form-control" id="end_page" name="end_page"  min=1 required> --}}
													</div>
												</div>
											</div>
											<div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Tambahkan Data</button>
                                            </div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card"></div>
                  </div>
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col mt-0">
								<h5 class="card-title">Jadwal Publikasi</h5>
							</div>
						</div>
						<div class="mt-2 mb-0">
							<div class="mb-0 d-flex align-items-center d-flex justify-content-between">
								<span class="col-md-7 text-muted">Beberapa jurnal mungkin tidak memiliki data ini</span>
                                <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#publikasi">
                                    Mulai Scraping
                                </button></a></h4>
								{{-- <span><a type="button" data-toggle="modal" data-target="#publikasi" class="btn btn-primary">Mulai Scraping</a></span> --}}
							</div>
						</div>
						{{-- Modal Publikasi --}}
                        <div class="modal fade" id="publikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-fullscreen-sm-down" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
										<h5 class="modal-title mt-0"><strong>Tambah Data Jadwal Publikasi Jurnal</strong></h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body"  style="width: 100%">
										<form id="formSintaPub">
                                            <div class="form-group row col-12 mr-1" style="width: 100%">
                                                    <div class="col-md-2 mr-4"><label class="form-label" for="inputUsername">Pilih Peringkat SINTA</label></div>
                                                    <div class="col-1 mr-2">
                                                        <input class="form-check-input" type="radio" name="sintaPub" id="sp1" value="1">
                                                        <label class="form-check-label" for="s1">1</label>
                                                    </div>
                                                <div class="col-1 mr-2">
                                                    <input class="form-check-input" type="radio" name="sintaPub" id="sp2" value="2">
													<label class="form-check-label"  style="margin-right: 2px" for="s2">2</label>
                                                </div>
                                                <div class="col-1 mr-2">
                                                    <input class="form-check-input" type="radio" name="sintaPub" id="sp3" value="3">
													<label class="form-check-label" for="s3">3</label>
                                                </div>
                                                <div class="col-1 mr-2">
                                                    <input class="form-check-input" type="radio" name="sintaPub" id="sp4" value="4">
													<label class="form-check-label" for="s4">4</label>
                                                </div>
                                                <div class="col-1 mr-2">
                                                    <input class="form-check-input" type="radio" name="sintaPub" id="sp5" value="5">
													<label class="form-check-label" for="s5">5</label>
                                                </div>
                                                <div class="col-1 mr-2">
													<input class="form-check-input" type="radio" name="sintaPub" id="sp6" value="6">
													<label class="form-check-label" for="s6">6</label>
                                                </div>
                                                <div class="col-1 mr-3">
                                                    <input class="form-check-input" type="radio" name="sintaPub" id="sp6" value="0">
													<label class="form-check-label">Semua</label>
                                                </div>
                                                <div class="col-1">
                                                    <button type="submit" id="pilih" name="pilih" class="btn btn-primary">Pilih</button>
                                                </div>
                                              </div>
										</form>
										<div class="mb-3">
											<div class="col-auto">
												<span class="form-control form-control-md bg-light border-0" name="dataJurnal" id="dataJurnal"></span>
											</div>
										</div>
										<form action="/pengaturan/scraping_jadwal" method="POST" id="scrappub" style="display: none;">
										{{ csrf_field() }}
										<input type="hidden" value="" name="peringkatPub">
											<div class="row d-flex align-items-center">

												<div class="col-md-6">

													<div class="mb-3">
														<label class="form-label" for="inputUsername">Scraping sebanyak</label>
														<input type="number" class="form-control"  name="end_pub" min="" max="" required>
													</div>
												</div>
												<div class="col-md-6">

													<div class="mb-3">
														<label class="form-label" for="inputUsername">Dimulai dari Nomor</label>
														<input type="number" class="form-control"  name="start_pub" min="" max="" required>
													</div>
												</div>
											</div>
											<div class="mt-3 float-right">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
												<button type="submit" class="btn btn-primary">Tambahkan Data</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col mt-0">
								<h5 class="card-title">Catatan</h5>
							</div>
							<div class="col-auto">
							</div>
						</div>
                        <ul class="list-star">
                            <li class="text-muted">
                            Scraping secara bertahap karena jumlah data ribuan
                            </li>
                             <li class="text-muted">
                                Perguruan Tinggi dan Jurnal berasal dari scraping website SINTA
                            </li>
                            <li class="text-muted">
                                Jadwal Publikasi berasal dari scraping website masing-masing jurnal
                            </li>
                            <li class="text-muted">
                                Selalu cek data terutama jadwal publikasi, karena beberapa website berbeda struktur, tidak dapat di scraping, atau memang tidak ada informasi terkait
                            </li>
                            <li class="text-muted">
                                Kunjungi website jurnal terkait untuk melengkapi data null
                            </li>
                            <li class="text-muted">
                                Lakukan scraping ulang untuk update data setiap 2 atau 4 minggu sekali
                            </li>
                           </ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">
	$('#formSintaPub').on('submit',function(e){
		$("#scrappub").hide();
		e.preventDefault();
		let name = $('input[name="sintaPub"]:checked').val();
		// $('input[name="end_pub"]').val("'");
		$.ajax({
			url: "/cek_jurnal",
			type:"POST",
			data:{
				"_token": "{{ csrf_token() }}",
				peringkat_pub:name,
			},
			success:function(response){

				console.log(response);
				if (response) {
					$('input[name="peringkatPub"]').val(response.sinta);
					if (response.cek == 0) {
						$("#dataJurnal").text('Perlu melakukan scraping data jurnal');
					} else {
						$("#dataJurnal").text('Total Jurnal: '+response.jurnal);
						$("#scrappub").show();
						$('input[name="end_pub"]').attr('max', response.jurnal);
						$('input[name="end_pub"]').attr('min', 1);
					}
				// else if (response.jurnal == 0){
				// 		$("#dataJurnal").text('Seluruh data jurnal sudah memiliki data publikasi');
				//
				}
			},
			error: function(response) {
				$('#message-error').text(response.responseJSON.errors.message);
				$("scrappub").hide();
			}
		});
	});
</script>
<script>
	$(".pilih").click(function(){
		$("p").hide();
	});
</script>
@include('sweetalert::alert')


@endsection
