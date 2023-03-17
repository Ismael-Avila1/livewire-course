<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

use function GuzzleHttp\Promise\all;

class CreatePost extends Component
{
    public $open = false;

    public $title, $content;

    protected $rules = [
        'title' => 'required|max:30',
        'content' => 'required|min:100'
    ];

    public function render()
    {
        return view('livewire.create-post');
    }

    public function updated($porpertyName) {
        $this->validateOnly($porpertyName);
    }

    public function save() {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->reset(['open', 'title', 'content']);

        $this->emitTo('show-post', 'render');
        $this->emit('alert', 'El Post se creó satisfactoriamente!');
    }
}
