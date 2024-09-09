@extends('back.base')


@section('content')
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-stats">
                <div class="card-stats-title">Resumé commande -
                    <div class="dropdown d-inline">
                        <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">Août</a>
                        <ul class="dropdown-menu dropdown-menu-sm">
                            <li class="dropdown-title">Selectionner le mois</li>
                            <li><a href="#" class="dropdown-item">Janvier</a></li>
                            <li><a href="#" class="dropdown-item">Fevrier</a></li>
                            <li><a href="#" class="dropdown-item">Mars</a></li>
                            <li><a href="#" class="dropdown-item">Avril</a></li>
                            <li><a href="#" class="dropdown-item">Mai</a></li>
                            <li><a href="#" class="dropdown-item">Juin</a></li>
                            <li><a href="#" class="dropdown-item">Juillet</a></li>
                            <li><a href="#" class="dropdown-item active">Août</a></li>
                            <li><a href="#" class="dropdown-item">Septembre</a></li>
                            <li><a href="#" class="dropdown-item">Octobre</a></li>
                            <li><a href="#" class="dropdown-item">Novembre</a></li>
                            <li><a href="#" class="dropdown-item">Decembre</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-stats-items">
                    <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ $newsone }}</div>
                        <div class="card-stats-item-label">Nouvelles</div>
                    </div>
                    <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ $validated }}</div>
                        <div class="card-stats-item-label">Validées</div>
                    </div>
                    <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ $pending }}</div>
                        <div class="card-stats-item-label">En cours</div>
                    </div>
                </div>
            </div>
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-archive"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Commandes</h4>
                </div>
                <div class="card-body">
                    {{ $total_commandes }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-chart"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                <canvas id="balance-chart" height="174" style="display: block; height: 87px; width: 367px;" width="734" class="chartjs-render-monitor"></canvas>
            </div>
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Prevision</h4>
                </div>
                <div class="card-body">
                    {{ $somme_commande }} FCFA
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-chart"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                <canvas id="sales-chart" height="174" style="display: block; height: 87px; width: 367px;" width="734" class="chartjs-render-monitor"></canvas>
            </div>
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-shopping-bag"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>En caisse</h4>
                </div>
                <div class="card-body">
                    {{ $somme_avance }} FCFA
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Nombre de packs</h4>
                </div>
                <div class="card-body">
                    {{ $pack_count }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Opérations en cours</h4>
                </div>
                <div class="card-body">
                    0
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Opérations suspendus</h4>
                </div>
                <div class="card-body">
                    0
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Opérations terminés</h4>
                </div>
                <div class="card-body">
                    0
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script src="assets/modules/chart.min.js"></script>
<script src="/assets/modules/chart.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: {
                url: '{{ route('commande_by_date') }}'
            },
            eventClick: (info)=>{
                console.table(info.event)
            }
        });
        calendar.render();
    });
</script>
@endpush
