<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Mypage\Profile\EditRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfileEditForm()
    {
        return view('mypage.profile_edit_form', ['user' => Auth::user()]);
    }

    public function editProfile(EditRequest $request)
    {
        $user = $request->user();
        $user->fill($request->all())->save();

        return redirect()
                ->back()
                ->with('status', 'プロフィールを変更しました。');
    }
}
