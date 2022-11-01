<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $notificationid
 * @property integer $userid
 * @property integer $actionid
 * @property string $type
 * @property string $title
 * @property string $description
 * @property boolean $isread
 * @property string $created_at
 * @property string $updated_at
 * @property Notificationaction $notificationaction
 * @property User $user
 */
class CustomNotification extends Model
{
    use Uuids;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customnotifications';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'notificationid';

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
    protected $fillable = ['userid', 'actionid', 'type', 'title', 'description', 'extrafield', 'isread', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function notificationaction()
    {
        return $this->belongsTo('App\Models\NotificationAction', 'actionid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'userid');
    }
}
