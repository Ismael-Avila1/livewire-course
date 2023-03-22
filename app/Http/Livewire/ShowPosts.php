<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class ShowPosts extends Component
{

    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public $post;
    public $open_edit = false;
    public $image;
    public $identifier;

    public $rules = [
        'post.title' => 'required',
        'post.content' => 'required'
    ];

    protected $listeners = ['render' => 'render']; // al escuhcar el método 'render', se va a ejecutar el método 'render' ($this->render)

    public function mount()
    {
        $this->identifier = rand();
        $this->post = new Post();
    }

    public function render()
    {
        $posts = Post::where('title', 'like', '%' . $this->search . '%')
                        ->orwhere('content', 'like', '%' . $this->search . '%')
                        ->orderBy($this->sort, $this->direction)
                        ->get();

        return view('livewire.show-posts', compact('posts'));
    }


    public function order($sort) {
        if($this->sort == $sort) {
            $this->direction = (($this->direction == 'desc') ? 'asc' : 'desc');
        }
        else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function edit(Post $post)
    {
        $this->post = $post;

        $this->open_edit = true;
    }

    public function update()
    {
        $this->validate();

        if($this->image) {
            Storage::delete($this->post->image);
            $this->post->image = $this->image->store('posts');
        }

        $this->post->save();

        $this->reset(['open_edit', 'image']);
        $this->identifier = rand();
        $this->emit('alert', 'El Post se actualizó satisfactoriamente!');
    }

}
