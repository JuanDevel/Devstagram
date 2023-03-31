<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isLiked;
    public $likes;

    public function mount($post)
    {
        $this->isLiked = $post->checklike(auth()->user());
        $this->likes = $post->likes->count();
    }

    public function like()
    {
        if( $this->post->checklike(auth()->user())){
            $this->post->likes()->where('user_id', auth()->user()->id)->delete();
            $this->likes--;
            $this->isLiked = false;
        }else{
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->likes;
            $this->isLiked = true;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
