<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;


class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $category_id;

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function update($fields)
    {
        $this->validateOnly($fields,
        [
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
    }

    public function storeCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);

        if($this->category_id)
        {
            $category = new SubCategory();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->category_id = $this->category_id;
            $category->save();
        }
        else{
            $category = new Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $category->save();
        }
        session()->flash('message', 'Category has been created successfully!');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}
