<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    public function friends()
    {
    	return $this->BelongsToMany('\App\Friend','invites','affiliate_id','friend_id')->withPivot('coupon');
    }
}
