<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

/**
 * @property integer $id
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property int $_lft
 * @property int $_rgt
 * @property int $parent_id
 * @property Product[] $products
 */
class ProductCategory extends Model
{
    use NodeTrait;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'productcategories';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['description', 'created_at', 'updated_at', '_lft', '_rgt', 'parent_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product', 'categoryid');
    }
}
