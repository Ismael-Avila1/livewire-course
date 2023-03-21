<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Component;
use Livewire\WithFileUploads;


class EditPost extends Component
{
    use WithFileUploads;

    public $open = false;
    public $post, $image, $identifier;

    public $rules = [
        'post.title' => 'required',
        'post.content' => 'required'
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->identifier = rand();
    }

    public function save()
    {
        $this->validate();

        $this->post->save();

        $this->reset(['open']);
        $this->emit('render');
        $this->emit('alert', 'El Post se actualizó satisfactoriamente!');
    }


    public function render()
    {
        return view('livewire.edit-post');
    }
}
