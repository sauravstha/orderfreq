<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Orderlist;

class Home extends Model
{
    use SoftDeletes;
    
    //
    protected $table = "homes";    
    public $timestamps = false;

    /**
     * @return Get the user of the home.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return Get the order lists of the home.
     */
    public function orderlists()
    {
        return $this->hasMany(Orderlist::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address', 'city', 'district', 'pincode', 'phone', 'user_id', 'status',
    
    ];
}
