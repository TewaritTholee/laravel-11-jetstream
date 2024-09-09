<?php



// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class CheckUserStatus
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure  $next
//      * @return mixed
//      */
//     public function handle(Request $request, Closure $next)
//     {
//         // ตรวจสอบสถานะของผู้ใช้
//         $user = Auth::user();

//         if ($user && $user->status === 'no') {
//             // หากสถานะเป็น 'no', redirect ไปยังหน้าอื่นหรือแสดงข้อความข้อผิดพลาด
//             return redirect('register')->with('error', 'Access denied due to your status.');
//         }

//         return $next($request);
//     }
// }







// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;

// class CheckUserStatus
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
//      */
//     public function handle(Request $request, Closure $next): Response
//     {
//         return $next($request);
//     }
// }
