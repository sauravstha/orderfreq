<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    //
    protected $table = "roles";
    
    public $timestamps = false;

    /**
     * @return Get the users of the role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'userroles', 'role_id', 'user_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
}
