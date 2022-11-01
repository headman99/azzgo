<?php

namespace App\Models;

use App\Enums\FeedbackTypesEnum;
use App\Enums\PhotoType;
use App\Enums\UserMarkTypeEnum;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens, HasRoles, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'surname',
        'email_verified_at',
        'fiscalcode',
        'isactive',
        'isvalid',
        'isbanned',
        'consent1',
        'consent2',
        'consent3',
        'consent4',
        'palyerid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function store()
    {
        return $this->hasOne('App\Models\Store', 'iduser', 'id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function preferences()
    {
        return $this->hasOne('App\Models\Preference', 'iduser','id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts()
    {
        return $this->hasMany('App\Models\Contact', 'iduser', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    private function photos()
    {
        return $this->hasMany('App\Models\Photo', 'extid', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profilephoto()
    {
        return $this->photos()->where('extidtype','=', 'U')->where('ismain', '=', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function follows()
    {
        return $this->hasMany('App\Models\Follow', 'userid');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    private function publisherRequests()
    {
        return $this->hasMany('App\Models\Request', 'publisherid', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    private function userRequests()
    {
        return $this->hasMany('App\Models\Request', 'userid', 'id');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

 /*
    public function mark(){
        $this->belongsTo('App\Models\Mark', 'id', 'marker');
    }
*/

 //servono marked e markers

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function markercustomer()
    {
       return $this->hasMany('App\Models\Mark', 'marker', 'id')->where('markertype','=', UserMarkTypeEnum::CUSTOMER);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function markedcustomer()
    {
        return $this->hasMany('App\Models\Mark', 'marked', 'id')->where('markedtype','=', UserMarkTypeEnum::CUSTOMER);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function markerpublisher()
   {
       return $this->hasMany('App\Models\Mark', 'marker', 'id')->where('markertype','=', UserMarkTypeEnum::PUBLISHER);
   }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function markedpublisher()
    {
        return $this->hasMany('App\Models\Mark', 'marked', 'id')->where('markedtype','=', UserMarkTypeEnum::PUBLISHER);
    }

    /* FEEDBACKS */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fromcustomer()
    {
        return $this->hasMany('App\Models\Feedback', 'reviewer', 'id')->where('reviewertype','=', FeedbackTypesEnum::CUSTOMER);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tocustomer()
    {
        return $this->hasMany('App\Models\Feedback', 'reviewed', 'id')->where('reviewedtype','=', FeedbackTypesEnum::CUSTOMER);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function frompublisher()
    {
        return $this->hasMany('App\Models\Feedback', 'reviewer', 'id')->where('reviewertype','=', FeedbackTypesEnum::PUBLISHER);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function topublisher()
    {
        return $this->hasMany('App\Models\Feedback', 'reviewed', 'id')->where('reviewedtype','=', FeedbackTypesEnum::PUBLISHER);
    }

}
