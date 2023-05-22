<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'role',
        'photo',
    ];

    public function getRouteKeyName()
    {
        return 'phone';
    }

    public function timeSlots() : BelongsToMany {
        return $this->belongsToMany(TimeSlot::class);
    }
}
