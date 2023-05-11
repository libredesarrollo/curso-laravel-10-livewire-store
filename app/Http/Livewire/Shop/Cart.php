<?php


namespace App\Http\Livewire\Shop;


use App\Models\Post;
use App\Models\ShoppingCart;
use Livewire\Component;
use Symfony\Component\HttpFoundation\Session\Session;


class Cart extends Component
{
    // list , add
    public $type = "list";

    protected $listeners = ['itemAdd' => 'itemCRUD','itemDelete' => 'itemCRUD','itemChange' => 'itemCRUD'];
    public $total = 0;
    public $post;
    public $cart;

    public function mount($post, $type = "list")
    {
        $this->post = $post;
        $this->type = $type;


        $session = new Session();

        // $session->set('cart',[]);
        
        $this->cart = $session->get('cart',[]);
       //dd($this->cart);
    }

    public function render()
    {
        $this->itemCRUD();
        if ($this->type == "list")
            return view('livewire.shop.cart')->layout("layouts.web");
        return view('livewire.shop.cart-add')->layout("layouts.web");
    }

    public function itemCRUD()
    {
        if(auth()->check())
            $this->total = ShoppingCart::where('user_id', auth()->id())->sum("count");
    }

}
