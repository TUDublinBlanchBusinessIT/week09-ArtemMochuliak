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

    public $timestamps = false;

    protected $fillable = [
        'firstname', 'surname', 'membertype', 'dateofbirth'
    ];

    protected $hidden = [
        'userid', 'created_at', 'updated_at', 'deleted_at'
    ];
}