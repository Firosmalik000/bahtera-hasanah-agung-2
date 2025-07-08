<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    use HasFactory;

    protected $table = 'why_us';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'desc',
        'icon',
        'color'
    ];
}
