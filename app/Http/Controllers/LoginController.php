<?php

namespace App\Http\Controllers;

use Redirect;
use Cookie;
use Input;
use Auth;
use DB;
use App\MEMB_INFO;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
 

    public function index(){
        if(Cookie::get('loggedd')):
            return Redirect::action('PanelController@index')->with('message-info','Você já está logado.');
        
        else:

            return view('layout.includes.login');

        endif;
    }

    public function create(Request $dates)
    {

        if(Cookie::get('loggedd')):
            return Redirect::action('PanelController@index')->with('message-info','Você já está logado.');
        
        else:


        $login = $dates->login;
        $password = $dates->password;
        
         $captcha = $dates->input('g-recaptcha-response');

            if ($captcha):

                $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeG5Q8TAAAAANGi1WeNbpfh9ZGylPwFjo9wWCF7&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);

                    if($response['success'] == false):

                        return redirect('/login')->with('message-false', 'O Captcha foi preenchido incorretamente!');
                        exit;

                    else:

                     $user = MEMB_INFO::where('memb___id', $login);

                        if ($user->first()):
                                    

                            $auth = DB::table('MEMB_INFO')->where('memb___id', $login)->where('memb__pwd',$password)->first();

                            if($auth):
                                Cookie::queue('loggedd', ['login' => $login,'email' => $auth->addr_info], '3444');

                                return redirect('/painel')->with('message-true', 'Usuário logado com sucesso!');
                            else:
                                return redirect('/login')->withInput(Input::except('password'))->with('message-false', 'Senha incorreta!');
                            endif;
                            
                        else:
                               return redirect('/login')->withInput(Input::except('password'))->with('message-false', 'Usuário incorreto ou inexistente!');
                        endif;

                    endif;

             else:
                return redirect('/login')->with('message-false', 'O Captcha foi preenchido incorretamente!');
            endif;

        endif;
    }

    public function logout(){
        $cookie = Cookie::forget('loggedd');

        return  redirect('/login')->withCookie($cookie)->withInput(Input::except('password'))->with('message-true', 'Deslogado com sucesso!');

    }

}
