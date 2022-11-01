<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $type
 * @property string $action
 * @property Customnotification[] $customnotifications
 */
class NotificationAction extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notificationactions';

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
    protected $fillable = ['type', 'action'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customnotifications()
    {
        return $this->hasMany('App\Models\CustomNotification', 'actionid');
    }
}
