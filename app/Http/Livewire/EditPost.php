<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class EditPost extends Component
{
    public $open = false;
    public $post;

    public $rules = [
        'post.title' => 'required',
        'post.content' => 'required'
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function save()
    {
        $this->post->save();
    }


    public function render()
    {
        return view('livewire.edit-post');
    }
}
