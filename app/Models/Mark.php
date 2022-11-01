<?php

namespace App\Models;

use App\Enums\UserMarkTypeEnum;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $from
 * @property string $fromtype
 * @property integer $to
 * @property string $totype
 * @property string $comment
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $attachments
 */
class Mark extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'marks';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['marker', 'markertype', 'marked', 'markedtype', 'comment', 'status', 'created_at', 'updated_at', 'attachments'];

    public function markeruser()
    {
        return $this->belongsTo('App\Models\User', 'marker', 'id');
    }

    public function markeduser()
    {
        return $this->belongsTo('App\Models\User', 'marked', 'id');
    }

}
