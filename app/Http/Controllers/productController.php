<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Commission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class productController extends Controller
{
    
    function index(){
        $produtos = Product::orderBy('created_at', 'desc')->get();

        
        return view('produto.indexProduto', compact('produtos'));
    }

    function create(Request $request) {

        
        print_r($request->all());

        $image = $request->file('image');

   
        $path = $image->store('images', 'public');


      
       $id_user = Auth::user()->id;
       Product::create([
       'name'=>$request->name,
       'image'=> $path, 
       'price'=>$request->price, 
       'description'=>$request->description,
       'amount'=>$request->amount,
       'user_id'=> $id_user,
    ]);

    return redirect()->route('create.product')->with('aviso','produto cadastrado com sucesso');

    }


    function registerSale($id)  {
        

        $produto = Product::find($id);
        $valorComissao=$produto->price*0.05;
        $usuario = User::find(Auth::user()->id); // Substitua $usuarioId pelo ID do usuário
        if ($usuario && $usuario->commision()->exists()) {
            $commision = $usuario->commision;
            $commision->value_commission += $produto->price*0.05;
            $commision->save();
            

        } else { 
           

            Commission::create([
                'value_commission' => $valorComissao,
                'user_id' => Auth::user()->id,
             ]);
           
        }

      

        

        if ($produto) { 
            $produto->amount -= 1; 
            $produto->save();

            $produto = Product::find($id);
            if($produto->amount==0) {
                $produto->delete();
                return redirect()->route('produto.index')->with('aviso','Produto deletado do estoque');
          }

        return redirect()->route('produto.index')->with('aviso','Venda realizada com sucesso, comissao de: '.$valorComissao);
    }
}
}

   