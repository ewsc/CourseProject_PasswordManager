<?php

namespace App\Http\Controllers;

use App\Models\Passwords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function add(Request $request) {
        $pass_pass = Crypt::encrypt($request->post('password'));

        Passwords::query()
            ->create([
                'pass_name' => $request->post('name'),
                'pass_pass' => $pass_pass,
                'pass_key' => $request->post('keyword'),
                'author_id' => auth()->user()->id,
            ]);

        return redirect('/add')->withErrors(['Password added.', 'The Message']);
    }
}
