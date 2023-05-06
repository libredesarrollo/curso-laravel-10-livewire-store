<?php


namespace App\Http\Livewire\Dashboard\Post;


use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{


    use WithPagination;


    public $confirmingDeletePost;
    public $postToDelete;

    // filters
    public $type;
    public $category_id;
    public $posted;

    public $from;
    public $to;

    // search
    public $search;

    public function render()
    {
        $posts = Post::where("id", ">=", 1);

        if ($this->search)
        $posts->where(function ($query) {
            $query->orWhere("id", 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('title', 'like', '%' . $this->search . '%');
        });

        if ($this->from && $this->to) {
            $posts->whereBetween('date', [ date($this->from), date($this->to) ]);
        }        

        if ($this->type) {
            $posts->where('type', $this->type);
        }
        if ($this->category_id) {
            $posts->where('category_id', $this->category_id);
        }
        if ($this->posted) {
            $posts->where('posted', $this->posted);
        }
    
        $categories = Category::pluck("title", "id");
        
        $posts = $posts->paginate(10);
    
        return view('livewire.dashboard.post.index',compact('posts','categories'));
    }


    public function seletedPostToDelete(Post $post)
    {
        $this->confirmingDeletePost = true;
        $this->postToDelete = $post;
    }


    public function delete()
    {
        $this->emit("deleted");
        $this->confirmingDeletePost = false;
        $this->postToDelete->delete();
    }


}
