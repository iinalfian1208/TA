<?php

namespace App\Providers;

// use Illuminate\View\View;
use App\Models\DataSaran;
use App\Models\NotifikasiM;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        Paginator::useBootstrap();

        View::composer('admin.template', function ($view) {
            $notif = NotifikasiM::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
            $view->with('notif', $notif);
            // $saran = DataSaran::;
        });
    }

}
