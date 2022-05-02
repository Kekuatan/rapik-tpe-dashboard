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
            <p> Are you sure to delete this?</p>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default"
                   wire:click="$emit('closeModal')"
                   data-dismiss="modal" value="Cancel">
            <input wire:click.prevent="submit"
                   type="submit"
                   class="btn btn-success" value="Delete">
        </div>
    </form>
</div>
