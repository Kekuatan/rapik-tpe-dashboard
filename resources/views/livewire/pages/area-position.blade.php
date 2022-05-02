<div>
    <div class="table-code-lab">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Area positions</b></h2>
                        </div>
                        <div class="col-sm-6">

                            <a
                                wire:click.prevent = "openModal('forms.area-position.create-form')" href="#" class="btn btn-success" >
                                <i class="material-icons">&#xE147;</i>
                                <span>Add New Area</span>
                            </a>

                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>No </th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Address</th>
                        <th>Address Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
{{--                    <p>{{count($tableData)}}</p>--}}
                    @foreach($areaPositions as $areaPosition)
                    <tr>
                        <td>{{ ($areaPositions ->currentpage()-1) * $areaPositions ->perpage() + $loop->index + 1 }}</td>
                        <td>{{$areaPosition->name}}</td>
                        <td>{{$areaPosition->code }}</td>
                        <td>{{$areaPosition->address}}</td>
                        <td>{{$areaPosition->address_name}}</td>
                        <td>
                            <a href="#" wire:click.prevent = "openModal('forms.area-position.edit-form',{{$areaPosition}})" class="edit" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
                            <a href="#" wire:click.prevent="openModal('forms.area-position.delete-form',{{$areaPosition}})" class="delete" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="clearfix">
                    <p class="hint-text"> Showing <b>{{$showingPage}}</b>  out of <b> {{$totalPage}}</b> entries</p>
                    <ul class="pagination">
                        {{ $areaPositions->links() }}
{{--                        @foreach($areaPositions->links as $link)--}}
{{--                        <li class="page-item {{blank($link->url) ? 'disable' : '' }}disabled"><a href="{{$link->url}}">{{$link->label}}</a></li>--}}
{{--                        <li class="page-item"><a href="#" class="page-link">1</a></li>--}}
{{--                        <li class="page-item"><a href="#" class="page-link">2</a></li>--}}
{{--                        <li class="page-item active"><a href="#" class="page-link">3</a></li>--}}
{{--                        <li class="page-item"><a href="#" class="page-link">4</a></li>--}}
{{--                        <li class="page-item"><a href="#" class="page-link">5</a></li>--}}
{{--                        <li class="page-item"><a href="#" class="page-link">Next</a></li>--}}
{{--                        @endforeach--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @livewire('components.modal-component')
</div>


<style>
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
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-code-lab .table-title {
        padding-bottom: 15px;
        background: #435d7d;
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
    .table-code-lab table.table tr th:last-child {
        width: 100px;
    }
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
    .table-code-lab .custom-checkbox label:before{
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

    .modal-code-lab .show{
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
            transform: translate(0,-50px);
        }

        100% {
            opacity: 1;
            transform: translate(0,0px);
        }
    }
</style>



