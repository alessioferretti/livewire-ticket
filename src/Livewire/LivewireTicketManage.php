<?php

namespace AlessioFerretti\LivewireTicket\Livewire;

use AlessioFerretti\LivewireTicket\Models\LtTicket;
use Illuminate\Http\Request;
use Livewire\Component;


class LivewireTicketManage extends Component
{
    public LtTicket $lt;

    public bool $done=false;
    public bool $editing=true;
    protected $rules = [
        'lt.subject' => 'required|string|min:6',
        'lt.description' => 'required|string|max:500',
        'lt.user_id'=>'required',
        'lt.lt_type_id'=>'required',
        'lt.lt_state_id'=>'required'
    ];
    public function mount($lt_ticket_id,$user_id){
        $this->lt=LtTicket::find($lt_ticket_id);

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
