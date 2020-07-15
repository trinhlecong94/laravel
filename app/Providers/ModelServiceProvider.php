<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Account\AccountRepository;
use App\Repositories\Account\AccountRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Color\ColorRepository;
use App\Repositories\Color\ColorRepositoryInterface;
use App\Repositories\Comment\CommentRepository;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Favorite\FavoriteRepository;
use App\Repositories\Favorite\FavoriteRepositoryInterface;
use App\Repositories\Images\ImagesRepository;
use App\Repositories\Images\ImagesRepositoryInterface;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepository;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Promotion\PromotionRepository;
use App\Repositories\Promotion\PromotionRepositoryInterface;
use App\Repositories\Role\RoleRepository;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\Shipping\ShippingRepository;
use App\Repositories\Shipping\ShippingRepositoryInterface;
use App\Repositories\Size\SizeRepository;
use App\Repositories\Size\SizeRepositoryInterface;

class ModelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AccountRepositoryInterface::class, AccountRepository::class);
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->singleton(ColorRepositoryInterface::class, ColorRepository::class);
        $this->app->singleton(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->singleton(FavoriteRepositoryInterface::class, FavoriteRepository::class);
        $this->app->singleton(ImagesRepositoryInterface::class, ImagesRepository::class);
        $this->app->singleton(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->singleton(OrderDetailRepositoryInterface::class, OrderDetailRepository::class);
        $this->app->singleton(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->singleton(PromotionRepositoryInterface::class, PromotionRepository::class);
        $this->app->singleton(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->singleton(ShippingRepositoryInterface::class, ShippingRepository::class);
        $this->app->singleton(SizeRepositoryInterface::class, SizeRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
