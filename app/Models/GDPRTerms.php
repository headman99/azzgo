<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $type
 * @property string $description
 * @property string $title
 */
class GDPRTerms extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'gdprterms';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'type';

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

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['description', 'title'];

}
