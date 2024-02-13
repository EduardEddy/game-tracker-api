<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Collaborator\StoreRequest;
use App\Http\Requests\Collaborator\UpdateRequest;

use App\Services\User\CollaboratorService;
use App\Models\User;
use App\Models\FCMToken;
use App\Models\CollaboratorPark;

use Auth;

class UserCollaboratorController extends Controller
{
    protected $collaboratorService;
    public function __construct()
    {
        $this->collaboratorService = new CollaboratorService;
    }

    public function index()
    {
        return view('users.index',['collaborators'=>$this->collaboratorService->index()]);
    }

    public function store(StoreRequest $request)
    {
        $this->collaboratorService->create($request->validated(), Auth::user()->parks->first()->id);
        return redirect()->route('collaborators');
    }

    public function show(User $collaborator)
    {
        return view('users.update', ['collaborator'=>$collaborator]);
    }

    public function update(User $collaborator, UpdateRequest $request)
    {
        return $request->validated();
        return view('users.update', ['collaborator'=>$collaborator]);
    }

    public function destroy(User $collaborator)
    {
        FCMToken::where('user_id',$collaborator->id)->delete();
        CollaboratorPark::where('user_id',$collaborator->id)->delete();
        $collaborator->delete();
        return response()->json([
            'data'=>null,
            'message'=>'success'
        ], 200);
        //return redirect()->route('collaborators');
    }
}
