<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogCheck extends Model
{
    protected $fillable = ['name', 'address', 'variant', 'enzim_diastase', 'kadar_air', 'glukosa', 'hidroksi_metilfurfural', 'stok', 'price'];
}
