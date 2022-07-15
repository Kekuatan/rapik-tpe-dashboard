<div>
    <div class="card-body mb-5">
        <h5 class="card-title">Grid Rows</h5>
        <form class="" data-bitwarden-watching="1">
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="exampleEmail11" class="mb-2">Dari Tanggal</label>
                        <input placeholder="MM/DD/YYYY" class="form-control" type="date" wire:model='input.startDate'>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="examplePassword11" class="mb-2">Sampai Tanggal</label>
                        <input class="form-control" type="date" wire:model='input.endDate'>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label for="exampleEmail11" class="mb-2">Lokasi</label>
                        <select class="form-control" name="country" wire:model="input.location" class="border shadow p-2 bg-white">
                            @foreach($locations as $key => $item)
                                <option value={{ $key}}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label class="inline-block w-32 font-bold mb-2">Kendaraan:</label>
                        <select class="form-control" name="country" wire:model="input.vehicle" class="border shadow p-2 bg-white">
                            @foreach($vehicles as $key => $item)
                                <option value={{ $key}}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label class="inline-block w-32 font-bold mb-2">Bank:</label>
                        <select class="form-control" name="country" wire:model="input.bank" class="border shadow p-2 bg-white">
                            @foreach($banks as $key => $item)
                                <option value={{ $key}}>{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">

                </div>
                <div class="md-6">
                    <button wire:click.prevent='changeQuery'  class="btn btn-primary btn-block"> submit</button>
{{--                    <a href="/home/report/export?{{http_build_query($input)}}" target="_blank" class="btn btn-primary btn-block"> test</a>--}}
{{--                    <a href="https://www.WordPress.com" target="_blank">WordPress Homepage</a>--}}
{{--                    <button wire:click='downloadPdf' class="btn btn-primary btn-block"> export pdf</button>--}}
                </div>


            </div>

        </form>
    </div>
</div>
