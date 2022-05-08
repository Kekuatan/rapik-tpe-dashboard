<div>
    <section>
        <div class="row">
            <div class="col-md-12" id="table-daily">
                <h4 class="text-center">Laporan Casual Harian Semua Lokasi</h4>
                <div class="col-md-8">
                    <table class="table-condensed">
                        <tr>
                            <td width="10%">Lokasi</td>
                            <td>: Semua</td>
                        </tr>
                        <tr>
                            <td width="10%"> Tanggal</td>
                            <td> : 05-05-2022</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4 pull-right">
                    <a wire:click="excel" data-toggle="tooltip" data-placement="bottom" title="Cetak Excel"
                       class="btn btn-success btn-circle" style="margin-top: 0">
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
                                <th style="vertical-align: middle;text-align: center;" rowspan="3">LOKASI</th>
                                <th style="vertical-align: middle;text-align: center;" colspan="7">PERHITUNGAN</th>
                            </tr>
                            <tr>
                                <th style="text-align: center;" colspan="3">QTY KENDARAAN</th>
                                <th style="text-align: center;" colspan="3">QTY PEMBAYARAN</th>
                                <th style="text-align: center;vertical-align: middle;" rowspan="2">PENDAPATAN<br>(Rp)
                                </th>
                            </tr>
                            <tr>
                                <th style="text-align: center;">MOBIL</th>
                                <th style="text-align: center;">MOTOR</th>
                                <th style="text-align: center;">TRUCK</th>
                                <th style="text-align: center;">E-MONEY</th>
                                <th style="text-align: center;">TAP CASH</th>
                                <th style="text-align: center;">QR-CODE</th>
                            </tr>

                            </thead>
                            <tbody>

                            @foreach($data as $item)
                                <tr>
                                    <td style="text-align: center"> {{$item['location']}}</td>
                                    <td style="text-align: center"> {{$item['qty_mobil']}} </td>
                                    <td style="text-align: center"> {{$item['qty_motor']}} </td>
                                    <td style="text-align: center"> {{$item['qty_truck']}} </td>
                                    <td style="text-align: center"> {{$item['qty_emoney']}}</td>
                                    <td style="text-align: center"> {{$item['qty_tapcash']}} </td>
                                    <td style="text-align: center"> {{$item['qty_qrcode']}} </td>
                                    <td style="text-align: center"> {{$item['total_amount']}} </td>
                                </tr>
                            @endforeach


                            </tbody>
                            <tfoot>
                            <tr class="total">
                                <th style="">TOTAL</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>

                            </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body-->
                </div><!-- /.box -->
            </div>
        </div>
        <p><i>Dicetak oleh adminrkmparking pada 05-05-2022 01:08</i></p>
    </section>



</div>
