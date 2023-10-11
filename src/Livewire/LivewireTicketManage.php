<?php

namespace AlessioFerretti\LivewireTicket\Livewire;

use AlessioFerretti\LivewireTicket\Models\LtComment;
use AlessioFerretti\LivewireTicket\Models\LtLog;
use AlessioFerretti\LivewireTicket\Models\LtTicket;
use Illuminate\Http\Request;
use Livewire\Component;


class LivewireTicketManage extends Component
{
    public LtTicket $lt;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public string $newComment;
    public int $user_id;

    public bool $done=false;
    public bool $editing=true;
    protected $rules = [
        'lt.subject' => 'required|string|min:6',
        'lt.description' => 'required|string|max:500',
        'lt.lt_type_id'=>'required',
        'lt.lt_state_id'=>'required'
    ];
    public function mount($lt_ticket_id,$user_id){
        $this->lt=LtTicket::find($lt_ticket_id);
        $this->user_id=$user_id;

    }

    public function save(){
        $this->validate();

        $this->lt->save();
        LtLog::create(['user_id'=>$this->user_id,'lt_ticket_id'=>$this->lt->id,'lt_state_id'=>$this->lt->lt_state_id]);
        $this->done=true;
    }

    public function continueEditing(){
        $this->done=false;
    }
    public function addComment(){
        if($this->newComment !='') {
            $c=new LtComment();
            $c->user_id=$this->user_id;
            $c->comment=$this->newComment;
            $c->lt_ticket_id=$this->lt->id;
            $c->save();
            $this->emit('refreshComponent');
        }
    }

    public function render()
    {

        return view('alessio-ferretti::livewire.livewire-ticket-form');
    }


}
