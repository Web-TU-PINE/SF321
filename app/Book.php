<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['booknumber','heading','refer','detail','file','speed','fromdpm','todpm','typebook','start','end'];
}
