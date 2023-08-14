@extends("layouts.dashboard_Admin")
@section('content')

<!-- ... autres contenus de la vue ... -->

<div class="card card-xl-stretch mb-xl-8">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Tickets traités par Nombre de Clients</span>
        </h3>
    </div>
    <div class="card-body py-3">
        <canvas id="myChartTicketsClients" style="max-height: 400px;"></canvas>
    </div>
</div>

<div class="card card-xl-stretch mb-xl-8">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Statistiques des Tickets par Année</span>
        </h3>
    </div>
    <div class="card-body py-3">
        <canvas id="myChartTicketsAnnee" style="max-height: 400px;"></canvas>
    </div>
</div>
<div class="card card-xl-stretch mb-xl-8">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder fs-3 mb-1">Tickets traités par Statut</span>
        </h3>
    </div>
    <div class="card-body py-3">
        <canvas id="myChartTicketsStatut"></canvas>
    </div>
</div>
<!-- ... autres contenus de la vue ... -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Graphique Tickets traités par Nombre de Clients
    var ctxTicketsClients = document.getElementById('myChartTicketsClients').getContext('2d');
    var myChartTicketsClients = new Chart(ctxTicketsClients, {
        type: 'bar',
        data: {
            labels: ['En Cours de Traitement', 'Nombre de Clients'],
            datasets: [{
                label: 'Statistiques',
                data: [@php echo $enCoursTickets @endphp, @php echo $clientsCount @endphp],
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Graphique Statistiques des Tickets par Année
    var ctxTicketsAnnee = document.getElementById('myChartTicketsAnnee').getContext('2d');
    var myChartTicketsAnnee = new Chart(ctxTicketsAnnee, {
        type: 'line',
        data: {
            labels: @json($years),
            datasets: [{
                label: 'Nombre de Tickets',
                data: @json($ticketCounts),
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    var ctxTicketsStatut = document.getElementById('myChartTicketsStatut').getContext('2d');
    var myChartTicketsStatut = new Chart(ctxTicketsStatut, {
        type: 'pie',
        data: {
            labels: ['Traité', 'Fermé', 'En Attente', 'En Cours'],
            datasets: [{
                data: [@php echo $traitesCount @endphp, @php echo $fermesCount @endphp, @php echo $enAttenteCount @endphp, @php echo $enCoursCount @endphp],
                backgroundColor: ['rgba(75, 192, 192, 0.8)', 'rgba(255, 99, 132, 0.8)', 'rgba(255, 205, 86, 0.8)', 'rgba(54, 162, 235, 0.8)']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false, // Pour désactiver le ratio d'aspect
            plugins: {
                legend: {
                    position: 'top', // Position de la légende
                },
            },
        }
    });
</script>

@endsection
