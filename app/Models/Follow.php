<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $storeid
 * @property integer $userid
 * @property string $created_at
 * @property string $updated_at
 * @property Store $store
 * @property User $user
 */
class Follow extends Model
{
    use Uuids;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'follows';

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
    protected $fillable = ['storeid', 'userid', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store', 'storeid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'userid');
    }
}
