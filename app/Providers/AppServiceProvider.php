<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $setting = Setting::firstOr(function (){
            return Setting::create([
                "name" => 'Zoka Store',
                "description" => 'description',
                "address" => 'address 1',
                "phone" => "1110347546",
                "email" => "mostafamahmoud111115@gmail.com",
                "logo" => "https://mir-s3-cdn-cf.behance.net/projects/404/b6ecc069649119.Y3JvcCwxOTE3LDE1MDAsNDIsMA.jpg",
                "favicon" => "https://mir-s3-cdn-cf.behance.net/projects/404/b6ecc069649119.Y3JvcCwxOTE3LDE1MDAsNDIsMA.jpg",
                "facebook" => "https://www.facebook.com",
            ]);
        });
        view()->share('setting',$setting);
    }
}
