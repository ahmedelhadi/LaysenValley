<?php

namespace App\Http\Livewire\Front\Order;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;

class Index extends Component
{
    public $name, $company, $email, $mobile, $body ;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function SendOrder(){

        $data = $this->validate([
            'name' => 'required|string|max:100',
            'company' => 'required|string|max:100',
            'email' => 'required|email',
            'mobile' => 'required|string|max:10',
            'body' => 'required|string|max:10000',
        ]);

        $order = Order::create($data);

        //sent notification to admin staff
        $admins = User::role(['Admin','Employee'])->get(); 

        if (!empty($admins)) {
            foreach ($admins as $admin) {
                $admin->notify((new \App\Notifications\Order\Created($order)));
            }
        }

        $status = 'success';
        $message = __('file.sent_success');
        $this->dispatchBrowserEvent('new-action', ['status' => $status, 'message' => $message]);
        $this->emit('refresh');


    }


    public function render()
    {
        return view('livewire.front.order.index');
    }
}
