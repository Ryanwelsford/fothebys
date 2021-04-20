<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function home()
    {
        require '../app/CustomClasses/icons.php';

        $title = "Auctions Home";
        $list = [
            ["header" => "Create", "title" => "Create a new auction", "anchor" => route("lot.new"), "action" => "Create Auction", "desc" => "Add a new auction into the system", "icon" => $icons['create']],
            ["header" => "Edit", "title" => "Edit an existing auction", "anchor" => "#", "action" => "Edit Auction", "desc" => "Find and edit an auction currently within the auction system", "icon" => $icons['edit']],
            ["header" => "View", "title" => "View an existing auction", "anchor" => "#", "action" => "View Auction", "desc" => "Find and view an auction how clients will see", "icon" => $icons['view']],
            ["header" => "Delete", "title" => "Delete an auction", "anchor" => "#", "action" => "Delete Auction", "desc" => "Find an existing auction within system and delete it", "icon" => $icons['delete']],
            ["header" => "Search", "title" => "Search for an auction", "anchor" => "#", "action" => "Search Auctions", "desc" => "Find an existing auction within system", "icon" => $icons['search']],
            ["header" => "Add", "title" => "Add lots to created auctions", "anchor" => "#", "action" => "Add lots", "desc" => "Find a existing lot and add to an auction", "icon" => $icons['add']]
        ];

        return view("general.home", ["title" => $title, "list" => $list]);
    }
}
