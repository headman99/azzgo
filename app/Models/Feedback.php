<?php

namespace App\Models;

use App\Enums\FeedbackTypesEnum;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $code
 * @property string $from
 * @property string $fromtype
 * @property string $to
 * @property string $totype
 * @property float $value
 */
class Feedback extends Model
{
    use Uuids;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feedbacks';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'code';

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
    protected $fillable = ['reviewer', 'reviewertype', 'reviewed', 'reviewedtype', 'value'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function fromuser()
    {
        return $this->belongsTo('App\Models\User', 'reviewer', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function touser()
    {
        return $this->belongsTo('App\Models\User', 'reviewed', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function toproduct()
    {
        return $this->belongsTo('App\Models\Product', 'reviewed', 'id');
    }
}
