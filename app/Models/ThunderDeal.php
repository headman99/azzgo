<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $titolo
 * @property string $datainizio
 * @property string $datafine
 * @property boolean $isactive
 * @property Offer[] $offers
 */
class ThunderDeal extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'thunderdeals';

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
    protected $fillable = ['title', 'startdate', 'enddate', 'isactive'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function offers()
    {
        return $this->hasMany('App\Models\Offer', 'thunderid');
    }

    public function getStartDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function setStartDateAttribute($value) {
        $this->attributes['startdate'] = \DateTime::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getEndDateAttribute($value) {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function setEndDateAttribute($value) {
        $this->attributes['enddate'] = \DateTime::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
}
