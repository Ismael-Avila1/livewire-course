<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;

use function GuzzleHttp\Promise\all;

class CreatePost extends Component
{
    use WithFileUploads;

    public $open = false;

    public $title, $content, $image, $identifier;

    protected $rules = [
        'title' => 'required|max:30',
        'content' => 'required|min:100',
        'image' => 'required|image|max:2048'
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

        $image = $this->image->store('posts');

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $image
        ]);

        $this->reset(['open', 'title', 'content', 'image']);
        $this->identifier = rand();

        $this->emit('render');
        $this->emit('alert', 'El Post se creó satisfactoriamente!');
    }

    public function mount() {
        $this->identifier = rand();
    }
}
