<?php

namespace AlessioFerretti\LivewireTicket\Livewire;

use AlessioFerretti\LivewireTicket\Models\LtTicket;
use Illuminate\Http\Request;
use Livewire\Component;


class LivewireTicketNew extends Component
{
    public LtTicket $lt;
    public bool $done=false;

    protected $rules = [
        'lt.subject' => 'required|string|min:6',
        'lt.description' => 'required|string|max:500',
        'lt.user_id'=>'required'
    ];
    public function mount($user_id){
        $this->lt=new LtTicket();
        $this->lt->user_id=$user_id;
    }

    public function save(){
        $this->validate();

        $this->lt->save();
        $this->done=true;
    }

    public function render()
    {

        return view('alessio-ferretti::livewire.livewire-ticket-form');
    }


}
