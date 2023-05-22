<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TimeSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'weekday',
        'start_time',
        'end_time',
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function members() : BelongsToMany {
        return $this->belongsToMany(Member::class);
    }
}
