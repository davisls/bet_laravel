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
        $aposta->user_id = $user->id;

        $min = $request->min;
        $max = $request->max;
        $multiplicador = $request->mult;
        $res = rand($min, $max);
        $num_aposta = $request->num_apostado;
        $quantia = $request->quantia;
        $aposta->quantia_apostada = $quantia;

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
        $apostas = Aposta::where('user_id', $user->id)->paginate(3);
        return view('dashboard', ['user' => $user, 'apostas' => $apostas]);
    }

}
