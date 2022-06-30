<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Inventory extends Model
{
    use HasFactory, Searchable;

    protected $table = 'inventory';
    protected $guarded = ['id'];


    public function Bahan()
    {
        return $this->belongsTo(Bahan::class);
    }

    public function Store()
    {
        return $this->belongsTo(Store::class);
    }


    public function searchableAs()
    {
        return 'Inventory';
    }

    public function toSearchableArray()
    {
        $data = Bahan::where('id', $this->bahan_id)->first();

        return [
            'id' => $this->id,
            'nama' => $data['nama']
        ];
    }
}
