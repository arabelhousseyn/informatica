<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Collection;

class CategoryCollection extends Collection
{

    public function toTree(): Collection
    {

        return $this->map(function ($category) {
            $category->children->map(function ($children) {
                return $children->setRelation('children', $children->descendants->toTree())->unsetRelation('descendants');
            });
            return $category;
        });
    }
}
