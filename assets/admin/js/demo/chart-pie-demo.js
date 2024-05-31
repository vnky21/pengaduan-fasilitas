$(document).ready(function () {
  $.ajax({
    url: "data-grafik-donut.php",
    method: "GET",
    success: function (data) {
      var data = JSON.parse(data);
      var labels = [];
      var totals = [];
      var backgroundColors = [];

      // Process data from JSON response
      data.forEach(function (item) {
        labels.push(item.status === "1" ? "Belum Ditanggapi" : "Sudah DItanggapi");
        totals.push(parseInt(item.total));
        backgroundColors.push(item.status === "1" ? '#e74a3b' : '#1cc88a');
      });

      // Pie Chart Example
      var ctx = document.getElementById("myPieChart");
      var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: labels,
          datasets: [{
            data: totals,
            backgroundColor: backgroundColors,
            hoverBackgroundColor: backgroundColors,
            hoverBorderColor: "rgba(234, 236, 244, 1)",
          }],
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
          },
          legend: {
            display: false
          },
          cutoutPercentage: 80,
        }
      });
    },
    error: function (xhr, status, error) {
      console.error('Error fetching data:', error);
    }
  });
});
