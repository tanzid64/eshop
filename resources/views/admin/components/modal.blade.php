@props([
    'id' => 'modal',
    'title' => 'Modal Title',
    'size' => '', // '' | 'modal-lg' | 'modal-sm'
])

<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog {{ $size }}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                @isset($footer)
                    {{ $footer }}
                @else
                    <button type="button" class="btn btn-primary">Save changes</button>
                @endisset
            </div>
        </div>
    </div>
</div>
