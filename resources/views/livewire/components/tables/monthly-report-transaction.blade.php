<div>
    <div class="table-code-lab">
        <div class="">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Laporan <b> Bulanan</b></h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Bulan</th>
                        <th>Tahun</th>
                        <th>Transaksi</th>
                        <th>Total</th>

                    </tr>
                    </thead>
                    <tbody>
                    {{--                    <p>{{count($tableData)}}</p>--}}
                    @php
                        $num = 0;
                    @endphp
                    @foreach($reportTicketPerMonth as $item)
                        <tr>
                            <td>{{$item->month}}</td>
                            <td>{{$item->year }}</td>
                            <td>{{$item->total_record}}</td>
                            <td>
                                <div class="text-muted" style="float: right">
                                    <small class="opacity-5 pe-1">Rp</small>
                                    <span>{{number_format($item->total_amount)}}</span>
                                    <small class="text-{{$num > $item->total_amount ? 'danger' :'success'}} ps-2">
                                        <i class="fa fa-angle-{{$num > $item->total_amount ? 'down' :'up'}}"></i>
                                    </small>
                                </div>
                            </td>
                        </tr>
                        @php
                            $num = $item->total_amount;
                        @endphp
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
