<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    {
        $path = $request->file('avatar')->store('avatars', 'public');

        auth()->user()->update(['avatar'=>$path]);

        return back()->with('message','l\'avatar a changé');
    }
}
