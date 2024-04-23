<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 * @property int id
 * @property int customer_id
 * @property int numero
 * @property float total
 * @property string fecha
 */

class Document extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'numero',
        'total',
        'fecha'
    ];

    /**
     * The customer function returns the relationship between the current model and the Customer model
     * using the BelongsTo relationship.
     * 
     * @return BelongsTo A BelongsTo relationship is being returned. This method defines a relationship
     * where the current model belongs to a Customer model using the 'customer_id' foreign key.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * The lines() function returns a HasMany relationship for DocumentLine objects related to the
     * current object by 'doc_id'.
     * 
     * @return HasMany The `lines()` function is returning a relationship definition for a "HasMany"
     * relationship. It specifies that the current model has many instances of the `DocumentLine`
     * model, with the foreign key `doc_id` being used for the relationship.
     */
    public function lines(): HasMany
    {
        return $this->hasMany(DocumentLine::class, 'doc_id');
    }
}
