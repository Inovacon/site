<?php

namespace App\Http\Controllers;

use App\Team;
use App\Course;
use MercadoPago\SDK;
use Illuminate\Http\Request;
use MercadoPago\Preference;
use MercadoPago\Item;
use MercadoPago\Payer;

class TeamController extends Controller
{
    public function index(Course $activeCourse)
    {
        return view('courses.team-selection', [
            'course' => $activeCourse,
            'teams' => $activeCourse->teams,
        ]);
    }

    public function buyCourse(Team $team)
    {
        SDK::setClientId(env('MP_CLIENT_ID'));
        SDK::setClientSecret(env('MP_CLIENT_SECRET'));

        $preference = new Preference();

        $item = new Item();
        $item->id = $team->course->id;
        $item->title = $team->course->name;
        $item->quantity = 1;
        $item->currency_id = "BRL";
        $item->unit_price = $team->course->price;

        $user = auth()->user();

        $payer = new Payer();
        $payer->email = $user->email;
        $payer->identification = [
            "type" => 11 === strlen($user->cpf_cnpj) ? 'CPF' : 'CNPJ',
            "number" => $user->cpf_cnpj
        ];

        $preference->items = [$item];
        $preference->payer = $payer;

        $preference->save();

        return redirect($preference->init_point);
    }
}
