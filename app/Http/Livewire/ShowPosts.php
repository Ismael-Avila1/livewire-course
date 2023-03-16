<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class ShowPosts extends Component
{

    public $search;
    public $sort = 'id';
    public $direction = 'desc';

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
}
