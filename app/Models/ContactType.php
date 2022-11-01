<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $typecode
 * @property string $description
 * @property int $order
 * @property Contact[] $contacts
 */
class ContactType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contactypes';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'typecode';

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
    protected $fillable = ['description', 'order'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany('App\Models\Contact', 'typecode', 'typecode');
    }
}
