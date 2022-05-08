<div>
    <div class="table-code-lab">
        <div class="">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Laporan <b> Harian</b></h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th style="width: 160px">Tanggal</th>
                        <th>Transaksi</th>
                        <th>Total</th>

                    </tr>
                    </thead>
                    <tbody>
                    {{--                    <p>{{count($tableData)}}</p>--}}
                    @foreach($reportTicketPerDate as $item)
                        <tr>
                            <td >{{$item->date }} - {{$item->month }} - {{$item->year}}</td>
                            <td>{{$item->total_record}}</td>
                            <td>Rp. {{number_format($item->total_amount)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
