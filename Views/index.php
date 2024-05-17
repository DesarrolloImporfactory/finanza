<?php require_once './Views/templates/header.php'; ?>

<div class="container mx-auto mt-8">
    <div class="grid grid-cols-1 md:grid-cols-2 items-center">
        <h1 class="text-3xl font-bold mb-4">Dashboard</h1>
        <div class="flex md:justify-end md:mr-16 space-x-4">
            <div class="relative">
                <input type="text" id="start-date" class="date-input bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-pointer" placeholder="&#x1F4C5; Fecha Inicio" readonly>
            </div>
            <div class="relative">
                <input type="text" id="end-date" class="date-input bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-pointer" placeholder="&#x1F4C5; Fecha Fin" readonly>
            </div>
        </div>
    </div>

    <div class="grid gap-5 grid-cols-1 md:grid-cols-3 mt-4">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold">Saldo pendiente a Tiendas</h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h13m-3 6H9m-2 4H2m4-6h-.01M13 3v12m-2 0H3V3h8z" />
                </svg>
            </div>
            <p class="text-3xl text-end text-yellow-400 font-bold">$ 1,000.00</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold">Fondo</h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c0 1.105-.895 2-2 2s-2-.895-2-2 .895-2 2-2 2 .895 2 2zm-2-5v1m0 16v1m5.75-6.25L12 15.25l-3.75-3.75M5 12l-1-1m16 0l1-1m-8-6.75L15.25 12 12 8.75 8.75 12 12 15.25" />
                </svg>
            </div>
            <p class="text-3xl text-end text-green-400 font-bold">$ 20,000.00</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-bold">Total Pagado</h2>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 21V7a2 2 0 00-2-2H6a2 2 0 00-2 2v14m12-4H8m0-4h8m-8-4h4m4 0h1m0-2h-1m-4 0h4" />
                </svg>
            </div>
            <p class="text-3xl text-end text-red-400 font-bold">$ 500.00</p>
        </div>
    </div>

    <div class="mt-8 bg-white p-6 rounded-lg shadow-lg">
        <canvas id="financialChart" class="w-full h-64"></canvas>
    </div>
</div>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr@4.6.13/dist/l10n/es.js"></script>
<script>
    const ctx = document.getElementById('financialChart').getContext('2d');
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#start-date", {
            dateFormat: "Y-m-d",
            locale: "es",
            maxDate: "today",
            disableMobile: "true"
        });
        flatpickr("#end-date", {
            dateFormat: "Y-m-d",
            locale: "es",
            maxDate: "today",
            disableMobile: "true"
        });
    });
    const financialChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
            datasets: [{
                label: 'Ingresos',
                data: [12000, 15000, 13000, 17000, 20000, 22000],
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
            }, {
                label: 'Gastos',
                data: [8000, 9000, 7000, 11000, 15000, 18000],
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                fill: true,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                mode: 'index',
                intersect: false,
                callbacks: {
                    label: function(tooltipItem, data) {
                        return data.datasets[tooltipItem.datasetIndex].label + ': $' + tooltipItem.yLabel.toLocaleString();
                    }
                }
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Meses'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Cantidad'
                    }
                }]
            }
        }
    });
</script>

<?php require_once './Views/templates/footer.php'; ?>

<script>
    $(document).ready(function() {
        $.ajax({
            url: 'http://192.168.100.237:8080/Datos/financial',
            type: 'POST',
            data: JSON.stringify({
                servidor: 'marketplace'
            }),
            contentType: 'application/json',
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
</script>