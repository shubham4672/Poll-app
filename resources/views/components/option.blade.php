@foreach ($this->options as $key => $option)
    <h6 class="mt-2">Option {{ $key + 1 }}</h6>
    <div class="option mt-1 flex gap-5">
        <input type="text" wire:model.live.debounce.300ms="options.{{ $key }}" />
        <button class="btn border-2" wire:click.prevent="deleteOption({{ $key }})">Remove</button>
    </div>
    <span class="text-red-500">
        @error('options.' . $key)
            {{ $message }}
        @enderror
    </span>
@endforeach