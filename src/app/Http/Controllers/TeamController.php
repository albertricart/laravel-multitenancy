<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function change_current_team($hash){
        $team = auth()->user()->teams()->where('hash', $hash)->firstOrFail();

        auth()->user()->update(['active_team_id' => $team->id]);

        return to_route('dashboard');
    }
}
