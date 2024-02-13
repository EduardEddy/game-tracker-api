<?php

namespace App\Services\User;

use App\Helpers\HandleErrorResponse;
use App\Repositories\User\CollaboratorRepository;

use Auth;

class CollaboratorService 
{
    protected $handleError;
    protected $collaboratorRepository;
    public function __construct()
    {
        $this->handleError = new HandleErrorResponse();
        $this->collaboratorRepository = new CollaboratorRepository();
    }

    public function create($data, $parkId)
    {
        try {
            $data['is_admin'] = false;
            $data['phone'] = 0;
            return $this->collaboratorRepository->create($data, $parkId);
        } catch (\Throwable $th) {
            \Log::critical("on CollaboratorService::create ".$th->getMessage());
        }
    }

    public function index()
    {
        try {
            $parkId = Auth::user()->parks->first()->id;
            return $this->collaboratorRepository->index($parkId);
        } catch (\Throwable $th) {
            \Log::critical("on CollaboratorService::index ".$th->getMessage());
        }
    }
}
