<?php

namespace App\Models;

use App\Enums\FeedbackTypesEnum;
use App\Enums\PhotoType;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property string $id
 * @property string $storeid
 * @property integer $categoryid
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property Productcategory $productcategory
 * @property Store $store
 * @property Favourite[] $favourites
 * @property PriceList[] $pricelists
 * @property Warehouse[] $warehouses
 */
class Product extends Model
{
    use Uuids, HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

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
    protected $fillable = ['storeid', 'categoryid', 'title', 'description', 'ispublished', 'created_at', 'updated_at', 'type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productcategory()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'categoryid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store', 'storeid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favourites()
    {
        return $this->hasMany('App\Models\Favourite', 'productid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pricelist()
    {
        return $this->hasOne('App\Models\Pricelist', 'productid', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function warehouses()
    {
        return $this->hasMany('App\Models\Warehouse', 'productid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Models\Photo', 'extid', 'id')->where('extidtype','=', 'P')->where('ismain', '=' , 0);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    private function mainphotoads()
    {
        return $this->hasMany('App\Models\Photo', 'extid', 'id');
    }

    public function mainphoto()
    {
        return $this->mainphotoads()->where('extidtype','=', 'P')->where('ismain', '=' , 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    private function requests()
    {
        return $this->hasMany('App\Models\Request', 'productid', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feedbacks()
    {
        return $this->hasMany('App\Models\Feedback', 'reviewed', 'id')->where('reviewedtype','=', FeedbackTypesEnum::PRODUCT);
    }

    public function isfavourite($userid)
    {
        return $this->hasOne('App\Models\Favourite', 'productid')->where('userid', $userid)->count();
    }

}
