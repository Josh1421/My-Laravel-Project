<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckInList extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'guest_name', 'guest_contact', 'checkin_date', 'checkout_date', 'days', 'sub_total', 'down_payment', 'total_balance'];
}
