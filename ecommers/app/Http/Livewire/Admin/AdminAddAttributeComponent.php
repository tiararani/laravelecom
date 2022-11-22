<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ProductAttribute;

class AdminAddAttributeComponent extends Component
{

        public $name;

        public function updateded($fields)
        {
            $this->validateOnly($fields,[
                "name" => "required"
            ]);
        }

        public function storeAttribute()
        {
            $this->validate([
                'name' => "required"
            ]);

            $pattribute = new ProductAttribute();
            $pattribute->name = $this->name;
            $pattribute->save();
            session()->flash('message', 'Attribute has been created succsessfully!');
        }

        public function render()
        {
            return view('livewire.admin.admin-add-attribute-component')->layout('layouts.base');
        }
}
