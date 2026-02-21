@foreach ($this->polls as $key => $poll)
    <div class="mt-4">
        <h6 class="font-medium">{{ $poll->title }}</h6>
        <div>
            @foreach ($poll->options as $option)
                <div class="mt-2 mb-3">
                    <button class="btn" wire:click="vote({{ $option->id }})">Vote</button>
                    {{ $option->description }} ({{ $option->vote_count }})
                </div>
                @endforeach
        </div>
        <hr>
    </div>
@endforeach