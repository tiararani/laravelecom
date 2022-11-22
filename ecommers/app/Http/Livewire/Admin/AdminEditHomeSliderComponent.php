<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $link;
    public $price;
    public $image;
    public $status;
    public $newimage;
    public $slider_id;

    public function mount($slide_id)
    {
        $slider = HomeSlider::find($slide_id);
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->price = $slider->price;
        $this->link = $slider->link;
        $this->image = $slider->image;
        $this->status = $slider->status;
        $this->slider_id = $slider->id;
    }

    public function updateSlide()
    {
        $slider =  HomeSlider::find($this->slider_id);
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link= $this->link;
        if($this->newimage)
        {
            $imageName = Carbon::now()->timestamp.'-'.$this->image;
            $this->newimage->storeAs('sliders', $imageName);
            $slider->image = $imageName;
        }
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message', 'Slide has been updated successfully!');
    }

    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-edit-home-slider-component', ['sliders'=>$sliders])->layout('layouts.base');
    }
}
