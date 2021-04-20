<?php

namespace App\Models;

use App\Models\Lot;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Painting extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'medium',
        'framed',
        'width',
        'height',
        'lot_id'
    ];

    public function lot()
    {
        return $this->belongsTo(Lot::class, 'lot_id', 'id');
    }

    public function fillItem(array $array)
    {
        $this->id = $array['id'];
        $this->medium = $array['medium'];
        $this->framed = $array['framed'];
        $this->width = $array['width'];
        $this->height = $array['height'];
        $this->lot_id = $array['lot_id'];
    }
}
