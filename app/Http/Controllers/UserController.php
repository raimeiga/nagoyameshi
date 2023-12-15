<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/* ↑ Authファサードを利用することで、現在ログイン中のユーザーを取得
    Authファサードは、クラスをインスタンス化しなくても、Auth::user()を記述することで、
     現在ログイン中のユーザー（Userモデルのインスタンス）を取得できる。
*/

class UserController extends Controller
{
    // ↓ mypageアクション。マイページ」に会員情報を渡すためのアクション。
    // ↓ これに加えて、「会員情報の編集」のビューに会員情報を渡すeditアクションも、↓に記述する
    public function mypage()  
     {
        //現在ログイン中のユーザー（Userモデルのインスタンス）を取得し、$userに格納し、compact()でusers.mypageのビューに渡す
         $user = Auth::user(); 
 
         return view('users.mypage', compact('user'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    //「会員情報の編集」のビューに会員情報を渡すアクションだが、このアクションだけでなく、↑のmypageも編集する必要があるんだろう。。。
    public function edit(User $user)
    {   
        $user = Auth::user(); //ユーザーの情報をAuth::user()で取得し、users.editビューへと渡す
 
         return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = Auth::user();
        /* ↓　(? クエスチョンマーク)は三項演算子で、「＜条件式＞?＜条件式が真trueの場合＞:＜条件式が偽falseの場合＞」って使う
           　　例えば'name'が更新されていた場合に新しい'name'を保存し、更新されてない場合には、元の'name'を保存する
        */ 
         $user->name = $request->input('name') ? $request->input('name') : $user->name;
         $user->nickname = $request->input('nickname') ? $request->input('nickname') : $user->nickname;
         $user->email = $request->input('email') ? $request->input('email') : $user->email;
         $user->update();
 
         return to_route('mypage'); //更新後はマイページに遷移
    }

    // パスワードを変更するためのアクション
    public function update_password(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user = Auth::user();
        /* 送信されたリクエスト内のpasswordとpassword_confirmationが同一のものか確認し、
           同じである場合のみパスワードを暗号化しデータベースへと保存*/
        if ($request->input('password') == $request->input('password_confirmation')) {
            $user->password = bcrypt($request->input('password'));
            $user->update();
        
        // 異なっていた場合は、パスワード変更画面へとリダイレクト
        } else { 
            return to_route('mypage.edit_password');
        }

        return to_route('mypage');
    }

    //パスワード変更画面を表示するedit_passwordアクション    
    public function edit_password()
    {
        return view('users.edit_password');
    }


    public function favorite()
    {
        $user = Auth::user();

        $favorites = $user->favorites(Restaurant::class)->get();

        return view('users.favorite', compact('favorites'));
    }
}
