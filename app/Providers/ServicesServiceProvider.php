<?php

namespace App\Providers;


use App\Services\Category\CategoryService;
use App\Services\Category\ICategoryService;
use App\Services\Company\CompanyService;
use App\Services\Company\ICompanyService;
use App\Services\Customer\CustomerService;
use App\Services\Customer\ICustomerService;
use App\Services\Employee\EmployeeService;
use App\Services\Employee\IEmployeeService;
use App\Services\Home\HomeService;
use App\Services\Home\IHomeService;

use App\Services\Masquee\IMasqueeService;
use App\Services\Masquee\MasqueeService;
use App\Services\Order\IOrderService;
use App\Services\Order\OrderService;
use App\Services\Period\IPeriodService;
use App\Services\Period\PeriodService;

use App\Services\Product\IProductService;
use App\Services\Product\ProductService;
use Illuminate\Support\ServiceProvider;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        //customer
        $this->app->bind(
            ICategoryService::class,
            CategoryService::class
        );
        $this->app->bind(
            IProductService::class,
            ProductService::class
        );
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
