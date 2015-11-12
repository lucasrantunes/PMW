<?php

namespace App\Http\Controllers;

use DB;
use App\MEMB_INFO;
use Cookie;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Cookie::get('loggedd')):
            $dates = array('login' => Cookie::get('loggedd')['login'], 'email' => Cookie::get('loggedd')['email']);
            return view('layout.includes.panel')->with('loggedd',$dates);
        else:

            return view('layout.includes.login');

        endif;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $this->validate($request, [
        'password' => 'required|max:10',
        'passwordNovo' => 'required|confirmed|min:4|max:10|different:password',
        ]);

        $passwordNovo = $request->passwordNovo;
        $password = $request->password;
        $login = Cookie::get('loggedd')['login'];

         $user = MEMB_INFO::where('memb___id', $login);

                        if ($user->first()):
                                    

                            $auth = DB::table('MEMB_INFO')->where('memb___id', $login)->where('password',$password)->first();

                            if($auth):
                                
                                DB::table('MEMB_INFO')->where('memb___id', $login)->where('password',$password)->update(['password' => $passwordNovo]);

                                return redirect('/painel')->with('message-true', 'Senha alterada com sucesso!');

                            else:
                                return redirect('/login')->withInput(Input::except('password'))->with('message-false', 'Senha incorreta!');
                            endif;
                            
                        else:
                               return redirect('/login')->withInput(Input::except('password'))->with('message-false', 'Logue-se novamente, ocorreu um problema.!');
                        endif;

       
    }

}
