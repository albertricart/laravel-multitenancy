<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function create(){
        $invitation = Invitation::create([
            'expiry_date' => Carbon::now()->addDays(14),
        ]);
        auth()->user()->invites()->save($invitation);

        return view('invitations.invitation', compact('invitation'));
    }

    public function accept(Invitation $invitation){
        
        // Check if user is authenticated
        if (auth()->check()) {
            // Check user doesnt belong to team already
            if(auth()->user()->teams()->wherePivot('team_id', $invitation->team_id)->exists()){
                $invitation->delete();
                return redirect('/');
            }

            // Add authenticated user to team users list
            auth()->user()->teams()->attach($invitation->team_id);
            // Set active team
            auth()->user()->update(['active_team_id' => $invitation->team_id]);
            return to_route('dashboard');
        }

        return to_route('register');     

    }
}
