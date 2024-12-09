<?php

use App\Http\Middleware\CheckAdminLoggedInOrNot;
use App\Http\Middleware\Sample;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        commands: __DIR__.'/../routes/console.php',
        using: function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
            Route::middleware('web')
                ->group(base_path('routes/admin.php'));
        },
    )
      
    ->withMiddleware(function (Middleware $middleware) {
        //
        //$middleware->append(CheckAdminLoggedInOrNot::class);
        /*$middleware->group('web',[
            CheckAdminLoggedInOrNot::class,
        ]);*/
       // $middleware->alias([
            //'auth'=> CheckAdminLoggedInOrNot::class,
        //]);
        //$middleware->redirectGuestsTo('admin.dashboard1');
        //$middleware->redirectUsersTo('login');
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
    
