<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallbackPicPay extends Model
{
    protected $table = 'gateway_logs';

    protected $fillable = [
    'id',
    'referenceId',
    'authorizationId',
    'created_at',
    'updated_at',
    ];
}
