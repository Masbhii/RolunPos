<x-app-layout>
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <h5 class="card-title fw-semibold mb-4">Grafik</h5>
                  <div class="card">

                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Grafik Penjualan Barang</h6>

                        </div>

                        <!-- Card Body grafik -->
                        <div class="card-body">
                            
                                <!-- masukkan ke array -->
                                <?php
                                foreach($grafik as $dt){
                                    $nama_barang[] = $dt->nama_barang;
                                    $jml_penjualan[] = (int)$dt->jml_penjualan;
                                }
                                ?>
                            <div id="grafik">

                            </div>
                        </div>
                        <!-- Akhir Card Body Grafik -->
                  </div>
                </div>
                
                
              </div>
            </div>
          </div>
        </div>

<script>
        
        var options = {
                series: <?php echo json_encode($jml_penjualan);?>,
                chart: {
                    width: 500,
                    type: 'pie',
                },
                labels: <?php echo json_encode($nama_barang);?>,
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
        };


        var chart = new ApexCharts(document.querySelector("#grafik"), options);

        chart.render();
  </script>
</x-app-layout>