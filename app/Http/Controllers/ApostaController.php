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

        $min = $request->min;
        $max = $request->max;
        $multiplicador = $request->mult;
        $quantia = $request->quantia;
        $num_aposta = $request->num_apostado;

        $aposta->saldo_antes_aposta = $user->money;
        $aposta->user_id = $user->id;
        $aposta->quantia_apostada = $quantia;
        $aposta->mult = $multiplicador;

        $res = rand($min, $max);

        if($num_aposta < $min || $num_aposta > $max){
            return back()->with('msg-failed', 'O Número apostado não é válido!');
        }

        if($quantia > $user->money){
            return back()->with('msg-failed', 'Saldo insuficiente!');
        }

        if(!$num_aposta || !$quantia){
            return back()->with('msg-failed', 'Preencha os campos corretamente');
        }

        $user->money -= $quantia;
        $user->save();

        if($num_aposta == $res){

            $aposta->win = true;
            $aposta->saldo_pos_aposta = $user->money + $quantia*$multiplicador;
            $aposta->save();
            $user->money += $quantia*$multiplicador;
            $user->save();

            return back()->with('msg-success', 'Parabens! Você foi premiado!');
        }

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
        $apostas = Aposta::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(3);
        return view('dashboard', ['user' => $user, 'apostas' => $apostas]);
    }

}
