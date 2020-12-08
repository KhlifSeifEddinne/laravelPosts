<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    // Table Name
    protected $Table = 'posts';
    // Primary key
    public $PrimaryKey = 'id';
    // TimeStamps
    public $TimeStamps = TRUE;

    public function user()
    {
        return $this->belongsTo('App\user');
    }
}
