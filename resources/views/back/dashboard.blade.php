@extends('back.base')


@section('content')
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-stats">
                <div class="card-stats-items">
                    <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ $newsone }}</div>
                        <div class="card-stats-item-label">Nouvelles</div>
                    </div>
                    <div class="card-stats-item">
                        <div class="card-stats-item-count">{{ $validated }}</div>
                        <div class="card-stats-item-label">Validées</div>
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
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    @foreach($states as $state => $value)
                        <div class="mr-4 d-flex align-items-center">
                            <div style="height: 10px; width: 10px; border-radius: 10px; background-color: {{ $colors[$state] }}"></div>
                            <div class="ml-2">{{ $value }}</div>
                        </div>
                    @endforeach

                </div>
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
                location.href = '/admin/details/'+info.event.id
            }
        });
        calendar.render();
    });
</script>
@endpush
