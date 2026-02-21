@foreach ($this->polls as $key => $poll)
    <div class="mt-4">
        <h6 class="font-medium">{{ $poll->title }}</h6>
        <div>
            @foreach ($poll->options as $option)
                <div class="mt-2">
                    <button class="btn">Vote</button>
                    {{ $option->description }} ({{ 0 }})
                </div>
            @endforeach
        </div>
    </div>
@endforeach