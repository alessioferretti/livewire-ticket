<?php

namespace AlessioFerretti\LivewireTicket\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LtComment extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
