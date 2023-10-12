<?php

namespace AlessioFerretti\LivewireTicket\Models;

use App\Models\User;
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
    public function lt_logs(){
        return $this->hasMany(LtLog::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function assigned_to(){
        return $this->belongsTo(User::class,'assigned_to');
    }
}
