<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Carbon;
use App\Models\Type;
use DB;
use PDF;
use Storage;
use Auth;

class TypeCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ( Request $req )
    {
        return view('type.type');
    }

    public function fetchType ( Request $req )
    {
        $data = Type::all();
   
        return view('type.type_body',[
         'data' => $data
          ]);
    }
    
}
