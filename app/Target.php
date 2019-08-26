<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'target', 'completion_date', 'state', 'delete_flg', 'user_id'
    ];
}
