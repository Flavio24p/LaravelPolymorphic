<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Tag;
use App\Models\User;

class UserController extends Controller
{
    public function profile($id)
    {
        $user = User::findOrFail($id);

        $tags = Tag::all();

        $arrayOfUserTags = $user->tags->pluck('id')->toArray();

        return view('user.profile', compact('user', 'tags', 'arrayOfUserTags'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $user->tags()->sync($request->tags);

        return back()->with("success", "User Updated Successfully");
    }
}
