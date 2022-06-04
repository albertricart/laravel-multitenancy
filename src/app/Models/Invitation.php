<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Invitation extends Model
{
    use HasFactory;

    protected $table = 'invitations';

    protected $fillable = [
        'team_id',
        'user_id',
        'token',
        'expiry_date',
    ];

    // protected $appends = ['url'];

    // public function getUrlAttribute(){
    //     return $this['url'] = env('APP_URL') . '/invitation/' . $this->token;
    // }

    protected static function boot() {
        parent::boot();

        $currentTeamId = auth()->user()->active_team_id;

        self::creating(function ($model) use ($currentTeamId) {
            $model->team_id = $currentTeamId;
            $model->token = Str::random(40);
        });

        self::addGlobalScope(function(Builder $builder) use ($currentTeamId) {
            $builder->where('team_id', $currentTeamId);
        });
    }

    /**
     * Get the user that owns the Invitation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sender()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the team that owns the Invitation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
