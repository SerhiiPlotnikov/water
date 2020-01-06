<?php
declare(strict_types=1);

namespace App\DataTransformer;

use App\User;

class UserItem
{
    public $id;
    public $name;
    public $age;
    public $weight;
    public $waterAmount;

    public function __construct(User $user)
    {
        $this->id = $user->id;
        $this->name = "{$user->first_name} {$user->last_name}";
        $this->age = $user->age;
        $this->weight = $user->weight;
        $this->waterAmount = round($user->water_amount,3);
    }


}