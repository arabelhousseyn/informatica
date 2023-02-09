<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Traits\GenerateUsername;
use App\Traits\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids, GenerateUsername;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    protected static function booted()
    {
        parent::booted();

        static::creating(function (self $model) {
            $model->username = $model->generateUsername("$model->full_name " . Str::random(5));
        });

        static::deleting(function (self $model) {
            if ($model->orders()->count() > 0) {
                $model->orders()->update(['user_id' => null]);
            }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'username',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
     * Relations
     *
     */

    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class, 'user_id', 'id');
    }

    public function wishlist(): HasMany
    {
        return $this->hasMany(Wishlist::class, 'user_id', 'id');
    }

    public function cartProducts(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'carts',
            'user_id',
            'product_id'
        )->using(Cart::class)->withPivot(['id', 'quantity']);
    }

    public function wishlistProducts(): BelongsToMany
    {
        return $this->belongsToMany(
            Product::class,
            'wishlists',
            'user_id',
            'product_id'
        )->using(Wishlist::class)->withPivot(['id']);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    /*
     * Relations
     *
     */

    public function getTotalCartPrice(): float
    {
        $total = 0;
        $cart = $this->cart()->with('product')->get()->toArray();
        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['product']['price'];
        }
        return $total;
    }

    /*
     * Functions
     *
     */

    public function getWishlistFromProduct(string $product_id): Wishlist|null
    {
        return Wishlist::where('user_id', '=', Auth::id())
            ->where('product_id', '=', $product_id)->first();
    }

    public function getCartFromProduct(string $product_id): Cart|null
    {
        return Cart::where('user_id', '=', Auth::id())
            ->where('product_id', '=', $product_id)->first();
    }
}
