<div>
    <form>
        <div class="modal-header">
            <h4 class="modal-title">Edit Employee</h4>
            <button type="button"
                    wire:click="$emit('closeModal')"
                    class="close" data-dismiss="modal" aria-hidden="true">&times;
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Name </label>
                <input
                    wire:model="name"
                    type="text" class="form-control"
                    required>
            </div>
            <div class="form-group">
                <label>Code</label>
                <select
                    wire:model="code"
                    class="form-select "
                    aria-label=". example">
                    <option selected>Open this select menu</option>
                    <option value="{{\App\Enum\AreaPositionEnum::PINTU_MASUK}}">Pintu Masuk</option>
                    <option value="{{\App\Enum\AreaPositionEnum::PINTU_KELUAR}}">Pintu Keluar</option>
                </select>
            </div>
            <div class="form-group">
                <label>Vehicle type</label>
                <select
                    wire:model="vehicle_type"
                    class="form-select " aria-label=". example">
                    <option selected>Open this select menu</option>
                    <option value="{{\App\Enum\VehicleEnum::FOUR_WHEELS}}">Roda 4</option>
                    <option value="{{\App\Enum\VehicleEnum::TWO_WHEELS}}">Roda 2</option>
                </select>
            </div>

            <div class="form-group">
                <label>Address</label>
                <textarea
                    wire:model="address"
                    class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label>Address name</label>
                <input
                    wire:model="address_name"
                    type="text" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default"
                   wire:click="$emit('closeModal')"
                   data-dismiss="modal" value="Cancel">
            <input wire:click.prevent="submit"
                   type="submit"
                   class="btn btn-success" value="Add">
        </div>
    </form>
</div>
