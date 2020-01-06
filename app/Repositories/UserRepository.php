<?php
declare(strict_types=1);

namespace App\Repositories;

use App\User;
use Illuminate\Support\Collection;

class UserRepository
{
    public function all(): Collection
    {
        return User::all();
    }

    public function getById(int $id): ?User
    {
        return User::find($id);
    }

    public function deleteById($id): void
    {
        User::destroy($id);
    }

    public function createUser(
        string $firstName,
        string $lastName,
        int $age,
        float $weight,
        float $waterAmount
    ): User{
        return User::create([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'age' => $age,
            'weight' => $weight,
            'water_amount' => $waterAmount
        ]);
    }

    public function update(
        string $firstName,
        string $lastName,
        int $age,
        float $weight,
        float $waterAmount,
        int $id
    ): User{
        $user = User::find($id);

        $user->first_name = $firstName;
        $user->last_name = $lastName;
        $user->age = $age;
        $user->weight = $weight;
        $user->water_amount = $waterAmount;
        $user->save();
        return $user;
    }
}