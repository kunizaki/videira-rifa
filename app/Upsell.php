<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upsell extends Model
{
    protected $table = 'upsells';
    protected $fillable = [
        'qtdNumeros',
        'desconto',
        'valor',
        'product_id'
    ];
}
