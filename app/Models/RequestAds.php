<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $requestcode
 * @property string $publisherid
 * @property string $productid
 * @property integer $userid
 * @property string $status
 * @property int $quantity
 * @property float $price
 * @property string $appointmentdate
 * @property string $appointmentime
 * @property Product $product
 * @property Store $store
 * @property User $user
 */
class RequestAds extends Model
{
    use Uuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'requestads';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'requestcode';

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

    public $timestamps = true;


    /**
     * @var array
     */
    protected $fillable = ['publisherid', 'productid', 'userid', 'status', 'quantity', 'price', 'appointmentdate', 'appointmentime', 'shippingaddress', 'groupcode'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'productid', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store', 'publisherid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'userid');
    }

    public function getAppointmentDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function setAppointmentDateAttribute($value) {
        $this->attributes['appointmentdate'] = \DateTime::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getAppointmenTimeAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('H:i');
    }

    public function setAppointmenTimeAttribute($value) {
        $this->attributes['appointmentime'] = \DateTime::createFromFormat('H:i', $value);
    }

}
