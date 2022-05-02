<div>
    <div class="modal-code-lab">
        <div wire:key="{{now()}}" class="modal fade {{ $modalStatus ? 'show' : ''}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    @if($form == 'forms.default-form')
                        @livewire($form)
                    @else
                        @livewire($form)
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

