<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

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
        'post.tilte' => 'requiered',
        'post.content' => 'requiered'
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

}
