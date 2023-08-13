<?php

namespace App\Http\Livewire\Admin\Color;

use Livewire\Component;
use App\Models\Color;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
   
    public function render()
    {
        $colors  = Color::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.color.index',['colors'=>$colors]);
    }
}
