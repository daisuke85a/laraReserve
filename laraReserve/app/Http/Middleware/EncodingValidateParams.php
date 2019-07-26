<?php namespace App\Http\Middleware;

use Closure;

class EncodingValidateParams
{
    public function handle($request, Closure $next)
    {
        foreach ($request->all() as $val) {
            if (gettype($val) !== "object") {
                if (!$this->isValidEncoding($val)) {
                    abort(400, 'Bad Request');
                }
            }
        }

        return $next($request);
    }

    private function isValidEncoding($val)
    {
        if (mb_check_encoding($val, "UTF-8")) {
            return true;
        }

        return false;
    }
}
