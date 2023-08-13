<?php

namespace App\Http\Livewire\Admin\Coupen;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Coupen;
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $coupens = Coupen::orderBy('created_at','DESC')->paginate(20);
        return view('livewire.admin.coupen.index',[
            'coupens'=>$coupens
        ]);
    }
}
