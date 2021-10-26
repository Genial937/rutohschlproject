<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Curriculum extends Component
{
    public $steps = 1;
     
    public function increment(){
        $this->steps++;
    }

    public function render()
    {
        return view('livewire.curriculum');
    }
}
