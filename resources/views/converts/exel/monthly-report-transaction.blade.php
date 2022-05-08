<div class="row">
    <div class="col-md-12" id="table-daily">
        <div class="col-md-12">
            <table class="table">
                <tr style="vertical-align: middle;text-align: center;" colspan="9">
                    <th style="vertical-align: middle;text-align: center;" colspan="9"> {{$title}} </th>
                </tr>
                <tr style="vertical-align: middle;text-align: center;" colspan="9">
                    <td style="vertical-align: middle;text-align: center;" colspan="9"> Laporan
                        Tanggal {{$startDate}} </td>
                </tr>
                <tr style="vertical-align: middle;text-align: center;" colspan="9">
                    <td style="vertical-align: middle;text-align: center;" colspan="9"> Tanggal
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
                    <td></td>
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
                    <td></td>
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
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">Tanggal</th>
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">Motor</th>
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">Mobil</th>
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">Truk</th>
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">Total Transaksi</th>
                        <th style="vertical-align: middle;text-align: center;" rowspan="2">Total pembayaran</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr></tr>
                    @php
                        $index = 0;
                    @endphp
                    @if(blank($data))
                        <tr>
                            <td style="vertical-align: middle;text-align: center;" colspan="10"> Data tidak ditemukan</td>
                        </tr>
                    @endif
                    @foreach($data as $key => $item)
                        @foreach($data[$key] as $item)
                            @php
                                $index = $index + 1;
                            @endphp
                            <tr>
                                <td style="text-align: center"> {{$index}} </td>
                                <td style="text-align: center"> </td>
                                <td style="text-align: center"> {{$item['terminal_id']}}</td>
                                <td style="text-align: center"> {{$item['date']}}</td>
                                <td style="text-align: center"> {{$item['qty_motor']}}</td>
                                <td style="text-align: center"> {{$item['qty_mobil']}}</td>
                                <td style="text-align: center"> {{$item['qty_truck']}}</td>
                                <td style="text-align: center"> {{$item['total_record']}}</td>
                                <td style="text-align: center"> {{$item['total_amount']}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="total">
                        <th >TOTAL</th>
                        @if(blank($data))
                            <th style="vertical-align: middle;text-align: center;" colspan="9"> </th>
                        @else
                            <th style="vertical-align: middle;text-align: center;" colspan="6">  </th>
                            <th style="vertical-align: middle;text-align: center;" colspan="1"> {{number_format($totalSumRecord)}} </th>
                            <th style="vertical-align: middle;text-align: center;" colspan="1"> Rp. {{number_format($totalSumAmount)}} </th>
                        @endif

                    </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body-->
        </div><!-- /.box -->
    </div>
</div>
<p><i>Dicetak oleh {{$userName}} pada {{ \Illuminate\Support\Carbon::now()->format('d-m-Y H:m:s')}}</i></p>

