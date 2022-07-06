<?php

namespace App\View\Components;

use Illuminate\View\Component;

class home extends Component
{
  
    public $res;
   
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($results)
    {
     $this->res=$results;   
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home')->with('result',$this->res);
    }
}
