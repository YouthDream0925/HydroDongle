<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminFilter extends ModelFilter
{
    protected $blacklist = ['secretMethod'];
    
    public function name($name)
    {
        return $this->where(function($q) use ($name)
        {
            return $q->where('first_name', 'LIKE', "%$name%")
                ->orWhere('last_name', 'LIKE', "%$name%")
                    ->orWhere('email', 'LIKE', "$name%");
        });
    }

    public function email($email)
    {
        // echo json_encode($email);
        // die();
        return $this->where('email', 'LIKE', "$email%");
    }

    public function mobilePhone($phone)
    {
        return $this->where('mobile_phone', 'LIKE', "$phone%");
    }

    public function setup()
    {
        // $this->onlyShowDeletedForAdmins();
        // $this->activeStatus();
    }

    public function activeStatus()
    {
        $user = Auth::user();
        if(!empty($user->getRoleNames()) && $user->hasExactRoles('SuperAdmin'))
            return $this->orderBy('id','DESC');
        else
            return $this->where('isactivated', '0')
                ->orwhere('datetimeexpired', '<', Carbon::now())
                    ->orderBy('id','DESC');
    }
    // public function onlyShowDeletedForAdmins()
    // {
    //     if(Auth::user()->isAdmin())
    //     {
    //         $this->withTrashed();
    //     }
    // }
    
    public function secretMethod($secretParameter)
    {
        return $this->where('some_column', true);
    }
}