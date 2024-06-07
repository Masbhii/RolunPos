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
                            <h6 class="m-0 font-weight-bold text-primary">Grafik Penjualan Barang Bulan Berjalan</h6>

                        </div>

                        <!-- Card Body grafik -->
                        <div class="card-body">
                            
                                <!-- masukkan ke array -->
                                <?php
                                    foreach($grafik as $dt){
                                        $waktu[] = $dt->waktu;
                                        $jml_mukena_artiz[] = (int)$dt->jml_mukena_artiz;
                                        $jml_mukena_religius[] = (int)$dt->jml_mukena_religius;
                                        $jml_mukena_modis[] = (int)$dt->jml_mukena_modis;
                                        $jml_mukena_unyuy[] = (int)$dt->jml_mukena_unyuy;
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
        // number format
        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }
        
        var options = {
                series: [
                    {
                        name: 'Mukena Artiz',
                        data: <?php echo json_encode($jml_mukena_artiz);?>
                    },
                    {
                        name: 'Mukena Religius',
                        data: <?php echo json_encode($jml_mukena_religius);?>
                    },
                    {
                        name: 'Mukena Modis',
                        data: <?php echo json_encode($jml_mukena_modis);?>
                    },
                    {
                        name: 'Mukena Unyuy',
                        data: <?php echo json_encode($jml_mukena_unyuy);?>
                    }
                ],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded',
                        dataLabels: {
                            position: 'top', // top, center, bottom
                        },
                    },
                },
                dataLabels: {
                    enabled: false,
                    formatter: function (val) {
                        return number_format(val);
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ["#304758"]
                    }
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: <?php echo json_encode($waktu);?>,
                },
                yaxis: {
                    title: {
                        text: 'Jml Penjualan Barang'
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return number_format(val)+' barang';
                        }
                    }
                }
        };


        var chart = new ApexCharts(document.querySelector("#grafik"), options);

        chart.render();
  </script>
</x-app-layout>