<?php

namespace App\Http\Controllers;

use App\User;
use App\Team;
use App\Course;
use MercadoPago\SDK;
use MercadoPago\Item;
use MercadoPago\Payer;
use MercadoPago\Preference;
use Illuminate\Http\Request;

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

        $item = $this->getItemFromCourse($team->course);
        $payer = $this->getPayerFromUser(auth()->user());

        $preference->items = [$item];
        $preference->payer = $payer;
        $preference->back_urls = [
            'success' => route('order-completed.success'),
            'failure' => route('order-completed.failure'),
            'pending' => route('order-completed.pending')
        ];
        $preference->auto_return = 'approved';

        $preference->save();

        return redirect($preference->init_point);
    }

    protected function getItemFromCourse(Course $course)
    {
        $item = new Item();
        $item->id = $course->id;
        $item->title = $course->name;
        $item->description = $course->description;
        $item->quantity = 1;
        $item->picture_url = $course->publicImagePath;
        $item->currency_id = "BRL";
        $item->category_id = 'learnings';
        $item->unit_price = $course->price;

        return $item;
    }

    protected function getPayerFromUser(User $user)
    {
        $payer = new Payer();
        $payer->name = $user->name;
        $payer->email = $user->email;
        $payer->identification = [
            'type' => 11 === strlen($user->cpf_cnpj) ? 'CPF' : 'CNPJ',
            'number' => $user->cpf_cnpj
        ];

        return $payer;
    }
}
