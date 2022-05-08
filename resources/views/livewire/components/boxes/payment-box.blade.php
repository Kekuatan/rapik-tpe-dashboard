<div>
    <div class="card-header">
        <i class="header-icon lnr-gift icon-gradient bg-grow-early"> </i>
        Laporan Pembayaran ({{$startDate .'-'. $endDate}})
        <div class="btn-actions-pane-right">
            <div class="nav">
                <a data-toggle="tab" href="#"
                   wire:click.prevent = "changePeriode(null)"
                   class="border-0 btn-transition btn btn-outline-primary show {{blank($periode) ? 'active' : ''}}">Day
                </a>
                <a data-toggle="tab" href="#"
                   wire:click.prevent = "changePeriode('month')"
                   class="mr-1 ml-1 border-0 btn-transition btn btn-outline-primary show {{$periode=='month' ? 'active' : ''}}">Month
                </a>
                <a data-toggle="tab" href="#"
                   wire:click.prevent = "changePeriode('year')"
                   class="mr-1 ml-1 border-0 btn-transition btn btn-outline-primary show {{$periode=='year' ? 'active' : ''}}">Year
                </a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            @php
                $recordBank = [
                    'e-Money' => false,
                    'TapCash' => false,
                    'QR-code' => false,
                ]
            @endphp

            @foreach($reportBank as $item)

                @php
                   $recordBank[$item->bank] = true;

                @endphp
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">

                        <div style="font-size: 44px;
                        /*background-color: #FFCC3B;*/
                        margin-right: 10px;
                        padding: 10px;
                        color: #343a40;
                        width: 100px;
                        text-align: center;
                        border: 5px #FFCC3B solid;
                        border-radius: 15px;">
                            {{--                        <i class="fa {{\App\Enum\TicketEnum::getIconVehicle($item->jenis_kend)}}" aria-hidden="true" title="Copy to use motorcycle"></i>--}}
                            <i> <img style="width: 100%"
                                    src="{{asset('icons/svg/'.\App\Enum\TicketEnum::getIconPayment($item->bank).'.svg')}}"/>
                            </i>
                        </div>
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading"
                                         style="font-size: 28px; color: #343a40">{{$item->bank}}</div>
                                    <div class="widget-subheading">Total Transaksi : {{$item->total_record}}</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-success">{{number_format($item->total_amount)}}</div>
                                </div>
                            </div>
                            <div class="widget-progress-wrapper">
                                <div class="progress-bar-xs progress">
                                    <div class="progress-bar bg-primary" role="progressbar"
                                         aria-valuenow="{{ round(($item->total_record/$sumTotalRecord)*100) }}"
                                         aria-valuemin="0" aria-valuemax="100"
                                         style="width: {{ round(($item->total_record/$sumTotalRecord)*100) }}%;"></div>
                                </div>
                                <div class="progress-sub-label">
                                    <div class="sub-label-left">{{ round(($item->total_record*100) /$sumTotalRecord) }}%
                                    </div>
                                    <div class="sub-label-right">100%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                @foreach($recordBank as $key =>$item)
                    @if(!$recordBank[$key])
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content">

                                <div style="font-size: 44px;
                        background-color: white;
                        margin-right: 10px;
                        padding: 10px;
                        color: #343a40;
                        width: 100px;
                        text-align: center;
                        border: 5px #FFCC3B solid;
                        border-radius: 15px;">
                                    <i> <img
                                            src="{{asset('icons/svg/'.\App\Enum\TicketEnum::getIconPayment($key).'.svg')}}"/>
                                    </i>
                                </div>
                                <div class="widget-content-outer">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left">
                                            <div class="widget-heading"
                                                 style="font-size: 28px; color: #343a40">{{$key}}
                                            </div>
                                            <div class="widget-subheading">Total Kendaraan : 0</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-success">0</div>
                                        </div>
                                    </div>
                                    <div class="widget-progress-wrapper">
                                        <div class="progress-bar-xs progress">
                                            <div class="progress-bar bg-primary" role="progressbar"
                                                 aria-valuenow="0"
                                                 aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 0%;"></div>
                                        </div>
                                        <div class="progress-sub-label">
                                            <div class="sub-label-left">0%
                                            </div>
                                            <div class="sub-label-right">100%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
        </div>
    </div>
</div>
