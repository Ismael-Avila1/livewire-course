<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;


class CreatePost extends Component
{
    public $open = true;

    public $title, $content;

    public function render()
    {
        return view('livewire.create-post');
    }

    public function save() {
        Post::create([
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->emit('render');
    }
}
