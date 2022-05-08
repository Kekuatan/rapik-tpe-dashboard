<div class="row">
    <div class="col-md-12" id="table-daily">
        <div class="col-md-12">
            <table class="table">
                <tr style="vertical-align: middle;text-align: center;" colspan="10">
                    <th style="vertical-align: middle;text-align: center;" colspan="10"> {{$title}} </th>
                </tr>
                <tr style="vertical-align: middle;text-align: center;" colspan="10">
                    <td style="vertical-align: middle;text-align: center;" colspan="10"> Laporan
                        Tanggal {{$startDate}} </td>
                </tr>
                <tr style="vertical-align: middle;text-align: center;" colspan="10">
                    <td style="vertical-align: middle;text-align: center;" colspan="10"> Tanggal
                        Cetak {{$currentData}} </td>
                </tr>

            </table>

        </div>

        <div class="col-md-12">
            <table class="table ">
                <tbody>
                <tr>
                    <td style="vertical-align: middle;text-align: left;" colspan="2">Lokasi</td>
                    <td style="vertical-align: middle;text-align: right;" colspan="2"> {{$locationName}}</td>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;text-align: left;" colspan="2">ID Mesin</td>
                    <td style="vertical-align: middle;text-align: right;" colspan="2"> {{$terminalIdName}}</td>
                </tr>
                </tbody>

                <tr>
                    <td style="vertical-align: middle;text-align: left;" colspan="2">Jenis Kendaraan</td>
                    <td style="vertical-align: middle;text-align: right;" colspan="2"> {{ $vehicleName }}</td>
                    <td></td>
                    <td></td>
                    <td style="vertical-align: middle;text-align: left;" colspan="2"> Type Pembayaran</td>
                    <td style="vertical-align: middle;text-align: right;" colspan="2"> {{$bankName}}</td>
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
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">Tanggal Masuk</th>
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">Plat Nomer</th>
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">Jenis Kendaraan</th>
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">Tanggal Keluar</th>
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">Durasi</th>
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">Status</th>
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">Total pembayaran</th>
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">Jenis Pembayaran</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr></tr>
                    @php
                        $index = 0;
                    @endphp
                    @if(blank($data))
                        <tr>
                            <td style="vertical-align: middle;text-align: center;" colspan="10"> Data tidak ditemukan
                            </td>
                        </tr>
                    @endif
                    @foreach($data as $item)
                        @php
                            $index = $index + 1;
                        @endphp
                        <tr>
                            <td style="text-align: center"> {{$index}} </td>
                            <td style="text-align: center"> {{$item->terminal_id}}</td>
                            <td style="text-align: center"> {{$item->tanggal}}</td>
                            <td style="text-align: center"> {{$item->nopol}}</td>
                            <td style="text-align: center"> {{$item->jenis_kend}}</td>
                            <td style="text-align: center"> {{$item->exit_date}}</td>
                            <td style="text-align: center"> {{$item->durasi}}</td>
                            <td style="text-align: center"> {{$item->status}}</td>
                            <td style="text-align: center"> {{$item->amount}}</td>
                            <td style="text-align: center"> {{$item->bank}}</td>
                            {{--                                    <td style="text-align: center"> {{$item['qty_mobil']}} </td>--}}
                            {{--                                    <td style="text-align: center"> {{$item['qty_motor']}} </td>--}}
                            {{--                                    <td style="text-align: center"> {{$item['qty_truck']}} </td>--}}
                            {{--                                    <td style="text-align: center"> {{$item['qty_emoney']}}</td>--}}
                            {{--                                    <td style="text-align: center"> {{$item['qty_tapcash']}} </td>--}}
                            {{--                                    <td style="text-align: center"> {{$item['qty_qrcode']}} </td>--}}
                            {{--                                    <td style="text-align: center"> {{$item['total_amount']}} </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="total">
                        <th>TOTAL</th>
                        @if(blank($data))
                            <th style="vertical-align: middle;text-align: center;" colspan="9"></th>
                        @else
                            <th style="vertical-align: middle;text-align: center;" colspan="7"></th>
                            <th style="vertical-align: middle;text-align: center;" colspan="2">
                                Rp. {{number_format(collect($data)->sum('amount'))}} </th>
                        @endif

                    </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body-->
        </div><!-- /.box -->
    </div>
</div>
<p><i>Dicetak oleh {{$userName}} pada {{ \Illuminate\Support\Carbon::now()->format('d-m-Y H:m:s')}}</i></p>

