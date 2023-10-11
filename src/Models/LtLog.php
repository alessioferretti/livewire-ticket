<?php

namespace AlessioFerretti\LivewireTicket\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LtLog extends Model
{
    use HasFactory;

    protected $fillable=['user_id','lt_state_id','log','lt_ticket_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
