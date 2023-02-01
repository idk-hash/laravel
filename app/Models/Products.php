<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model{

    public $timestamps = false;

    protected $fillable = [
        'name',
        'category',
        'quantity',
        'unit',
        'date_delivered',
        'due_date',
    ];
}
