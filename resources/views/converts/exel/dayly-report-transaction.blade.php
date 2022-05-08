<div class="row">
    <div class="col-md-12" id="table-daily">
        <div class="col-md-12">
            <table class="table">
                <tr style="vertical-align: middle;text-align: center;" colspan="6">
                    <th style="vertical-align: middle;text-align: center;" colspan="6"> {{$title}} </th>
                </tr>
                <tr style="vertical-align: middle;text-align: center;" colspan="6">
                    <td style="vertical-align: middle;text-align: center;" colspan="6"> Laporan
                        Tanggal {{$startDate}} </td>
                </tr>
                <tr style="vertical-align: middle;text-align: center;" colspan="6">
                    <td style="vertical-align: middle;text-align: center;" colspan="6"> Tanggal
                        Cetak {{$currentData}} </td>
                </tr>

            </table>

        </div>

        <div class="col-md-12">
            <table class="table ">
                <tbody>
                <tr>
                    <td style="vertical-align: middle;text-align: left;" colspan="1">Lokasi</td>
                    <td style="vertical-align: middle;text-align: right;" colspan="1"> {{$locationName}}</td>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;text-align: left;" colspan="1">ID Mesin</td>
                    <td style="vertical-align: middle;text-align: right;" colspan="1"> {{$terminalIdName}}</td>
                </tr>
                </tbody>

                <tr>
                    <td style="vertical-align: middle;text-align: left;" colspan="1">Jenis Kendaraan</td>
                    <td style="vertical-align: middle;text-align: right;" colspan="1"> {{ $vehicleName }}</td>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;text-align: left;" colspan="1"> Type Pembayaran</td>
                    <td style="vertical-align: middle;text-align: right;" colspan="1"> {{$bankName}}</td>
                </tr>

            </table>
        </div>
        <div class="col-md-4 pull-right mb-3">
            <a wire:click.prevent="excel" data-toggle="tooltip" data-placement="bottom" title="Cetak Excel"
               class="btn btn-success btn-circle" style="margin-top: 0;float:right">
                <i class="fa fa-file-excel-o"></i>
            </a>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="box">
            <div class="box-body">
                <table id="datatable" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">No</th>
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">Lokasi</th>
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">ID Mesin</th>
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">Waktu</th>
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">Total Transaksi</th>
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">Total pembayaran</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr></tr>
                    @php
                        $index = 0;
                        $total_sum = 0;
                        $hours = ['00','01','02','03','04','05','06','07','08','09','10','11','12','13','14'
                        ,'15','16','17','18','19','20','21','22','23']
                    @endphp
                    @if(blank($data))
                        <tr>
                            <td style="vertical-align: middle;text-align: center;" colspan="10"> Data tidak ditemukan</td>
                        </tr>
                    @endif
                    @foreach($data as $key => $item)
                        @php
                            $hourAfter = '01';
                            $total_sum = $total_sum + collect($data[$key])->sum('total_amount');
                        @endphp
                        @foreach($hours as  $hour)
                            @php
                                $index = $index + 1;
                                $findItem = collect($data[$key])->where('hour', '==', $hour )->values()->first();
                            @endphp
                            @if(blank($findItem))
                                <tr>
                                    <td style="text-align: center"> {{$index}} </td>
                                    <td style="text-align: center"> </td>
                                    <td style="text-align: center"> {{$key}}</td>
                                    <td style="text-align: center"> {{$hour}}:00 - {{$hourAfter}}:00 </td>
                                    <td style="text-align: center"> 0 </td>
                                    <td style="text-align: center">  0 </td>
                                </tr>
                            @else
                                <tr>
                                    <td style="text-align: center"> {{$index}} </td>
                                    <td style="text-align: center"> </td>
                                    <td style="text-align: center"> {{$findItem->terminal_id}}</td>
                                    <td style="text-align: center"> {{$findItem->hour}}:00 - {{$hourAfter}}:00</td>
                                    <td style="text-align: center"> {{$findItem->total_record}}</td>
                                    <td style="text-align: center"> {{$findItem->total_amount}}</td>
                                </tr>
                            @endif
                            @php
                                $hourBefore = $hourAfter;
                            @endphp
                        @endforeach
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="total">
                        <th >TOTAL</th>
                        @if(blank($data))
                            <th style="vertical-align: middle;text-align: center;" colspan="5"> </th>
                        @else
                            <th style="vertical-align: middle;text-align: center;" colspan="3">  </th>
                            <th style="vertical-align: middle;text-align: center;" colspan="2"> Rp. {{number_format($total_sum)}} </th>
                        @endif

                    </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body-->
        </div><!-- /.box -->
    </div>
</div>
<p><i>Dicetak oleh {{$userName}} pada {{ \Illuminate\Support\Carbon::now()->format('d-m-Y H:m:s')}}</i></p>

