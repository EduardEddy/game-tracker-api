<?php

namespace App\Services\Guest;
use App\Repositories\Guest\GuestRepository;

class GuestService
{
    private $guestRepository;
    public function __construct()
    {
        $this->guestRepository = new GuestRepository();
    }

    public function store($data) 
    {
        try {
            return $this->guestRepository->store($data);
        } catch (\Throwable $th) {
            \Log::critical('ERROR store Guest services: '.$th->getMessage().' Line: '.$th->getLine());
        }
    }
}
