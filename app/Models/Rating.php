<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'map_id', 'rating'];

    // Relationships
    public function user()
    {
        return $this->belongsTo(Customer::class);
    }

    public function map()
    {
        return $this->belongsTo(MapsData::class);
    }
}
