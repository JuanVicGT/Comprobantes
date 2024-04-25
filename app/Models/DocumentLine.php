<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int id
 * @property int doc_id
 * @property float price
 * @property float cantidad
 * @property string codigo
 * @property string descripcion
 */
class DocumentLine extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'doc_id',
        'price',
        'cantidad',
        'codigo',
        'descripcion'
    ];

    /**
     * This PHP function returns a BelongsTo relationship with the Document model using the 'doc_id'
     * foreign key.
     * 
     * @return BelongsTo A BelongsTo relationship is being returned. This method defines a relationship
     * where the current model belongs to another model (Document) based on the 'doc_id' foreign key.
     */
    public function document(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'doc_id');
    }
}
