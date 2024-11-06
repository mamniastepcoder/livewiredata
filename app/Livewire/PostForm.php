<?php
namespace App\Livewire;
use Livewire\Component;
use App\Models\Post;

class PostForm extends Component
{
    public $title;
    public $content;
    public $posts; 
    
    public function mount()
    {
        $this->fetchPosts();
    }
    public function submit()
    {
        $this->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);
        Post::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);
        
        $this->title = '';
        $this->content = '';
        session()->flash('message', 'Post created successfully!');
        $this->fetchPosts();
    }
    public function fetchPosts()
    {
        $this->posts = Post::all();
    }
    public function render()
    {
        return view('livewire.post-form');
    }
}