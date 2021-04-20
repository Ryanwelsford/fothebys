<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected $fillable = [
        "url",
        "lot_id"
    ];

    public function lot()
    {
        return $this->belongsTo(Lot::class, 'lot_id', 'id');
    }

    public function fillItem($url)
    {
        $this->url = $url;
    }

    public function updateLot($lot_id)
    {
        $this->lot_id = $lot_id;
    }
}
