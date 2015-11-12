<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    //
     protected $fillable = array( 'memb___id', 'password','memb_name','sno__numb','post_code','addr_info','addr_deta','tel__numb','phon_numb','fpas_ques','fpas_answ','job__code','mail_chek','bloc_code','ctl1_code','creditos','vip');
     protected $table = 'MEMB_INFO';
     public $timestamps = false;
     
}
