<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carving extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'material',
        'weight',
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
        $this->material = $array['material'];
        $this->weight = $array['weight'];
        $this->width = $array['width'];
        $this->height = $array['height'];
        $this->lot_id = $array['lot_id'];
    }
}
