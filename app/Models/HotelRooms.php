<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRooms extends Model
{
    use HasFactory;

    protected $fillable = ['room_number', 'category_id', 'category', 'price', 'image', 'availability'];
}
