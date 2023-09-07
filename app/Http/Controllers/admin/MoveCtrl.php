<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Carbon;
use App\Models\Move;
use DB;
use PDF;
use Storage;
use Auth;

class MoveCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ( Request $req )
    {
        return view('move.move');
    }

    public function fetchMoves ( Request $req )
    {
        $data = Move::all();
   
        return view('move.move_body',[
         'data' => $data
          ]);
    }
    
}
