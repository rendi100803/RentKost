<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User\Member;
use Illuminate\Support\Facades\Auth;

class CheckMemberStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            $member = Member::where('user_id', $user->id)->first();

            if ($member && $member->status == 'verifikasi') {
                return $next($request);
            }
        }

        return redirect('/home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
