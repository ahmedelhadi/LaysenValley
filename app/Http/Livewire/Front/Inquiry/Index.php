<?php

namespace App\Http\Livewire\Front\Inquiry;

use Livewire\Component;
use App\Models\Inquiry;
use App\Models\User;

class Index extends Component
{

    public $fname, $lname, $email, $phone, $body ;

    protected $listeners = [
        'refresh' => '$refresh',
    ];
    public function SendInquiry(){
        $data = $this->validate([
            'fname' => 'required|string|max:100',
            'lname' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|max:10',
            'body' => 'required|string|max:10000',
        ]);

        $inquiry = Inquiry::create($data);

        //sent notification to admin staff
        $admins = User::role(['Admin','Employee'])->get(); 

        if (!empty($admins)) {
            foreach ($admins as $admin) {
                $admin->notify((new \App\Notifications\Inquiry\Created($inquiry)));
            }
        }


        $status = 'success';
        $message = __('file.sent_success');
        $this->dispatchBrowserEvent('new-action', ['status' => $status, 'message' => $message]);


    }


    public function render()
    {
        return view('livewire.front.inquiry.index');
    }
}
