<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

	trait FilterByTeam{
		public static function boot() {
			parent::boot();

			$currentTeamId = auth()->user()->active_team_id;

			self::creating(function ($model) use ($currentTeamId) {
					$model->team_id = $currentTeamId;
			});

			self::addGlobalScope(function(Builder $builder) use ($currentTeamId) {
					$builder->where('team_id', $currentTeamId);
			});
		}
	}
