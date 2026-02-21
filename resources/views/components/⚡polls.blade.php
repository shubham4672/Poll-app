<?php

use Livewire\Component;
use App\Models\Poll;
use App\Models\Option;
use Livewire\Attributes\Computed;

new class extends Component {
    #[Computed()]
    public $polls = [];

    public function mount()
    {
        $this->polls = Poll::all();
    }

    public function vote($optionId)
    {
        $option = Option::findOrFail($optionId);
        $option->increment('vote_count', 1);
    }
};
?>

<div class="footer">
    <h6 class="font-semibold text-2xl mt-3">Available Polls</h6>
    <div class="mt-2 font-thin">
        {{ count($polls) === 0 ? "No polls available..." : "" }}
    </div>
    <x-polls></x-polls>
</div>