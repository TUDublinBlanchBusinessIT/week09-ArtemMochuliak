<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function __construct($type = null)
    {
        parent::__construct();
        $this->setTable("Member");
    }

    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class, 'memberid');
    }

    public $timestamps = false;

    protected $fillable = [
        'firstname', 'surname', 'membertype', 'dateofbirth'
    ];

    protected $hidden = [
        'userid', 'created_at', 'updated_at', 'deleted_at'
    ];

    protected $appends = ['_links'];

        public function getLinksAttribute()
        {
            return [
                ['self' => app()->make('url')->to("api/members/{$this->attributes['id']}")],
                ['bookings' => app()->make('url')->to("api/member/{$this->attributes['id']}/bookings")]
            ];
        }   
}