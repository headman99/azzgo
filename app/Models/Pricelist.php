<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $productid
 * @property float $price
 * @property string $startdate
 * @property string $endate
 * @property string $created_at
 * @property string $updated_at
 * @property Product $product
 * @property Offer[] $offers
 */
class Pricelist extends Model
{
    use Uuids, HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pricelists';

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
    protected $fillable = ['productid', 'price', 'startdate', 'endate', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'productid');
    }

    /**
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
    public function offers()
    {
        return $this->hasone('App\Models\Offer', 'pricelistid')->whereNull('thunderid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function thunderdealoffer()
    {
        return $this->hasone('App\Models\Offer', 'pricelistid')->whereNotNull('thunderid');
    }

    /**
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
    public function activeoffer()
    {
        return $this->hasOne('App\Models\Offer', 'pricelistid')->where('isactive', 1)->where('startdate', '<=', Carbon::now())->where('endate', '>', Carbon::now());
    }
}
