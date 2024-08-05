<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        $categories = Category::all();

        return view(
            'auth.passwords.email',
            [
                'categories' => $categories
            ]
        );
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', 'Gửi thành công, hãy kiểm tra Email của bạn')
                ->with('status', __($status));
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }
}
