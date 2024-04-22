<?php

namespace App\Livewire;

use Livewire\Component;

class Todos extends Component
{
    public $todo  = '';
    public $todos = [];

    public function mount()
    {
        $this->todos = [ 'Take out trash', 'Do dishes', 'Do laundry' ];

        $this->todo = '';
    }

    public function updatedTodo($value)
    {
        $this->todo = strtoupper($value);

        //$this->validate();
    }

    /*public function updated($property, $value)
    {
        $this->$property = strtoupper($value);
    }*/

    public function add()
    {
        $this->todos[] = $this->todo;
        //$this->todo    = '';
        $this->reset('todo');
    }

    public function render()
    {
        return view('livewire.todos');
    }
}
