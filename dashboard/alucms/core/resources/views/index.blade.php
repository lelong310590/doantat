<?php
/**
 * topbar.blade.php
 * Created by: trainheartnet
 * Created at: 7/2/20
 * Contact me at: longlengoc90@gmail.com
 */
?>

@extends('dashboard::master')

@section('pageTitle', trans('dashboard::dashboard.title'))

@section('content')
    <!-- Start Content-->
    <div class="col-xs-12">

        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <h4 class="mt-0 font-16">Người chơi mới</h4>
                    <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{number_format($monthUser)}}</span></h2>
                    <p class="text-muted mb-0">Tổng người chơi: {{number_format($totalUser)}}
                        <span class="float-right">
                            @if ($monthUser > $lastMonthUser)
                                <i class="fa fa-caret-up text-success mr-1"></i>{{$grownUserPercent}} %
                            @else
                                <i class="fa fa-caret-down text-danger mr-1"></i>{{$grownUserPercent}} %
                            @endif
                        </span>
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <h4 class="mt-0 font-16">Lượng vé trong tháng</h4>
                    <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{number_format($currentMonthTicket)}}</span></h2>
                    <p class="text-muted mb-0">Vé tháng trước: {{number_format($lastMonthTicket)}}
                        <span class="float-right">
                            @if ($currentMonthTicket > $lastMonthTicket)
                                <i class="fa fa-caret-up text-success mr-1"></i>{{$grownTicketPercent}} %
                            @else
                                <i class="fa fa-caret-down text-danger mr-1"></i>{{$grownTicketPercent}} %
                            @endif
                        </span>
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <h4 class="mt-0 font-16">Doanh số tháng</h4>
                    <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{number_format($currentMonthTicket * config('core.price_per_ticket'))}}</span>đ</h2>
                    <p class="text-muted mb-0">Doanh số tháng trước: {{number_format($lastMonthTicket * config('core.price_per_ticket'))}}đ
                        <span class="float-right">
                            @if ($currentMonthTicket > $lastMonthTicket)
                                <i class="fa fa-caret-up text-success mr-1"></i>{{$grownTicketPercent}} %
                            @else
                                <i class="fa fa-caret-down text-danger mr-1"></i>{{$grownTicketPercent}} %
                            @endif
                        </span>
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box">
                    <h4 class="mt-0 font-16">Giải thưởng kỳ</h4>
                    <h2 class="text-primary my-3 text-center"><span data-plugin="counterup">{{number_format($currentAward + $valueFromStartToNow)}}</span>đ</h2>
                    <p class="text-muted mb-0">Doanh số kỳ: {{number_format($valueFromStartToNow)}}đ
                        <span class="float-right">
                            @if ($valueFromStartToNow > config('core.start_award'))
                                <i class="fa fa-caret-up text-success mr-1"></i>{{number_format($valueFromStartToNow - config('core.start_award'))}}đ
                            @else
                                <i class="fa fa-caret-down text-danger mr-1"></i>{{number_format($valueFromStartToNow - config('core.start_award'))}}đ
                            @endif
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-6">
                <div class="card-box">
                    <h4 class="header-title mb-3">Bộ số được chọn nhiều</h4>
                    <x-alucms-component-table
                        :tabledata="$dangerNumber"
                        :head="['Bộ số', 'Lượt đánh']"
                        :tablefield="['value', 'count(value)']"
                        :toolbar=false
                    />
                </div> <!-- end card-box-->
            </div> <!-- end col -->

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Doanh thu hàng tháng (ngàn đồng)</h4>
                        <div class="row mt-4 text-center">
                            <div class="col-4">
                                <p class="text-muted font-15 mb-1 text-truncate">Cùng kỳ tháng trước</p>
                                @if ($currentMonthTicket > $lastMonthTicket)
                                    <h4><i class="fe-arrow-up text-success mr-1"></i>{{($currentMonthTicket - $lastMonthTicket) * config('core.price_per_ticket')}}đ</h4>
                                @else
                                    <h4><i class="fe-arrow-down text-danger mr-1"></i>{{($currentMonthTicket - $lastMonthTicket) * config('core.price_per_ticket')}}đ</h4>
                                @endif
                            </div>
                        </div>
                        <div class="mt-3 chartjs-chart">
                            <canvas id="projections-actuals-chart" data-colors="#4a81d4,#e3eaef" height="261"></canvas>
                        </div>
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->
@endsection

