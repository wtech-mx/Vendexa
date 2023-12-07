<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function report(Throwable $exception)
    {
        if ($this->shouldReport($exception)) {
            $message = $exception->getMessage();
            $statusCode = method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : 500;
            $subject = "Error $statusCode: $message";

            if (app()->bound('sentry') && $this->shouldReportToSentry($exception)) {
                app('sentry')->captureException($exception);
            }

            if (app()->environment('production')) {
                $this->sendEmail($subject, $exception);
            }
        }

        parent::report($exception);
    }

    protected function sendEmail($subject, $exception)
    {
        $webpage = WebPage::first();

        $to = "josue.adrian.ramirezhernandez@gmail.com";
        $to2  = "dayanna.wtech@gmail.com";

        $message = $exception->getMessage() . "\n\n" .
            $exception->getTraceAsString() . "\n\n" .
            'Request Data: ' . json_encode(request()->all());

        // Mail::raw($message, function ($email) use ($to, $subject) {
        //     $email->to($to)
        //           ->subject($subject);
        // });

        Mail::raw($message, function ($email) use ($to, $to2, $subject) {
            $email->to($to)
                  ->to($to2)
                  ->subject($subject);
        });

    }
}
