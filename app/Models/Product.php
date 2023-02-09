<?php

namespace App\Models;

use App\States\Product\ProductState;
use App\Traits\HasUuids;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Spatie\ModelStates\HasStates;

class Product extends Model
{
    use HasFactory, HasUuids, HasStates;

    protected static function booted()
    {
        parent::booted();

        static::creating(function (self $model) {
            $exists = Product::where('can_be_banner', '=', true)->exists();

            if (!$exists) {
                $model->can_be_banner = true;
            }
        });

        static::deleting(function (self $model) {
            if ($model->orderItems()->count() > 0) {
                $model->orderItems()->update(['product_id' => null]);
            }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'admin_id',
        'category_id',
        'price',
        'old_price',
        'published_at',
        'discount',
        'status',
        'can_be_banner',
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
    protected $casts = [
        'published_at' => 'datetime',
        'status' => ProductState::class,
        'can_be_banner' => 'boolean',
    ];

    protected $appends = ['photo', 'photo_thumb', 'photos', 'wishlist', 'discount_value'];

    /*
     * Scopes
     *
     */

    public function scopeBanner(Builder $builder): Builder
    {
        return $builder->where('can_be_banner', true);
    }

    public function scopeNewProducts(Builder $builder): Builder
    {
        return $builder->latest('created_at')->limit(50);
    }

    public function scopeSearch(Builder $builder, string $key, string|null $category_id): Builder
    {
        return (blank($category_id)) ? $builder->where('name', 'like', "%" . $key . "%")
            ->orWhere('description', 'like', "%" . $key . "%") :
            $builder->where('category_id', '=', $category_id)
                ->where('name', 'like', "%" . $key . "%")
                ->orWhere('description', 'like', "%" . $key . "%");
    }

    /*
     * Accessors and mutators
     *
     */

    public function getPhotosAttribute(): Collection
    {
        return $this->media()->get();
    }

    public function getPhotoAttribute(): string
    {
        return $this->media()->first()?->url ?? asset('assets/images/no_image.png');
    }

    public function getPhotoThumbAttribute(): string
    {
        return $this->media()->first()?->url ?? asset('assets/images/no_image.png');
    }

    public function getDiscountAttribute(): int|string
    {
        return ($this->attributes['discount'] !== 0) ? $this->attributes['discount'] . " %" : 0;
    }

    public function getDiscountValueAttribute(): int
    {
        return $this->attributes['discount'];
    }

    public function getWishlistAttribute(): bool
    {
        return (Auth::user()) ? Auth::user()->wishlistProducts()->where('product_id', '=', $this->id)->exists() : false;
    }

    /*
     * Relations
     *
     */

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'product_id', 'id');
    }

    public function media(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }

    /*
     * Functions
     *
     */

    public function applyDiscount(float $discount): void
    {
        $oldPrice = $this->price;
        $newPrice = $oldPrice - ($oldPrice * $discount);

        $this->update(['price' => $newPrice, 'old_price' => $oldPrice, 'discount' => $discount * 100]);
    }

    public function resetPrice(): void
    {
        $this->update(['old_price' => null, 'discount' => 0]);
    }
}
