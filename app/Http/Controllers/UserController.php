<?php

namespace App\Http\Controllers;

use App\Models\Passwords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    public function user() {
        $user_passwords = Passwords::query()
         ->where('author_id', auth()->user()->id)
         ->orderBy('updated_at', 'desc')
         ->get();

        foreach ($user_passwords as $user_password) {
            $user_password->pass_pass = Crypt::decryptString($user_password->pass_pass);
            $user_password->pass_pass = $this->get_string_between($user_password->pass_pass, '"', '"');
        }


        return view('/user', [
            'user_passwords' => $user_passwords,
        ]);
    }

    public function add(Request $request) {
        $pass_pass = Crypt::encrypt($request->post('password'));

        Passwords::query()
            ->create([
                'pass_name' => $request->post('name'),
                'pass_pass' => $pass_pass,
                'pass_key' => $request->post('keyword'),
                'author_id' => auth()->user()->id,
            ]);

        return redirect('/user')->withErrors(['Password added.', 'The Message']);
    }
}
