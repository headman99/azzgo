<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

/**
 * @property integer $id
 * @property string $code
 * @property string $description
 * @property int $_lft
 * @property int $_rgt
 * @property int $parent_id
 * @property Store[] $stores
 */
class Ateco extends Model
{
    use NodeTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'atecos';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['code', 'description', '_lft', '_rgt', 'parent_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stores()
    {
        return $this->hasMany('App\Models\Store', 'atecocode', 'code');
    }
}
