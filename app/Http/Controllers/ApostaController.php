<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Aposta;


class ApostaController extends Controller
{
    public function aposta(Request $request){

        $aposta = new Aposta;

        $user = auth()->user();

        //Preenche os dados do tipo de aposta para efetuar as funções a seguir

        $min = $request->min;
        $max = $request->max;
        $multiplicador = $request->mult;
        $quantia = $request->quantia;
        $num_aposta = $request->num_apostado;

        //Preenche os dados da aposta que ficará salva no db

        $aposta->saldo_antes_aposta = $user->money;
        $aposta->user_id = $user->id;
        $aposta->quantia_apostada = $quantia;
        $aposta->mult = $multiplicador;

        //Sorteia o número com base nos parâmetros passados pela view

        $res = rand($min, $max);

        //Verifica os inputs da aposta para procurar um dado mal inserido pelo usuário

        if(!$num_aposta || !$quantia || $quantia < 0){
            return back()->with('msg-failed', 'Preencha os campos corretamente');
        }

        if($num_aposta < $min || $num_aposta > $max){
            return back()->with('msg-failed', 'O Número apostado não é válido!');
        }

        if($quantia > $user->money){
            return back()->with('msg-failed', 'Saldo insuficiente!');
        }

        //Debita o valor da quantia do usuário caso os dados inseridos estejam corretos

        $user->money -= $quantia;
        $user->save();

        //Salva os dados da aposta caso o usuário tenha acertado

        if($num_aposta == $res){

            $aposta->win = true;
            $aposta->saldo_pos_aposta = $user->money + $quantia*$multiplicador;
            $aposta->save();
            $user->money += $quantia*$multiplicador;
            $user->save();

            return back()->with('msg-success', 'Parabens! Você foi premiado!');
        }

        //Salva os dados da aposta caso o usuário tenha errado

        $aposta->win = false;
        $aposta->saldo_pos_aposta = $user->money;
        $aposta->save();
        return back()->with('msg-failed', 'Infelizmente não foi dessa vez, o número premiado foi: '.$res);
    }

    public function cinquenta(){
        $user = auth()->user();
        return view('cinquenta', ['user' => $user]);
    }

    public function vinte(){
        $user = auth()->user();
        return view('vinte', ['user' => $user]);
    }

    public function dez(){
        $user = auth()->user();
        return view('dez', ['user' => $user]);
    }

    public function um(){
        $user = auth()->user();
        return view('um', ['user' => $user]);
    }

    public function dashboard(){
        $user = auth()->user();
        $apostas = Aposta::where('user_id', $user->id)->orderBy('created_at', 'desc')->simplePaginate(3);
        return view('dashboard', ['user' => $user, 'apostas' => $apostas]);
    }

}
