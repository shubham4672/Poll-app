<?php

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Poll;

new class extends Component {
    #[Validate('required|min:3|max:255', as: 'Poll title')]
    public $title = '';
    
    #[Validate([
        'options' => 'required|max:10',
        'options.*' => 'required|min:2|max:15'
    ], [], [],
        [
            'options.*.min' => 'Option must have atleast 2 characters',
            'options.*.required' => 'Option field cannot be empty',
        ]
    )]
    public $options = ['First'];

    public function addOption()
    {
        $this->options[] = '';
    }

    public function deleteOption($key)
    {
        unset($this->options[$key]);
        $this->options = array_values($this->options);
    }

    public function createPoll()
    {
        $this->validate();
        $poll = Poll::create([
            'title' => $this->title,
        ]);

        foreach ($this->options as $option) {
            $poll->options()->create([
                'description' => $option,
            ]);
        }
        $this->reset(['title', 'options']);
        $this->dispatch("update-listing");
    }
};
?>

<div>
    <h1 class="font-medium text-2xl">Create poll</h1>
    <form wire:submit.prevent="createPoll">
        <label class="mt-3">POLL TITLE</label>
        <input type="text" wire:model.live.debounce.250ms="title" class="mt-2 border-2" />
        <div class="text-red-500">
            @error('title')
                {{ $message }}
            @enderror
        </div>
        <div class="mt-3">
            <button class="btn" wire:click.prevent="addOption">Add Option</button>
        </div>
        <div class="options mt-4">
            <x-option></x-option>
        </div>
        <button type="submit" class="btn border mt-4 font-medium">Create Poll</button>
    </form>
</div>