<?php
declare(strict_types=1);

namespace App\Services;

use App\DataTransformer\UserCollection;
use App\DataTransformer\UserItem;
use App\Exceptions\UserNotFoundException;
use App\Repositories\UserRepository;

class UserService
{
    private $userRepository;

    private const YOUNG_WATER_RATE_ML_PER_KG = 25;
    private const ADULT_WATER_RATE_ML_PER_KG = 35;
    private const SENIOR_WATER_RATE_ML_PER_KG = 30;
    private const YOUNG_AGE_RAGE = ['start' => 0, 'end' => 20];
    private const ADULT_AGE_RAGE = ['start' => 21, 'end' => 55];
    private const ML = 1000;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function allUsers(): UserCollection
    {
        $users = $this->userRepository->all();
        return new UserCollection($users);
    }

    public function getUser(int $id): UserItem
    {
        $user = $this->userRepository->getById($id);
        if (!$user)
            throw new UserNotFoundException("user not found with id={$id}");
        return new UserItem($user);
    }

    public function removeUser(int $id): void
    {
        $this->userRepository->deleteById($id);
    }

    public function createUser(string $firstName, string $lastName, int $age, float $weight): UserItem
    {
        $waterAmount = $this->calculateWaterAmount($age, $weight);
        $book = $this->userRepository->createUser($firstName, $lastName, $age, $weight, $waterAmount);
        return new UserItem($book);
    }

    public function editUser(string $firstName, string $lastName, int $age, float $weight, int $id): UserItem
    {
        $waterAmount = $this->calculateWaterAmount($age, $weight);
        $user = $this->userRepository->update($firstName, $lastName, $age, $weight, $waterAmount, $id);
        return new UserItem($user);
    }

    private function calculateWaterAmount(int $age, float $weight): float
    {
        switch ($age) {
            case  $age >= self::YOUNG_AGE_RAGE['start'] && $age <= self::YOUNG_AGE_RAGE['end']:
                return $weight * (self::YOUNG_WATER_RATE_ML_PER_KG / self::ML);
            case  $age >= self::ADULT_AGE_RAGE['start'] && $age <= self::ADULT_AGE_RAGE['end']:
                return $weight * (self::ADULT_WATER_RATE_ML_PER_KG / self::ML);
            default:
                return $weight * (self::SENIOR_WATER_RATE_ML_PER_KG / self::ML);
        }
    }
}