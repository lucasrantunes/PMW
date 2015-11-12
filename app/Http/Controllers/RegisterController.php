<?php

namespace App\Http\Controllers;

use Redirect;
use Cookie;
use App\Register;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{


  
    public function index()
    {
        

        if(Cookie::get('loggedd')):
            return Redirect::action('PanelController@index')->with('message-info','Você já está cadastrado.');
        
        else:

           return view('layout.includes.register');

        endif;

    }

 
    public function create(Request $request)
    {

            $captcha = $request->input('g-recaptcha-response');

            if ($captcha):

                $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeG5Q8TAAAAANGi1WeNbpfh9ZGylPwFjo9wWCF7&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);

                    if($response['success'] == false):

                        return redirect('/cadastro')->with('message-false', 'O Captcha foi preenchido incorretamente!');
                        exit;

                    else:

                        $this->validate($request, [

                        'login' => 'required|min:4|max:10|unique:MEMB_INFO,memb___id',
                        'password' => 'required|min:4|max:10|confirmed',
                        'password_confirmation' => 'required|min:4|max:10',
                        'email' => 'required|unique:MEMB_INFO,addr_info',
                        'ID' => 'required|min:7|max:7'
                        
                        ]);

                        $data = array( 'memb___id' => $request->input('login'),
                        'password' => $request->input('password'),
                        'memb_name' => 'name',
                        'sno__numb' =>'1',
                        'post_code' => '1234',
                        'addr_info' => $request->input('email'),
                        'addr_deta' => '1234567',
                        'tel__numb' => '12345678',
                        'phon_numb' => '1234567',
                        'fpas_ques' => 0,
                        'fpas_answ' => 0,
                        'job__code' => 1,
                        'mail_chek' => 0,
                        'bloc_code' => 0,
                        'ctl1_code' => 1,
                        'creditos' => 0,
                        'vip' => 0 );

                        Register::create( $data );

                        return redirect('/cadastro')->with('message-true', 'Usuário registrado com sucesso!');
                        exit;

                    endif;

            else:
                return redirect('/cadastro')->with('message-false', 'O Captcha foi preenchido incorretamente!');
                exit;
            endif;
    }
    
 
}
