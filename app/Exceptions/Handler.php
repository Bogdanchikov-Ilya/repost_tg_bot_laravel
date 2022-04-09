<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function report (Throwable $e)
    {
//        $message = $e->getMessage();
//        \Illuminate\Support\Facades\Http::post('https://api.tlgr.org/bot5045491073:AAGn4ZZuWH9XYxKNf6lj8s-aqnY441KfoDU/sendMessage', [
//            'chat_id' => 761657672,
//            'text' => '<b>sdfsdfds</b>',
//            'parse_mode' => 'html',
//        ]);
    }
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
