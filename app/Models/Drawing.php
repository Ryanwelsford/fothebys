<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drawing extends Model
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
