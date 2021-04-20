<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function home()
    {
        require '../app/CustomClasses/icons.php';

        $title = "Users Home";
        $list = [
            ["header" => "Create", "title" => "Create a new user", "anchor" => route("lot.new"), "action" => "Create user", "desc" => "Add a new user to access the auction website", "icon" => $icons['create']],
            ["header" => "Edit", "title" => "Edit an existing user", "anchor" => "#", "action" => "Edit User", "desc" => "Find and edit a user currently within the auction website", "icon" => $icons['edit']],
            ["header" => "Manage", "title" => "Approve validated users", "anchor" => "#", "action" => "Approve Users", "desc" => "Find a registration request and approve or disprove the user", "icon" => $icons['approve'], "note" => "5"],
            ["header" => "Delete", "title" => "Delete a user", "anchor" => "#", "action" => "Delete User", "desc" => "Find and remove a user, preventing them from logging in", "icon" => $icons['delete']],
            ["header" => "Search", "title" => "Search created users", "anchor" => "#", "action" => "Search Users", "desc" => "Find an existing auction within system", "icon" => $icons['search']]
        ];

        return view("general.home", ["title" => $title, "list" => $list]);
    }
}
