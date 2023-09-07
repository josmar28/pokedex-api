<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Carbon;
use App\Models\Pokemon;
use App\Models\Type;
use App\Models\Move;
use DB;
use PDF;
use Storage;
use Auth;

class PokemonCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ( Request $req )
    {
        $type = Type::all();
        $move = Move::all();

        return view('pokemon.pokemon',[
            'type' => $type,
            'move' => $move
        ]);
    }

    public function fetchType ( Request $req )
    {
        $data = Pokemon::select('pokemon.*','types.name as type_name','moves.name as move_name')
        ->leftJoin('types', 'pokemon.type_id','=','types.id')
        ->leftJoin('moves', 'pokemon.moveset_id','=','moves.id')
        ->get();
        
        return view('pokemon.pokemon_body',[
         'data' => $data
          ]);
    }
}
