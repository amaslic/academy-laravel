<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    public function affiliates()
    {
    	return $this->BelongsToMany('\App\Affiliate','invites','friend_id','affiliate_id')->withPivot('coupon');
    }
}
