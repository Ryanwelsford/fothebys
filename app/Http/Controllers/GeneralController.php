<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use App\CustomClasses\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{


    public function home()
    {
        $title = "Fothebys Home";
        $query = Lot::query();
        $lots = $query->with("images")->orderby('id', "desc")->paginate(6);


        return view("test", ["title" => $title, "lots" => $lots]);
    }

    public function admin()
    {
        $title = "Fothebys admin home";

        $query = Lot::query();
        $lots = $query->with("images")->orderby('id', "desc")->paginate(6);

        return view("test", ["title" => $title, "lots" => $lots]);
    }

    public function construction()
    {

        $title = "Fothebys Under Construction";

        $alert = new Alert("purple", "This page is under construction", "Please return at a later date to learn more");

        return view("general.construction", ["title" => $title, "alert" => $alert]);
    }
}
