$(document).ready(function () {
  $.ajax({
      url: "data-grafik-area.php",
      method: "GET",
      success: function (data) {
          var data = JSON.parse(data);
          var labels = [];
          var totals = [];

         // Inisialisasi nilai total laporan untuk setiap bulan menjadi 0
         var totalPerBulan = {};
         var namaBulan = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
         for (var i = 1; i <= 12; i++) {
             totalPerBulan[i] = 0;
         }

         // Mengisi total laporan berdasarkan data yang ada di database
         for (var i = 0; i < data.length; i++) {
             var bulan = data[i].bulan;
             var total = parseInt(data[i].total);
             var indexBulan = namaBulan.indexOf(bulan);
             if (indexBulan !== -1) {
                 totalPerBulan[indexBulan + 1] = total;
             }
         }

         // Mengisi array labels dengan nama-nama bulan
         for (var i = 1; i <= 12; i++) {
             labels.push(namaBulan[i - 1]);
             totals.push(totalPerBulan[i]);
         }

          var ctx = document.getElementById('myAreaChart').getContext('2d');
          var myChart = new Chart(ctx, {
              type: 'line', // Ubah tipe grafik menjadi 'line'
              data: {
                  labels: labels,
                  datasets: [{
                      label: 'Total Pengaduan ',
                      data: totals,
                      fill: true, // Tambahkan opsi fill: true untuk menciptakan efek area
                      backgroundColor: 'rgba(0, 26, 102, 0.5)',
                      borderColor: 'rgba(0, 26, 102, 1)',
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      y: {
                          beginAtZero: true,
                          
                      }
                  }
              }
          });
      },
      error: function (data) {
          console.log(data);
      }
  });
});
