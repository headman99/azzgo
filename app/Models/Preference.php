<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property integer $iduser
 * @property string $type
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 * @property string $isImage
 * @property User $user
 */

class Preference extends Model
{
    use Uuids;

    /**
     * @var array
     */
    protected $fillable = ['id','iduser', 'type', 'value','created_at', 'updated_at','isImage'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'preferences';

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'iduser');
    }



}
