<div>

    @livewire('components.boxes.vehicle-box')
    @livewire('components.boxes.payment-box')


    <div class="row">
        <div class="col-md-6 col-xl-7">
            <div class="card mb-3 ">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabs-eg-77">
                            <div class="card mb-3 widget-chart widget-chart2 text-start w-100">
                                <div class="widget-chat-wrapper-outer">
                                    <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                        <canvas id="canvas2"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3 ">
                                @livewire('components.tables.daily-report-transaction')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-5">
            <div class="card mb-3 ">
                @livewire('components.tables.yearly-report-transaction')
            </div>
            <div class="card mb-3 ">
                @livewire('components.tables.monthly-report-transaction')
            </div>
        </div>
    </div>

    @push('bottom-scripts')

        <script>
            let dataChart = @js($dataChart);
            console.log('dataChart');
            console.log(dataChart);
            window.onload = function () {
                var randomScalingFactor = function () {
                    return dataChart['sum']
                };

                var barChartData = {
                    labels: dataChart['labels'],
                    datasets: [{
                        label: 'Laporan Harian',
                        backgroundColor: window.chartColors.blue,
                        data: dataChart['data']
                    },
                        //     {
                        //     label: 'Dataset 2',
                        //     backgroundColor: window.chartColors.blue,
                        //     data: [
                        //         randomScalingFactor(),
                        //         randomScalingFactor(),
                        //         randomScalingFactor(),
                        //         randomScalingFactor(),
                        //         randomScalingFactor(),
                        //         randomScalingFactor(),
                        //         randomScalingFactor()
                        //     ]
                        // }, {
                        //     label: 'Dataset 3',
                        //     backgroundColor: window.chartColors.green,
                        //     data: [
                        //         randomScalingFactor(),
                        //         randomScalingFactor(),
                        //         randomScalingFactor(),
                        //         randomScalingFactor(),
                        //         randomScalingFactor(),
                        //         randomScalingFactor(),
                        //         randomScalingFactor()
                        //     ]
                        // }
                    ]

                };

                //Bar

                // console.log(barChartData)
                if (document.getElementById('canvas2')) {
                    var ctx = document.getElementById('canvas2').getContext('2d');
                    window.myBar = new Chart(ctx, {
                        type: 'bar',
                        data: barChartData,
                        options: {
                            responsive: true,
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: false,
                                text: 'Chart.js Bar Chart'
                            }
                        }
                    });
                }
            }
        </script>
    @endpush
</div>






