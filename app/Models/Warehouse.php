<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $productid
 * @property int $quantity
 * @property string $created_at
 * @property string $updated_at
 * @property Product $product
 */
class Warehouse extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'warehouses';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['productid', 'quantity', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'productid');
    }
}
