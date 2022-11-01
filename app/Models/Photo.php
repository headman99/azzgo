<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $extidtype
 * @property string $extid
 * @property string $path
 * @property boolean $ismain
 * @property string $created_at
 * @property string $updated_at
 */
class Photo extends Model
{
    use  Uuids;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'photos';

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
    protected $fillable = ['extidtype', 'extid', 'path', 'ismain', 'created_at', 'updated_at'];

}
