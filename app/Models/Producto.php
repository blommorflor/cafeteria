<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'referencia',
        'categoria_id',
        'peso',
        'precio',
        'stock'
    ];

    protected $dates = ['deleted_at'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}
