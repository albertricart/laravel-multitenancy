<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Exception;
use Illuminate\Http\Request;

class TaskController extends Controller
{
	public function create(){
		return view('tasks.create');
	}

	public function store(StoreTaskRequest $request){
		try {
			auth()->user()->tasks()->create($request->validated());
			return to_route('dashboard');
		}catch (Exception) {
			return abort(401);
		}
	}
}
