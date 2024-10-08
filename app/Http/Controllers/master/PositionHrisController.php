<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\PositionHris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class PositionHrisController extends Controller
{
    public function position_browse()
    {
        $positionHris =  PositionHris::all();

        $data['title'] = 'Master Position';
        return view('master/positionHris', $data, compact('positionHris'));
    }

    public function position_add(Request $request)
    {
        $request->validate([
            'position_name' => 'required'
        ]);

        $positionHris = new PositionHris([
            'position_name' => $request->position_name
        ]);
        $positionHris->save();        
        return redirect()->route('positionHris')->with('success', 'Tambah data sukses!');
    } 

}
