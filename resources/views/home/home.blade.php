<x-layout>
    <x-slot name="title">Home</x-slot>
    <section class="home-section">
{{--        <div class="text">Dashboard</div>--}}
{{--        <div class="container">--}}
{{--            <div class="row" style="background-color:white">--}}
{{--                <div class="col">--}}
{{--                    1 of 2--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    2 of 2--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    1 of 3--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    2 of 3--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    3 of 3--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


        <section class="pb-4">
            <div class="bg-white border rounded-5">

                <section class="py-4 px-2">
                    <div class="d-flex justify-content-end mb-4">
                        <div class="form-outline">
                            <input data-mdb-search="" data-mdb-target="#table_1" type="text" id="search_table_1" class="form-control" disabled="true">
                            <label class="form-label" for="search_table_1" style="margin-left: 0px;">Search</label>
                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 48.8px;"></div><div class="form-notch-trailing"></div></div></div>
                        <button class="btn btn-primary btn-sm ms-3" data-mdb-add-entry="" data-mdb-target="#table_1" style="" disabled="true">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <hr>
                    <div class="table-editor edited-table" id="table_1" data-mdb-entries="5" data-mdb-entries-options="[5, 10, 15]">
                        <div class="table-editor__inner table-responsive ps ps--active-x" style="overflow: auto; position: relative;">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th style="cursor: pointer;" scope="col"><i data-mdb-sort="field_0" class="table-editor__sort-icon fas fa-arrow-up"></i> Company</th>
                                    <th style="" scope="col"> Address</th>
                                    <th style="" scope="col"> Employees</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody><tr scope="row" data-mdb-index="-1" class="edited-row"><td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="field_0"><div class="form-outline "><input type="text" class="table-editor__input form-control placeholder-active" value="">

                                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 0px;"></div><div class="form-notch-trailing"></div></div></div></td><td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="field_1"><div class="form-outline "><input type="text" class="table-editor__input form-control placeholder-active" value="">

                                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 0px;"></div><div class="form-notch-trailing"></div></div></div></td><td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="field_2"><div class="form-outline "><input type="text" class="table-editor__input form-control placeholder-active" value="">

                                            <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 0px;"></div><div class="form-notch-trailing"></div></div></div></td><td><button class="me-2 btn btn-lg text-dark save-button"><i class="fa fa-check"></i></button><button class="btn btn-lg text-dark discard-button"><i class="fa fa-ban"></i></button></td></tr>
                                <tr scope="row" data-mdb-index="0"><td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="field_0">Smith &amp; Johnson</td><td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="field_1">Park Lane 2, London</td><td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="field_2">30</td><td><button class="me-2 btn btn-lg text-dark edit-button" disabled=""><i class="far fa-edit"></i></button><button class="btn btn-lg text-dark delete-button disabled"><i class="far fa-trash-alt"></i></button></td></tr>
                                <tr scope="row" data-mdb-index="1"><td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="field_0">P.J. Company</td><td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="field_1">Oak Street 7, Aberdeen</td><td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="field_2">80</td><td><button class="me-2 btn btn-lg text-dark edit-button" disabled=""><i class="far fa-edit"></i></button><button class="btn btn-lg text-dark delete-button disabled"><i class="far fa-trash-alt"></i></button></td></tr>
                                <tr scope="row" data-mdb-index="2"><td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="field_0">Food &amp; Wine</td><td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="field_1">Netherhall Gardens 3, Hampstead</td><td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="field_2">12</td><td><button class="me-2 btn btn-lg text-dark edit-button" disabled=""><i class="far fa-edit"></i></button><button class="btn btn-lg text-dark delete-button disabled"><i class="far fa-trash-alt"></i></button></td></tr>
                                <tr scope="row" data-mdb-index="3"><td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="field_0">IT Service</td><td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="field_1">Warwick Road 14, London</td><td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="field_2">17</td><td><button class="me-2 btn btn-lg text-dark edit-button" disabled=""><i class="far fa-edit"></i></button><button class="btn btn-lg text-dark delete-button disabled"><i class="far fa-trash-alt"></i></button></td></tr>
                                <tr scope="row" data-mdb-index="4"><td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="field_0">A. Jonson Gallery</td><td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="field_1">Oaklands Avenue 2, London</td><td style="min-width: 250px; max-width: 250px" class="" data-mdb-field="field_2">4</td><td><button class="me-2 btn btn-lg text-dark edit-button" disabled=""><i class="far fa-edit"></i></button><button class="btn btn-lg text-dark delete-button disabled"><i class="far fa-trash-alt"></i></button></td></tr></tbody>
                            </table>
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px; width: 698px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 577px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px; height: 351px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>


                        <div class="table-editor__pagination">
                            <div class="table-editor__select-wrapper">
                                <p class="table-editor__select-text">Rows per page:</p>
                                <div id="select-wrapper-158880" class="select-wrapper"><div class="form-outline"><input class="form-control select-input placeholder-active active" type="text" role="listbox" aria-multiselectable="false" aria-disabled="false" aria-haspopup="true" aria-expanded="false" readonly=""><span class="select-arrow"></span><div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 0px;"></div><div class="form-notch-trailing"></div></div></div><select name="entries" class="table-editor__select select select-initialized">
                                        <option value="5" selected="">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                    </select></div>
                            </div>
                            <div class="table-editor__pagination-nav">1 - 6 of 6</div>
                            <div class="table-editor__pagination-buttons">

                                <button data-mdb-ripple-color="dark" class="btn btn-link table-editor__pagination-button table-editor__pagination-left" disabled="true"><i class="fa fa-chevron-left"></i></button>
                                <button data-mdb-ripple-color="dark" class="btn btn-link table-editor__pagination-button table-editor__pagination-right"><i class="fa fa-chevron-right"></i></button>

                            </div>
                        </div>

                    </div>
                </section>



                <div class="p-4 text-center border-top mobile-hidden">
                    <a class="btn btn-link px-3" data-mdb-toggle="modal" role="button" aria-expanded="false" aria-controls="example1" data-ripple-color="hsl(0, 0%, 67%)" data-mdb-target="#apiRestrictedModal" type="button" style="">
                        <i class="fas fa-code me-md-2"></i>
                        <span class="d-none d-md-inline-block">
          Show code
        </span>
                    </a>


                    <a class="btn btn-link px-3 " data-ripple-color="hsl(0, 0%, 67%)">
                        <i class="fas fa-file-code me-md-2 pe-none"></i>
                        <span class="d-none d-md-inline-block export-to-snippet pe-none">
            Edit in sandbox
          </span>
                    </a>

                </div>


            </div>
        </section>

    </section>
</x-layout>
