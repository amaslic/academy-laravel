<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'invites_left', 'thrivecart_affiliate_id'];

    public function friends()
    {
    	return $this->BelongsToMany('\App\Friend','invites','affiliate_id','friend_id')->withPivot('coupon');
    }
}
