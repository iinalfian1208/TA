@extends('admin.template')
@section('beranda')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-sm-12">
          <div class="home-tab">
            <h1 class="h3 mb-2 text-black fw-bold">Beranda</h1>
            <div class="tab-content tab-content-basic">
            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="row mb-3">
                <div class="col-lg-4 d-flex flex-column mb-2">
                  <div class="card bg-primary card-rounded">
                    <div class="card-body pb-0">
                      <h4 class="card-title mb-2 card-title-dash text-white ">Total Jurnal</h4>
                      <h2 class="text-white mb-4">{{ $total_j }}</h2>
                    </div>
                  </div>

                </div>
                <div class="col-lg-4 d-flex flex-column mb-2">
                  <div class="card bg-warning card-rounded">
                    <div class="card-body pb-0">
                      <h4 class="card-title mb-2 card-title-dash text-white ">Jumlah Penguna</h4>
                      <h2 class="text-white mb-4">{{ $pencarian }}</h2>
                    </div>
                  </div>

                </div>
                <div class="col-lg-4 d-flex flex-column mb-2">
                  <div class="card bg-success card-rounded">
                    <div class="card-body pb-0">
                      <h4 class="card-title mb-2 card-title-dash text-white ">Jumlah Kategori</h4>
                      <h2 class="text-white mb-4">{{ $kategori_null }}</h2>
                    </div>
                  </div>

                </div>


              </div>
                {{-- <div class="row">
                    <div class="col-sm-12">
                      <div
                        class="d-flex align-items-center justify-content-between">
                        <div class="col-lg-2 d-flex flex-column">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card card-rounded">
                                  <div class="card-body">
                                    <div class="row">
                                        <div>
                                            <p class="statistics-title">Total Jurnal</p>
                                            <h3 class="rate-percentage">{{ $total_j }}</h3>
                                            <p class="text-danger d-flex"></p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex flex-column">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card card-rounded">
                                  <div class="card-body">
                                    <div class="row">
                                        <div>
                                            <p class="statistics-title">Jumlah Pencarian Bulan Ini</p>
                                            <h3 class="rate-percentage-center">{{ $pencarian }}</h3>
                                            <p class="text-danger d-flex"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex flex-column">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card card-rounded">
                                  <div class="card-body">
                                    <div class="row">
                                        <div>
                                            <p class="statistics-title">Jumlah Perguruan Tinggi</p>
                                            <h3 class="rate-percentage"></h3>
                                            <p class="text-danger d-flex"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-2 d-flex flex-column">
                            <div class="col-12 grid-margin stretch-card">
                                <div class="card card-rounded">
                                  <div class="card-body">
                                    <div class="row">
                                        <div>
                                            <p class="statistics-title">Jumlah Kategori</p>
                                            <h3 class="rate-percentage">{{ $kategori_null }}</h3>
                                            <p class="text-danger d-flex"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div> --}}
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Diagram Batang</h5>
                                <h6 class="card-subtitle text-muted">Tren Pencarian Bulan Ini</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="chartjs-bar" width="816" height="600" style="display: block; height: 300px; width: 408px;" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                  {{-- <div class="col-lg-4 d-flex flex-column">
                    <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="card-title card-title-dash">Tren Pencarian Bulan</h4>
                                  </div>
                                  <canvas class="my-auto" id="doughnutChart" height="200"></canvas>
                                  <div id="doughnut-chart-legend" class="mt-5 text-center"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>


                  </div> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
      </div>
    </footer>
    <!-- partial -->
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Bar chart
        new Chart(document.getElementById("chartjs-bar"), {
            type: "bar",
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    backgroundColor: window.theme.primary,
                    borderColor: window.theme.primary,
                    hoverBackgroundColor: window.theme.primary,
                    hoverBorderColor: window.theme.primary,
                    data: <?php echo json_encode($total); ?>,
                    barPercentage: .75,
                    categoryPercentage: .5
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        stacked: false,
                        ticks: {
                            stepSize: 20
                        }
                    }],
                    xAxes: [
                        {
                            stacked: false,
                            gridLines: {
                                color: "transparent"
                            },
                            // ticks: {
                            //     callback: function(label, index, labels) {
                            //       if (/\s/.test(label)) {
                            //         return label.split(" ");
                            //       }else{
                            //         return label;
                            //       }
                            //     }
                            // }
                        }
                    ]

                }
            }
        });
    });
</script>
@endsection
