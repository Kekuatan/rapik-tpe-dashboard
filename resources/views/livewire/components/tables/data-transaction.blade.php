<div>
    <div class="table-code-lab">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Data <b>Tickets</b></h2>
                        </div>
                        <div class="col-sm-6">



                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Kendaraan</th>
                        <th>Amount</th>
                        <th>Bank</th>
                        <th>Status</th>

                    </tr>
                    </thead>
                    <tbody>
                    {{--                    <p>{{count($tableData)}}</p>--}}
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{ ($tickets ->currentpage()-1) * $tickets ->perpage() + $loop->index + 1 }}</td>
                            <td>{{$ticket->jenis_kend}}</td>
                            <td>{{$ticket->amount }}</td>
                            <td>{{$ticket->bank}}</td>
                            <td class="{{$ticket->status == 'aktif' ? 'text-success' : 'text-danger'}}">{{strtoupper($ticket->status)}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="clearfix">
                    <p class="hint-text"> Showing <b>{{$showingPage}}</b> out of <b> {{$sumTotalRecord}}</b> entries</p>
                    <ul class="pagination">
                        {{ $tickets->links() }}
                    </ul>
                </div>
            </div>
        </div>
    <script>
        let a = @js($tickets);
        console.log(a)
    </script>
    </div>
</div>


