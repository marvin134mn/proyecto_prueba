<?php


namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ActiveSession;


class CheckUserSessions
{
public function handle(Request $request, Closure $next)
{
if (!Auth::check()) return $next($request);


$user = Auth::user();
$sessionId = $request->session()->getId();
$ip = $request->ip();
$ua = substr($request->userAgent() ?? '', 0, 512);


$plan = $user->currentPlan();


$maxSessions = $plan ? (int)$plan->max_sessions : 1;
$maxDistinctUsers = $plan ? (int)$plan->max_distinct_users : 1;


// Upsert de la sesión actual
ActiveSession::updateOrCreate(
['session_id' => $sessionId],
[
'user_id' => $user->id,
'ip' => $ip,
'user_agent' => $ua,
'last_activity' => now(),
]
);


// Limpia sesiones inactivas (por ejemplo > 30 días) - política opcional
$threshold = now()->subDays(30);
ActiveSession::where('last_activity', '<', $threshold)->delete();


// Cuenta sesiones activas del usuario (por session_id único)
$activeSessions = ActiveSession::where('user_id', $user->id)->count();

        if ($activeSessions > $maxSessions) {
            // Si se excedió el límite de sesiones
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Has excedido el número máximo de sesiones permitidas.'
                ], 429);
            }

            return redirect()->route('login')
                ->withErrors(['error' => 'Has excedido el número máximo de sesiones permitidas.']);
        }

        return $next($request);
    }
}