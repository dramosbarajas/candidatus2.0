<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $fillable = [
        'provinceid',
        'townid',
        'codetown',
        'townname'];
}
