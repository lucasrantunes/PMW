<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Character;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RankingController extends Controller
{
   

    public function index(){
    return view('layout/includes/ranking');
    }

    public $tables = array('reset' => 'resets','pk' => 'PkCount');

    public function ranking($type){
        $allowed = array('reset','pk');
        if(in_array($type, $allowed)):
            return $this->ranking_return($type);
        else:
            return view('layout/includes/ranking');
        endif;
    }


    public function ranking_return($type){
        return view('layout.includes.ranking',['ranking' => $type,
        'dates' => Character::orderBy($this->tables[$type], 'DESC')->get(),
        'id' => 1 ]);
    }

    
}
