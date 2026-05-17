<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebSettings extends Model
{
    protected $fillable = [
        'website_address',
        'website_phone',
        'website_phone2',
        'website_phone3',
        'website_email',
        'website_email2',
        'website_facebook',
        'website_twitter',
        'website_instagram',
        'website_youtube',
        'website_header_logo',
        'website_favicon',
        'website_copyright_text',
        'currency_sign',
        'bkash_merchant_numb',
        'fb_pixel',
        'is_otp',
        'sender_id',
        'api_key',
        'otp_message',
        'invoice_prefix',
        'gtm_head',
        'gtm_body',
    ];

    public function get_logo()
    {
        return $this->hasOne(Media::class,'id','website_header_logo');
    }

    public function get_fav()
    {
        return $this->hasOne(Media::class,'id','website_favicon');
    }
}
