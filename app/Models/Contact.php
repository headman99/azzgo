<?php

namespace App\Models;

use App\Models\Concerns\UsesUuid;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property integer $iduser
 * @property string $typecode
 * @property string $value
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Contactype $contactype
 */
class Contact extends Model
{
    use Uuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contacts';

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
    protected $fillable = ['iduser', 'typecode', 'value', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'iduser');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contactype()
    {
        return $this->belongsTo('App\Models\Contactype', 'typecode', 'typecode');
    }

}