@push('js-init')
    <script type="text/javascript">
        ! function ($) {
            "use strict";

            var ChartJs = function () {
                this.$body = $("body"),
                    this.charts = []
            };

            ChartJs.prototype.respChart = function (selector, type, data, options) {

                // get selector by context
                var ctx = selector.get(0).getContext("2d");

                //default config
                Chart.defaults.global.defaultFontColor = "#8391a2";
                Chart.defaults.scale.gridLines.color = "#8391a2";

                // pointing parent container to make chart js inherit its width
                var container = $(selector).parent();

                // this function produce the responsive Chart JS

                function generateChart() {
                    // make chart width fit with its container
                    var ww = selector.attr('width', $(container).width());
                    var chart;
                    switch (type) {
                        case 'Line':
                            chart = new Chart(ctx, { type: 'line', data: data, options: options });
                            break;
                        case 'Doughnut':
                            chart = new Chart(ctx, { type: 'doughnut', data: data, options: options });
                            break;
                        case 'Pie':
                            chart = new Chart(ctx, { type: 'pie', data: data, options: options });
                            break;
                        case 'Bar':
                            chart = new Chart(ctx, { type: 'bar', data: data, options: options });
                            break;
                        case 'Radar':
                            chart = new Chart(ctx, { type: 'radar', data: data, options: options });
                            break;
                        case 'PolarArea':
                            chart = new Chart(ctx, { data: data, type: 'polarArea', options: options });
                            break;
                    }
                    return chart;
                };
                // run function - render chart at first load
                return generateChart();
            },
                // init various charts and returns
                ChartJs.prototype.initCharts = function () {
                    var charts = [];
                    var defaultColors = ["#1abc9c", "#f1556c", "#4a81d4", "#e3eaef"];

                    if ($('#revenue-chart').length > 0) {
                        var dataColors = $("#revenue-chart").data('colors');
                        var colors = dataColors? dataColors.split(",") : defaultColors.concat();

                        var lineChart = {
                            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                            datasets: [{
                                label: "Current Week",
                                backgroundColor: hexToRGB(colors[0], 0.3),
                                borderColor: colors[0],
                                data: [32, 42, 42, 62, 52, 75, 62]
                            }, {
                                label: "Previous Week",
                                fill: true,
                                backgroundColor: 'transparent',
                                borderColor: colors[1],
                                borderDash: [5, 5],
                                data: [42, 58, 66, 93, 82, 105, 92]
                            }]
                        };

                        var lineOpts = {
                            maintainAspectRatio: false,
                            legend: {
                                display: false
                            },
                            tooltips: {
                                intersect: false
                            },
                            hover: {
                                intersect: true
                            },
                            plugins: {
                                filler: {
                                    propagate: false
                                }
                            },
                            scales: {
                                xAxes: [{
                                    reverse: true,
                                    gridLines: {
                                        color: "rgba(0,0,0,0.05)"
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        stepSize: 20
                                    },
                                    display: true,
                                    borderDash: [5, 5],
                                    gridLines: {
                                        color: "rgba(0,0,0,0)",
                                        fontColor: '#fff'
                                    }
                                }]
                            }
                        };
                        charts.push(this.respChart($("#revenue-chart"), 'Line', lineChart, lineOpts));
                    }

                    //barchart
                    if ($('#projections-actuals-chart').length > 0) {
                        var dataColors = $("#projections-actuals-chart").data('colors');
                        var colors = dataColors? dataColors.split(",") : defaultColors.concat();

                        var barChart = {
                            // labels: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"],
                            labels: ["T 01", "T 02", "T 03", "T 04", "T 05", "T 06", "T 07", "T 08", "T 09", "T 10", "T 11", "T 12"],
                            datasets: [
                                {
                                    label: "Doanh thu vé",
                                    backgroundColor: colors[0],
                                    borderColor: colors[0],
                                    hoverBackgroundColor: colors[0],
                                    hoverBorderColor: colors[0],
                                    data: [
                                        @foreach($chartDataTickets as $c)
                                            {{$c / 1000}}
                                            @if(!$loop->last)
                                           ,
                                            @endif
                                        @endforeach
                                    ],
                                    barPercentage: 0.7,
                                    categoryPercentage: 0.5,
                                }
                            ]
                        };
                        var barOpts = {
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
                                xAxes: [{
                                    stacked: false,
                                    gridLines: {
                                        color: "rgba(0,0,0,0.01)"
                                    }
                                }]
                            }
                        };

                        charts.push(this.respChart($("#projections-actuals-chart"), 'Bar', barChart, barOpts));
                    }
                    return charts;
                },
                //initializing various components and plugins
                ChartJs.prototype.init = function () {
                    var $this = this;
                    // font
                    Chart.defaults.global.defaultFontFamily = 'Nunito,sans-serif';

                    // init charts
                    $this.charts = this.initCharts();

                    // enable resizing matter
                    $(window).on('resize', function (e) {
                        $.each($this.charts, function (index, chart) {
                            try {
                                chart.destroy();
                            }
                            catch (err) {
                            }
                        });
                        $this.charts = $this.initCharts();
                    });
                },

                //init flotchart
                $.ChartJs = new ChartJs, $.ChartJs.Constructor = ChartJs
        }(window.jQuery),

//initializing ChartJs
            function ($) {
                "use strict";
                $.ChartJs.init()
            }(window.jQuery);

        /* utility function */

        function hexToRGB(hex, alpha) {
            var r = parseInt(hex.slice(1, 3), 16),
                g = parseInt(hex.slice(3, 5), 16),
                b = parseInt(hex.slice(5, 7), 16);

            if (alpha) {
                return "rgba(" + r + ", " + g + ", " + b + ", " + alpha + ")";
            } else {
                return "rgb(" + r + ", " + g + ", " + b + ")";
            }
        }
    </script>
@endpush
