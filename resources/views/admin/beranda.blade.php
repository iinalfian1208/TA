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
                <div class="col-lg-3 d-flex flex-column mb-2">
                  <div class="card bg-primary card-rounded">
                    <div class="card-body pb-0">
                      <h4 class="card-title mb-2 card-title-dash text-white ">Total Jurnal</h4>
                      <h2 class="text-white mb-4">{{ $total_j}}</h2>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 d-flex flex-column mb-2">
                    <div class="card bg-secondary card-rounded">
                      <div class="card-body pb-0">
                        <h4 class="card-title mb-2 card-title-dash text-white ">Total Jurnal</h4>
                        <h2 class="text-white mb-4">{{ $total_pt}}</h2>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 d-flex flex-column mb-2">
                    <div class="card bg-success card-rounded">
                      <div class="card-body pb-0">
                        <h4 class="card-title mb-2 card-title-dash text-white ">Jumlah Kategori</h4>
                        <h2 class="text-white mb-4">{{ $kategori_null }}</h2>
                      </div>
                    </div>
                  </div>
                <div class="col-lg-3 d-flex flex-column mb-2">
                  <div class="card bg-warning card-rounded">
                    <div class="card-body pb-0">
                      <h4 class="card-title mb-2 card-title-dash text-white ">Jumlah Penguna</h4>
                      <h2 class="text-white mb-4">{{ $pencarian }}</h2>
                    </div>
                  </div>
                </div>
              </div>

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
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Website Jurnal Scarping @2023</span>
      </div>
    </footer>
    <!-- partial -->
  </div>
  @include('sweetalert::alert')
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
