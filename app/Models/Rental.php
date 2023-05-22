<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_cas',
        'date',
        'count',
        'rental_item_id',
    ];

    public function rental_item() : BelongsTo {
        return $this->belongsTo(RentalItem::class);
    }
}
