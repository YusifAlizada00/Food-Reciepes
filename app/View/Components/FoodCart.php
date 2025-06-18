<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class FoodCart extends Component
{

    public function render()
    {
        return view('components.food-cart');
    }
}
