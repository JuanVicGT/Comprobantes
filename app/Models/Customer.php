<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int id
 * @property string nombre
 * @property string dpi
 */
class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'dpi'
    ];

    /**
     * This PHP function defines a relationship where a model has many documents.
     * 
     * @return HasMany A relationship method named "documents" is being returned, which defines a
     * one-to-many relationship between the current model and the "Document" model.
     */
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'customer_id');
    }
}
