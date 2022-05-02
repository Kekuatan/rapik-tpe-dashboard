<div>
    <input wire:model='input.startDate'>
    <input wire:model='input.endDate'>
    <div class="mb-8">
        <label class="inline-block w-32 font-bold">Lokasi:</label>
        <select name="country" wire:model="input.location" class="border shadow p-2 bg-white">
            @foreach($locations as $key => $item)
                <option value={{ $key}}>{{ $item }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-8">
        <label class="inline-block w-32 font-bold">Kendaraan:</label>
        <select name="country" wire:model="input.vehicle" class="border shadow p-2 bg-white">
            @foreach($vehicles as $key => $item)
                <option value={{ $key}}>{{ $item }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-8">
        <label class="inline-block w-32 font-bold">Bank:</label>
        <select name="country" wire:model="input.bank" class="border shadow p-2 bg-white">
            @foreach($banks as $key => $item)
                <option value={{ $key}}>{{ $item }}</option>
            @endforeach
        </select>
    </div>

    <button wire:click.prevent='changeDate'> submit</button>
    <button wire:click='downloadPdf'> export pdf</button>
    <p class="mb-3"></p>
    <div class="row">
        <div class="main-card mb-3 card" style="background-color:currentcolor">
            <div class="no-gutters row">
                <div class="col-12" style="padding: 20px">
                    <p style ="text-align: right;
                        margin: auto;
                        font-size: 15px;
                        color: white;
                        letter-spacing: 3px"
                    > {{$startDate}} sampai {{$endDate}} </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="main-card mb-3 card" style="background-color:#2e3192">
            <div class="no-gutters row">
                <div class="col-12" style="padding: 20px">
                    <p style ="text-align: center;
                        margin: auto;
                        font-size: 20px;
                        color: white;
                        font-weight: 600;"
                    > Total Pemasukan / <span style="color:#3ac47d;">{{$sumTotalRecord}}</span> kendaraan </p>
                    <p style ="text-align: center;
                        margin: auto;
                        font-size: 37px;
                        color: #3ac47d;
                        font-weight: 600;"
                    >
                        Rp. {{ number_format($sumTotalAmount )}}
                    </p>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        @foreach($reportVehicle as $item)
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div style="font-size: 44px;
                        background-color: #FFCC3B;
                        margin-right: 10px;
                        padding: 10px;
                        color: #343a40;
                        width: 100px;
                        text-align: center;
                        border: 5px #343a40 solid;
                        border-radius: 15px;">
{{--                        <i class="fa {{\App\Enum\TicketEnum::getIconVehicle($item->jenis_kend)}}" aria-hidden="true" title="Copy to use motorcycle"></i>--}}
                        <i> <img src = "{{asset('icons/svg/'.\App\Enum\TicketEnum::getIconVehicle($item->jenis_kend).'-solid.svg')}}" /> </i>
                    </div>
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading" style="font-size: 28px; color: #343a40">{{$item->jenis_kend}}</div>
                                <div class="widget-subheading">Total Kendaraan : {{$item->total_record}}</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-success">{{number_format($item->total_amount)}}</div>
                            </div>
                        </div>
                        <div class="widget-progress-wrapper">
                            <div class="progress-bar-xs progress">
                                <div class="progress-bar bg-primary" role="progressbar"
                                     aria-valuenow="{{ round(($item->total_record/$sumTotalRecord)*100) }}"
                                     aria-valuemin="0" aria-valuemax="100" style="width: {{ round(($item->total_record/$sumTotalRecord)*100) }}%;"></div>
                            </div>
                            <div class="progress-sub-label">
                                <div class="sub-label-left">{{ round(($item->total_record*100) /$sumTotalRecord) }}%</div>
                                <div class="sub-label-right">100%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row">
    <div class="main-card mb-3 card">
        <div class="no-gutters row">
            @foreach($reportBank as $item)
            <div class="col-md-4">
                <div class="widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content ml-0 mr-3">
                            <div class="widget-numbers text-success">{{number_format($item->total_amount)}}</div>
                        </div>
                        <div class="widget-content-left">
                            <div class="widget-heading">{{$item->bank}}</div>
                            <div class="widget-subheading">{{$item->total_record}}</div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>

    <div class="table-code-lab">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Data <b>Tickets</b></h2>
                        </div>
                        <div class="col-sm-6">

                            <a
                                wire:click.prevent="openModal('forms.area-position.create-form')" href="#"
                                class="btn btn-success">
                                <i class="material-icons">&#xE147;</i>
                                <span>Add New Area</span>
                            </a>

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
                            <td>{{$ticket->status}}</td>
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
    </div>
    <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 ">
                    <div class="table-code-lab">
                        <div class="">
                            <div class="table-wrapper">
                                <div class="table-title">
                                    <div class="row">
                                        <div class="col-sm-6">
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
                                    @foreach($reportTicketPerMonth as $item)
                                        <tr>
                                            <td>{{$item->month}}</td>
                                            <td>{{$item->year }}</td>
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
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card mb-3 ">
                    <div class="table-code-lab">
                        <div class="">
                            <div class="table-wrapper">
                                <div class="table-title">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h2>Laporan <b> Tahunan</b></h2>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Tahun</th>
                                        <th>Transaksi</th>
                                        <th>Total</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    {{--                    <p>{{count($tableData)}}</p>--}}
                                    @foreach($reportTicketPerYear as $item)
                                        <tr>
                                            <td>{{$item->year }}</td>
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
            </div>
            <div class="col-md-6 col-xl-5">
                <div class="card mb-3 ">
                    <div class="table-code-lab">
                        <div class="">
                            <div class="table-wrapper">
                                <div class="table-title">
                                    <div class="row">
                                        <div class="col-sm-6">
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
            </div>
    </div>


</div>


<style>

    .widget-numbers {
        font-size: 1.3rem !important;
        font-weight:normal !important;
    }
    .table-code-lab {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
    }

    .table-code-lab .table-responsive {
        margin: 30px 0;
    }

    .table-code-lab .table-wrapper {
        background: #fff;
        padding: 20px 25px;
        border-radius: 3px;
        /*min-width: 1000px;*/
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-code-lab .table-title {
        padding-bottom: 15px;
        background: #2e3192;
        color: #fff;
        padding: 16px 30px;
        min-width: 100%;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }

    .table-code-lab .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }

    .table-code-lab .table-title .btn-group {
        float: right;
    }

    .table-code-lab .table-title .btn {
        color: #fff;
        float: right;
        font-size: 13px;
        border: none;
        min-width: 50px;
        border-radius: 2px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }

    .table-code-lab .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }

    .table-code-lab .table-title .btn span {
        float: left;
        margin-top: 2px;
    }

    .table-code-lab table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }

    .table-code-lab table.table tr th:first-child {
        width: 60px;
    }

    /*.table-code-lab table.table tr th:last-child {*/
    /*    width: 100px;*/
    /*}*/

    .table-code-lab table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }

    .table-code-lab table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }

    .table-code-lab table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }

    .table-code-lab table.table td:last-child i {
        opacity: 0.9;
        font-size: 22px;
        margin: 0 5px;
    }

    .table-code-lab table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
        outline: none !important;
    }

    .table-code-lab table.table td a:hover {
        color: #2196F3;
    }

    .table-code-lab table.table td a.edit {
        color: #FFC107;
    }

    .table-code-lab table.table td a.delete {
        color: #F44336;
    }

    .table-code-lab table.table td i {
        font-size: 19px;
    }

    .table-code-lab table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }

    .table-code-lab .pagination {
        float: right;
        margin: 0 0 5px;
    }

    .table-code-lab .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }

    .table-code-lab .pagination li a:hover {
        color: #666;
    }

    .table-code-lab .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }

    .table-code-lab .pagination li.active a:hover {
        background: #0397d6;
    }

    .table-code-lab .pagination li.disabled i {
        color: #ccc;
    }

    .table-code-lab .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }

    .table-code-lab .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }

    /* Custom checkbox */
    .custom-checkbox {
        position: relative;
    }

    .table-code-lab .custom-checkbox input[type="checkbox"] {
        opacity: 0;
        position: absolute;
        margin: 5px 0 0 3px;
        z-index: 9;
    }

    .table-code-lab .custom-checkbox label:before {
        width: 18px;
        height: 18px;
    }

    .table-code-lab .custom-checkbox label:before {
        content: '';
        margin-right: 10px;
        display: inline-block;
        vertical-align: text-top;
        background: white;
        border: 1px solid #bbb;
        border-radius: 2px;
        box-sizing: border-box;
        z-index: 2;
    }

    .table-code-lab .custom-checkbox input[type="checkbox"]:checked + label:after {
        content: '';
        position: absolute;
        left: 6px;
        top: 3px;
        width: 6px;
        height: 11px;
        border: solid #000;
        border-width: 0 3px 3px 0;
        transform: inherit;
        z-index: 3;
        transform: rotateZ(45deg);
    }

    .table-code-lab .custom-checkbox input[type="checkbox"]:checked + label:before {
        border-color: #03A9F4;
        background: #03A9F4;
    }

    .table-code-lab .custom-checkbox input[type="checkbox"]:checked + label:after {
        border-color: #fff;
    }

    .table-code-lab .custom-checkbox input[type="checkbox"]:disabled + label:before {
        color: #b8b8b8;
        cursor: auto;
        box-shadow: none;
        background: #ddd;
    }


    /* Modal styles */
    .modal-code-lab .modal .modal-dialog {
        max-width: 400px;
    }

    .modal-code-lab .modal .modal-header, .modal .modal-body, .modal .modal-footer {
        padding: 20px 30px;
    }

    .modal-code-lab .modal .modal-content {
        border-radius: 3px;
        font-size: 14px;
    }

    .modal-code-lab .modal .modal-footer {
        background: #ecf0f1;
        border-radius: 0 0 3px 3px;
    }

    .modal-code-lab .modal .modal-title {
        display: inline-block;
    }

    .modal-code-lab .modal .form-control {
        border-radius: 2px;
        box-shadow: none;
        border-color: #dddddd;
    }

    .modal-code-lab .modal textarea.form-control {
        resize: vertical;
    }

    .modal-code-lab .modal .btn {
        border-radius: 2px;
        min-width: 100px;
    }

    .modal-code-lab .modal form label {
        font-weight: normal;
    }

    .modal-code-lab .show {
        display: block;
        animation: slide_in_show 0.5s
    }

    .modal-code-lab .form-group {
        margin-bottom: 1rem;
    }

    .modal-code-lab .form-group label {
        display: inline-block;
        margin-bottom: 0.5rem;
    }

    @keyframes slide_in_show {
        0% {
            opacity: 0;
            transform: translate(0, -50px);
        }

        100% {
            opacity: 1;
            transform: translate(0, 0px);
        }
    }
</style>



