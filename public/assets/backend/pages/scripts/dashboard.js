

    function showChartTooltip(x, y, xValue, yValue) {
                $('<div id="tooltip" class="chart-tooltip">' + yValue + '<\/div>').css({
                    position: 'absolute',
                    display: 'none',
                    top: y - 40,
                    left: x - 40,
                    border: '0px solid #ccc',
                    padding: '2px 6px',
                    'background-color': '#fff'
                }).appendTo("body").fadeIn(200);
            }


    function GetChartPelanggaran(jumlahPelanggaran)
    {
          if ($('#site_statistics').size() != 0) {

                    $('#site_statistics_loading').hide();
                    $('#site_statistics_content').show();

                    var plot_statistics = $.plot($("#site_statistics"), [{
                            data: jumlahPelanggaran,
                            lines: {
                                fill: 0.6,
                                lineWidth: 0
                            },
                            color: ['#f89f9f']
                        }, {
                            data: jumlahPelanggaran,
                            points: {
                                show: true,
                                fill: true,
                                radius: 5,
                                fillColor: '#f89f9f',
                                lineWidth: 3
                            },
                            color: '#fff',
                            shadowSize: 0
                        }],

                        {
                            xaxis: {
                                tickLength: 0,
                                tickDecimals: 0,
                                mode: "categories",
                                min: 0,
                                font: {
                                    lineHeight: 18,
                                    style: "normal",
                                    variant: "small-caps",
                                    color: "#6F7B8A"
                                }
                            },
                            yaxis: {
                                ticks: 5,
                                tickDecimals: 0,
                                tickColor: "#eee",
                                font: {
                                    lineHeight: 14,
                                    style: "normal",
                                    variant: "small-caps",
                                    color: "#6F7B8A"
                                }
                            },
                            grid: {
                                hoverable: true,
                                clickable: true,
                                tickColor: "#eee",
                                borderColor: "#eee",
                                borderWidth: 1
                            }
                        });

                    var previousPoint = null;
                    $("#site_statistics").bind("plothover", function(event, pos, item) {
                        $("#x").text(pos.x.toFixed(2));
                        $("#y").text(pos.y.toFixed(2));
                        if (item) {
                            if (previousPoint != item.dataIndex) {
                                previousPoint = item.dataIndex;

                                $("#tooltip").remove();
                                var x = item.datapoint[0].toFixed(2),
                                    y = item.datapoint[1].toFixed(2);

                                showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + ' pelanggaran');
                            }
                        } else {
                            $("#tooltip").remove();
                            previousPoint = null;
                        }
                    });
                }

    }

    function GetChartBimbingan(jumlahBimbingan,tiPeGrafik)
    {
          if ($('#site_statistics').size() != 0) {

                    $('#site_activities_loading').hide();
                    $('#site_activities_content').show();

                    var TipeWarna;
                    // 1 pengajuan // 2 terealisasi // 3 tak terealisasi 
                    if(tiPeGrafik == 1)
                    {
                      TipeWarna = '#86b0e0';

                    }
                    else if(tiPeGrafik == 2)
                    {
                      TipeWarna = '#32c5d2';

                    }
                    else
                    {
                      TipeWarna = '#8e44ad';

                    }


                    var plot_statistics = $.plot($("#site_activities"), [{
                            data: jumlahBimbingan,
                            lines: {
                                fill: 0.6,
                                lineWidth: 0
                            },
                            color: [TipeWarna]
                        }, {
                            data: jumlahBimbingan,
                            points: {
                                show: true,
                                fill: true,
                                radius: 5,
                                fillColor: TipeWarna, // warna point grafik
                                lineWidth: 3
                            },
                            color: '#fff',
                            shadowSize: 0
                        }],

                        {
                            xaxis: {
                                tickLength: 0,
                                tickDecimals: 0,
                                mode: "categories",
                                min: 0,
                                font: {
                                    lineHeight: 18,
                                    style: "normal",
                                    variant: "small-caps",
                                    color: "#6F7B8A"
                                }
                            },
                            yaxis: {
                                ticks: 5,
                                tickDecimals: 0,
                                tickColor: "#eee",
                                font: {
                                    lineHeight: 14,
                                    style: "normal",
                                    variant: "small-caps",
                                    color: "#6F7B8A"
                                }
                            },
                            grid: {
                                hoverable: true,
                                clickable: true,
                                tickColor: "#eee",
                                borderColor: "#eee",
                                borderWidth: 1
                            }
                        });

                    var previousPoint = null;
                    $("#site_activities").bind("plothover", function(event, pos, item) {
                        $("#x").text(pos.x.toFixed(2));
                        $("#y").text(pos.y.toFixed(2));
                        if (item) {
                            if (previousPoint != item.dataIndex) {
                                previousPoint = item.dataIndex;

                                $("#tooltip").remove();
                                var x = item.datapoint[0].toFixed(2),
                                    y = item.datapoint[1].toFixed(2);

                                showChartTooltip(item.pageX, item.pageY, item.datapoint[0], item.datapoint[1] + ' Bimbingan');
                            }
                        } else {
                            $("#tooltip").remove();
                            previousPoint = null;
                        }
                    });
                }

    }
       
          

               $(document).on('click', '#BtnPengajuanBimbingan', function() { 
                $("#Grafik2").text("Pengajuan Bimbingan");
                 CreateChartBimbingan();
                
            });

               $(document).on('click', '#BtnTotalRealisasi', function() { 
                 $("#Grafik2").text("Total Realisasi");
                 CreateChartBimbinganRealisasi();
            });

               $(document).on('click', '#BtnPengajuanTakRealisasi', function() { 
                 $("#Grafik2").text("Pengajuan Tak Realisasi");
                 CreateChartBimbinganTakRealisasi();
            });
        //};

  
  function CreateChartPelanggaran()
  {


      $.ajax({
             
                  type:'GET',
                  url:'./DashboardpelanggaranSeminggu',
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {

                        
                          

                            var jumlahPelanggaran = [
                            [data.tanggal[0].Tgl_Hari_Ini, data.angka[0].Hari_Ini],
                            [data.tanggal[0].Tgl_kemarin1, data.angka[0].kemarin1],
                            [data.tanggal[0].Tgl_kemarin2, data.angka[0].kemarin2],
                            [data.tanggal[0].Tgl_kemarin3, data.angka[0].kemarin3],
                            [data.tanggal[0].Tgl_kemarin4, data.angka[0].kemarin4],
                            [data.tanggal[0].Tgl_kemarin5, data.angka[0].kemarin5],
                            [data.tanggal[0].Tgl_kemarin6, data.angka[0].kemarin6]];
                            GetChartPelanggaran(jumlahPelanggaran);

                           
                                                                
                  }
                  
             });

  

  }     

  function CreateChartBimbingan()
  {


      $.ajax({
             
                  type:'GET',
                  url:'./DashboardPengajuanBimbinganSeminggu',
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {

                          var jumlahBimbingan = [
                            [data.tanggal[0].Tgl_Hari_Ini, data.angka[0].Ren_Hari_Ini],
                            [data.tanggal[0].Tgl_kemarin1, data.angka[0].Ren_Kemarin1],
                            [data.tanggal[0].Tgl_kemarin2, data.angka[0].Ren_Kemarin2],
                            [data.tanggal[0].Tgl_kemarin3, data.angka[0].Ren_Kemarin3],
                            [data.tanggal[0].Tgl_kemarin4, data.angka[0].Ren_Kemarin4],
                            [data.tanggal[0].Tgl_kemarin5, data.angka[0].Ren_Kemarin5],
                            [data.tanggal[0].Tgl_kemarin6, data.angka[0].Ren_Kemarin6]];
                            var tiPeGrafik = 1; // 1 pengajuan // 2 terealisasi // 3 tak terealisasi 
                            GetChartBimbingan(jumlahBimbingan,tiPeGrafik);
                   
                            
           
                  }
                  
             });
 
       
      
  

  }      


  function CreateChartBimbinganRealisasi()
  {


       $.ajax({
             
                  type:'GET',
                  url:'./DashboardRealisasiSeminggu',
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {

                          var jumlahBimbingan = [
                            [data.tanggal[0].Tgl_Hari_Ini, data.angka[0].Rel_Hari_Ini],
                            [data.tanggal[0].Tgl_kemarin1, data.angka[0].Rel_Kemarin2],
                            [data.tanggal[0].Tgl_kemarin2, data.angka[0].Rel_Kemarin3],
                            [data.tanggal[0].Tgl_kemarin3, data.angka[0].Rel_Kemarin4],
                            [data.tanggal[0].Tgl_kemarin4, data.angka[0].Rel_Kemarin5],
                            [data.tanggal[0].Tgl_kemarin5, data.angka[0].Rel_Kemarin6],
                            [data.tanggal[0].Tgl_kemarin6, data.angka[0].Rel_Kemarin7]];
                            var tiPeGrafik = 2; // 1 pengajuan // 2 terealisasi // 3 tak terealisasi 
                            GetChartBimbingan(jumlahBimbingan,tiPeGrafik);
                   
                            
           
                  }
                  
             });
 
  }

  function CreateChartBimbinganTakRealisasi()
  {


      $.ajax({
             
                  type:'GET',
                  url:'./DashboardPengajuanTakRealisasiSeminggu',
                  headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
                  success: function(data)
                  {

                             var jumlahBimbingan = [
                            [data.tanggal[0].Tgl_Hari_Ini, data.angka[0].Rel_Hari_Ini],
                            [data.tanggal[0].Tgl_kemarin1, data.angka[0].Rel_Kemarin2],
                            [data.tanggal[0].Tgl_kemarin2, data.angka[0].Rel_Kemarin3],
                            [data.tanggal[0].Tgl_kemarin3, data.angka[0].Rel_Kemarin4],
                            [data.tanggal[0].Tgl_kemarin4, data.angka[0].Rel_Kemarin5],
                            [data.tanggal[0].Tgl_kemarin5, data.angka[0].Rel_Kemarin6],
                            [data.tanggal[0].Tgl_kemarin6, data.angka[0].Rel_Kemarin7]];
                            var tiPeGrafik = 3; // 1 pengajuan // 2 terealisasi // 3 tak terealisasi 
                            GetChartBimbingan(jumlahBimbingan,tiPeGrafik);
                   
                            
           
                  }
                  
             });
 
  }



if (App.isAngularJsApp() === false) {
    jQuery(document).ready(function() {
       // Dashboard.init(); // init metronic core componets
        // this.initCharts();
        CreateChartPelanggaran();
        CreateChartBimbingan();
    });
}