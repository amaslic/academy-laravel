<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'invites_left',
        'thrivecart_affiliate_id'
    ];

    public function friends()
    {
    	return $this->BelongsToMany('\App\Friend','invites','affiliate_id','friend_id')->withPivot('coupon');
    }

    public function loginNoPass(){
        $data = $this->toArray();
        session_start([
            'cookie_lifetime' => 8640000,
        ]);

        $_SESSION['uid'] = $data['id'];
        $_SESSION['aff_id'] = $data['thrivecart_affiliate_id'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['fname'] = $data['first_name'];
        $_SESSION['lname'] = $data['last_name'];

        setcookie("AUTH_ID", $data['id'], time() + 8640000, "/");
    }
}
