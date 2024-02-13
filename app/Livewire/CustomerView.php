<?php

namespace App\Livewire;

use App\Models\Customer as CustomerModel;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Component;

class CustomerView extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $searchKey;
    public $key = 0;
    public $message = "";

    public function fetchData()
    {
        
    }
    public function render()
    {
        if (!$this->searchKey) {
            $list_data = DB::table('customers')
                ->select('customers.*')
                ->latest()
                ->paginate(10);
        } else {
            $list_data = DB::table('customers')
                ->select('customers.*')
                ->where('customers.customer_fname', 'LIKE', '%' . $this->searchKey . '%')
                ->orWhere('customers.customer_sname', 'LIKE', '%' . $this->searchKey . '%')
                ->orWhere('customers.customer_tp', 'LIKE', '%' . $this->searchKey . '%')
                ->orWhere('customers.customer_email', 'LIKE', '%' . $this->searchKey . '%')
                ->latest()
                ->paginate(10);
        }
        $this->fetchData();
        return view('livewire.customer-view',['list_data' => $list_data])->layout('layouts.master');
    }
}
