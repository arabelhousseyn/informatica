<?php

namespace App\Models;

use App\Support\CategoryCollection;
use App\Traits\HasUuids;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Kalnoy\Nestedset\NestedSet;
use Kalnoy\Nestedset\NodeTrait;
use App\Models\Media;

class Category extends Model
{
    use HasFactory, HasUuids, NodeTrait;

    protected static function booted()
    {
        parent::booted();

        static::deleting(function (self $model) {
            $model->products()->update(['category_id' => null]);
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $appends = ['photo', 'photo_thumb'];

    /*
     * Scopes
     *
     */

    public function scopeOnlyParent(Builder $builder): Builder
    {
        return $builder->where(NestedSet::PARENT_ID, null)->limit(10);
    }

    /*
     * Relations
     *
     */

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function media(): MorphOne
    {
        return $this->morphOne(Media::class, 'model');
    }

    /*
     * Accessors and mutators
     *
     */

    public function getPhotoAttribute(): string
    {
        return $this->media()->first()?->url ?? asset('assets/images/no_image.png');
    }

    public function getPhotoThumbAttribute(): string
    {
        return $this->media()->first()?->url ?? asset('assets/images/no_image.png');
    }


    /*
     * Functions
     *
     */

    public function newCollection(array $models = []): CategoryCollection
    {
        return new CategoryCollection($models);
    }
}
