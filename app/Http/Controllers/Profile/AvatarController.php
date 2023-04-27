<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateAvatarRequest;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request)
    {
        $path = Storage::disk('public')->put('avatars', $request->file('avatar'));
        // $path = $request->file('avatar')->store('avatars', 'public');

        if($oldAvatar = $request->user()->avatar){
            Storage::disk('public')->delete($oldAvatar);
        }

        auth()->user()->update(['avatar'=>$path]);

        return back()->with('message','l\'avatar a changé');
    }

    public function generate(Request $request)
    {

        $result = OpenAI::images()->create([
            'n' => 1,
            'prompt' => "créer un avatar africain sympa qui a l'air de travailler dans la tech",
            'size'=>"256x256"
        ]);

        $contents = file_get_contents($result->data[0]->url);

        $filename = Str::random(25);

        $path = Storage::disk('public')->put("avatars/$filename.jpg", $contents);

        if($oldAvatar = $request->user()->avatar){
            Storage::disk('public')->delete($oldAvatar);
        }

        auth()->user()->update(['avatar'=>"avatars/$filename.jpg"]);

        return back()->with('message','l\'avatar a changé');
        // return ;
    }
}
