<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Menu extends Model
{
    protected $table = 'Menus';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function user() {
        return $this->belongsTo('App\User');
    }
}
