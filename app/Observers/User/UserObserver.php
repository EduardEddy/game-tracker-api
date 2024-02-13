<?php

namespace App\Observers\User;

use App\Models\User;
use Carbon\Carbon;

class UserObserver
{
    public function creating(User $user)
    {
        $user->password = bcrypt($user->password);
        $user->code_confirm = !$user->is_admin ? null : rand(10,999999);
        $user->email_verified_at = !$user->is_admin ? Carbon::now()->format('Y-m-d H:i:s') : null;
    }
}
