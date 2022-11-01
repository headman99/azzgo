<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $pricelistid
 * @property string $startdate
 * @property string $endate
 * @property float $price
 * @property string $created_at
 * @property string $updated_at
 * @property PriceList $pricelist
 */
class Offer extends Model
{

    use Uuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'offers';

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
    protected $fillable = ['id', 'pricelistid', 'startdate', 'endate', 'price', 'isactive', 'percent','created_at', 'updated_at', 'thunderid'];

    public function getStartdateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function setStartdateAttribute($value) {
        $this->attributes['startdate'] = \DateTime::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getEndateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function setEndateAttribute($value) {
        $this->attributes['endate'] = \DateTime::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pricelist()
    {
        return $this->belongsTo('App\Models\PriceList', 'pricelistid');
    }
}
