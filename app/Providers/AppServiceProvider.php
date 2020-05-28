<?php

namespace guiaceliaca\Providers;

use guiaceliaca\Blog;
use guiaceliaca\Comment;
use Jenssegers\Agent\Agent;
use guiaceliaca\Commerce;
use guiaceliaca\Message;
use guiaceliaca\User;
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
        view::composer([
            'web.parts._menu',
            'web.index',
            'web.parts.adminClient.profile._accountCommerce'
        ],
            function ($view) {
                $agent = new Agent();
                $device = $agent->isPhone();

                $view->with('device', $device);
            });

        view::composer('web.parts.commerce._asideCommerce', function ($view) {
            $randCommerces = Commerce::with(['user'])
                ->where('about', '!=', NULL)
                ->inRandomOrder()
                ->take(2)
                ->get();

            $view->with([
                'randCommerces' => $randCommerces,
            ]);
        });

        view::composer([
            'web.parts.adminClient.profile._asideProfile',
            'web.parts.adminClient.profile._accountCommerce'
        ],
            function ($view) {
                $user = User::where('id', Auth::user()->id)
                    ->first();

                if ($user->type == 'OWNER') {
                    $commerce = Commerce::where('user_id', $user->id)
                        ->first();

                    $view->with([
                        'commerce' => $commerce,
                        'user' => $user
                    ]);
                } else {
                    $view->with([
                        'user' => $user
                    ]);
                }
            });

        view::composer('web.parts.adminClient.recipe._addRecipe', function ($view) {
            $user = User::where('id', Auth::user()->id)
                ->first();

            $view->with('user', $user);
        });

        view::composer('web.parts.blog._asideBlog', function ($view) {
            $mostRead = Blog::orderBy('view', 'DESC')
                ->take(2)
                ->get();

            $view->with('mostRead', $mostRead);
        });


//        contador mensajes sin leer

        view::composer('web.parts.adminClient.profile._asideProfile', function ($view) {
            if (auth()->user()->type == 'OWNER') {
                $commerce = Commerce::where('user_id', auth()->user()->id)
                    ->first();

                $countMessage = Message::where('commerce_id', $commerce->id)
                    ->where('read', 'NO')
                    ->count();

                $view->with([
                    'countMessage' => $countMessage,
                ]);
            }
        });

        //        contador comentarios sin leer
        view::composer('web.parts.adminClient.profile._asideProfile', function ($view) {
            if (auth()->user()->type == 'OWNER') {
                $commerce = Commerce::where('user_id', auth()->user()->id)
                    ->first();

                $countComment = Comment::where('commerce_id', $commerce->id)
                    ->count();

                $view->with([
                    'countComment' => $countComment,
                ]);
            }
        });

        //        contador de provincias
        view::composer('web.parts.searching._asideSearching', function ($view) {
            $countProvince = Commerce::with(['province'])
                ->groupBy('province_id')
                ->get();

            $view->with([
                'countProvince' => $countProvince,
            ]);
        });

    }
}
