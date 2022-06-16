<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookRequest extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'guest_name', 'guest_contact', 'checkin_date', 'checkout_date', 'days', 'child', 'adult'];
}
