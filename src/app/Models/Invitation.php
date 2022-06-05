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

        self::creating(function ($model) {
            $model->team_id = auth()->user()->active_team_id;
            $model->token = Str::random(40);
        });
    }

    /**
     * Get the user that owns the Invitation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the team that owns the Invitation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
