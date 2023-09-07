<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Carbon;
use App\Models\Move;
use App\Models\Type;
use App\Models\Pokemon;
use DB;
use PDF;
use Storage;
use Auth;

class ApiCtrl extends Controller
{
    public function moveActions (Request $req)
    {
        $match = array(
            'id' => $req->id,
        );

        $data = $req->all();

        $create = Move::updateOrCreate($match,$data);

        return json_encode($create); 
    }

    public function moveDelete (Request $req)
    {
        
       $delete = Move::find($req->id)->delete();

       return json_encode($delete); 
    }

    public function moveEdit (Request $req)
    {
        $data = Move::find($req->id);

        return $data;
    }


    public function fetchMoves ()
    {
        $data = Move::all();

        return json_encode($data); 
    }

// Types
    public function typeActions (Request $req)
    {
        $match = array(
            'id' => $req->id,
        );

        $data = $req->all();

        $create = Type::updateOrCreate($match,$data);

        return json_encode($create); 
    }

    public function typeDelete (Request $req)
    {
       $delete = Type::find($req->id)->delete();

       return json_encode($delete); 
    }

    public function typeEdit (Request $req)
    {
        $data = Type::find($req->id);

        return $data;
    }


    public function fetchTypes ()
    {
        $data = Type::all();

        return json_encode($data); 
    }

//Pokemon

    public function pokemonActions (Request $req)
    {        
        $match = array(
            'id' => $req->id
        );

        $data = $req->all();

        $create = Pokemon::updateOrCreate($match,$data);

        return json_encode($create); 
    }

    public function pokemonDelete (Request $req)
    {
    $delete = Pokemon::find($req->id)->delete();

    return json_encode($delete); 
    }

    public function pokemonEdit (Request $req)
    {
        $data = Pokemon::find($req->id);

        return $data;
    }


    public function fetchPokemon ()
    {
        $data = Pokemon::select('pokemon.*','types.name as type_name','moves.name as move_name')
        ->leftJoin('types', 'pokemon.type_id','=','types.id')
        ->leftJoin('moves', 'pokemon.moveset_id','=','moves.id')
        ->get();

        return json_encode($data); 
    }

}
