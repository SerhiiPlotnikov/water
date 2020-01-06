<?php
declare(strict_types=1);

namespace App\DataTransformer;

use Illuminate\Support\Collection;

class UserCollection
{
    private $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    public function getCollection(): Collection
    {
        return $this->collection->map(function ($item) {
            return new UserItem($item);
        });
    }
}

