<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class usuarioController extends Controller
{


     function create(Request $request) {
        print_r($request->all());

    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>  bcrypt($request->password),
            'CPF' => $request->CPF,
            'level' => $request->level,

        ]);

        print("Salvo com sucesso");

        return redirect()-> route('create.user')->with('aviso','Usuario adicionado com sucesso');
    
        }

    public function auth(Request $request){
        print_r($request->all());
        $email = $request->email;
        $password = $request->password;

        $resultado=auth()->attempt(['email' => $email, 'password' => $password]);
      
        $emailExists = User::where('email', $request->email)->exists();
        if($emailExists){

            if($resultado){
                return redirect()->route('produto.index')->with('aviso','Logado com sucesso');
            }
            else{
                return redirect()->route('login.user')->with('aviso','Senha incorreta');
            }

        }
        else{
            return redirect()->route('login.user')->with('aviso','Email não encontrado na base de dados');
        }

      
        
      
    }


    public function listUser(){
        $Users=User::all();
        return view('users.ListerUser',compact('Users'));
    }


    public function changelevelUser(Request $request)  {
        $User = User::find($request->id);
        $userLevelOld= $User->level;
        $User->level = $request->level;
        $User->save();
       return redirect()->route('list.user')->with('aviso','Nivel de acesso de usuario: '.$User->name .' modificado de '.$userLevelOld.' para '.  $User->level);
        
    }


    public function deleteUser($id){
        User::find($id)->delete();
        return redirect()->route('list.user')->with('aviso','Usuario deletado com sucesso');
    }

    public function user_data(){
        $user=User::find( Auth::user()->id);

        return view('users.myPerfil',compact('user'));

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login.user')->with('aviso','Deslogado com sucesso');
    }

}
