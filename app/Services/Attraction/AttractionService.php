<?php

namespace App\Services\Attraction;

use App\Models\User;

use App\Repositories\Attraction\AttractionRepository;
use App\Helpers\HandleErrorResponse;
use App\Models\Attraction;

class AttractionService
{
    protected $attractionRepository;
    public function __construct() {
        $this->attractionRepository = new AttractionRepository();
        $this->handleError = new HandleErrorResponse();
    }

    public function index(User $user)
    {
        try {
            if ($user->is_admin) {
                $data = $this->attractionRepository->attractionByAdminUser($user);
            } else {
                $data = $this->attractionRepository->attractionByCollaboratorUser($user);
            }
            return response()->json([
                'message'=>'success',
                'data'=>$data
            ]);
        } catch (\Throwable $th) {
            return $this->handleError->handleError("on AttractionService::index ".$th->getMessage(). ' - Line: ' .$th->getLine());
        }
    }

    public function show(Attraction $attraction)
    {
        try {
            $attraction->prices;
            return response()->json([
    			'message'=>'success',
    			'data'=>$attraction
    		]);
        } catch (\Throwable $th) {
            return $this->handleError->handleError("on AttractionService::show ".$th->getMessage(). ' - Line: ' .$th->getLine());
        }
    }
}
