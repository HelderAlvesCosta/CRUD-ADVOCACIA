<?php

namespace App\Model\Painel;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['task', 'description','done'];
}
