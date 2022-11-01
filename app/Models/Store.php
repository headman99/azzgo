<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property integer $iduser
 * @property string $categorycode
 * @property string $businessname
 * @property string $vatnumber
 * @property string $nickname
 * @property string $latitude
 * @property string $longitude
 * @property string $created_at
 * @property string $updated_at
 * @property Storecategory $storecategory
 * @property User $user
 * @property Follow[] $follows
 * @property Product[] $products
 */
class Store extends Model
{
    use Uuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stores';

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
    protected $fillable = ['id', 'iduser', 'categorycode', 'businessname', 'vatnumber', 'nickname', 'latitude', 'longitude', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function storecategory()
    {
        return $this->belongsTo('App\Models\StoreCategory', 'categorycode', 'code');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'iduser');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function follows()
    {
        return $this->hasMany('App\Models\Follow', 'storeid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'storeid');
    }
}
