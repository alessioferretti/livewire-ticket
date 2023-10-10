<?php

namespace AlessioFerretti\LivewireTicket\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LtTicket extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'subject',
        'description',
        'user_id',
        'lt_type_id',
        'lt_state_id'
    ];

    public function lt_comments(){
        return $this->hasMany(LtComment::class);
    }
}
