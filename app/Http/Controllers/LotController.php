<?php

namespace App\Http\Controllers;

use App\Models\Lot;
use App\Models\Photo;
use App\Models\Images;
use App\Models\Carving;
use App\Models\Drawing;
use App\Models\Painting;
use App\Models\Sculpture;
use App\CustomClasses\Alert;
use App\CustomClasses\icons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CustomClasses\ModelValidator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LotController extends Controller
{
    public function getList()
    {
        require '../app/CustomClasses/icons.php';
        $list = [
            ["header" => "Create", "title" => "Create a new lot", "anchor" => route("lot.new"), "action" => "Create Lot", "desc" => "Add a new lot into the auction system", "icon" => $icons['create']],
            ["header" => "Edit", "title" => "Edit an existing lot", "anchor" => route("lot.find"), "action" => "Edit Lot", "desc" => "Find and edit a lot currently within the auction system", "icon" => $icons['edit']],
            ["header" => "View", "title" => "View an existing lot", "anchor" => route("lot.find"), "action" => "View Lot", "desc" => "Find and view a lot how clients will see", "icon" => $icons['view']],
            ["header" => "Delete", "title" => "Delete a lot", "anchor" => route("lot.find"), "action" => "Delete Lot", "desc" => "Find an existing lot within system and delete it", "icon" => $icons['delete']],
            ["header" => "Search", "title" => "Search for a lot", "anchor" => route("lot.find"), "action" => "Search Lots", "desc" => "Find an existing lot within system", "icon" => $icons['search']],
            ["header" => "Add", "title" => "Add a lot to a given auction", "anchor" => route("lot.find"), "action" => "Add Lot", "desc" => "Find a existing lot and add to an auction", "icon" => $icons['add']]
        ];

        return $list;
    }
    public function home(?Alert $alert)
    {
        if ($alert->heading != "false") {
            dd();
        }

        $title = "Lots Home";
        $list = $this->getList();

        return view("general.home", ["title" => $title, "list" => $list]);
    }
    public function new(Request $request, Alert $alert = null)
    {

        $title = "New Lot";
        $lot = old();

        $id = null;

        if (isset($request->lot['id'])) {
            $id = $request->lot['id'];
        }

        if (isset($request->id)) {
            $id = $request->id;
        }

        $modelValidator = new ModelValidator(Lot::class, $id, old());
        $lot = $modelValidator->validate();


        if (!is_null($lot) && isset($lot->lot)) {
            $lot = $lot->lot;
        }


        return view("lots.new", ["title" => $title, "alert" => $alert, "lot" => $lot]);
    }

    public function stage(Request $request)
    {
        $category = $request->lot['category'];
        $title = "Create " . $category;
        $view = null;

        $lot = $request->lot;

        //'lot.file.*' => "required|mimes:jpg,jpeg,png",
        $this->validate($request, [
            'lot.name' => ['required'],
            'lot.subject' => "required",
            'lot.artist' => "required",
            'lot.year' => "required",
            'lot.description' => "required",
            'lot.price' => "required",
            'lot.file.*' => "required",
        ]);


        if ($category == "Painting") {
            $view = "lots.painting";
        }

        if ($category == "Drawing") {
            $view = "lots.drawing";
        }

        if ($category == "Sculpture") {
            $view = "lots.sculpture";
        }

        if ($category == "Photographic Image") {
            $view = "lots.photo";
        }

        if ($category == "Carving") {
            $view = "lots.carving";
        }

        if ($view == null) {
            //redirect needs to be returned i see.
            return redirect()->route("general.construction");
        }

        $category = false;

        //therefore edit
        if (isset($lot['id'])) {
            $category = Lot::find($lot['id'])->categoryDetails()->get()[0];
        }

        $images = $request->lot['file'];

        //php artisan storage:link had to run this in order to get file upload to work properly.
        foreach ($request->lot['file'] as $image) {
            $extension = $image->extension();
            $fileName = uniqid() . "." . $extension;
            $image->storeAs('/public/images/uploads', $fileName);

            //save file location
            $file = new Images;
            $file->fillItem($fileName);
            $file->save();
        }

        $return = back()->getTargetUrl();

        return view($view, ["title" => $title, "return" => $return, "lot" => $lot, "category" => $category]);
    }

    public function save(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'category.medium' => 'sometimes|required',
            'category.height' => 'sometimes|required',
            'category.weight' => 'sometimes|required',
            'category.width' => 'sometimes|required',
            'category.type' => 'sometimes|required',
            'category.material' => 'sometimes|required'
        ]);

        if ($validator->fails()) {
            return redirect('lot/new/stage')
                ->withErrors($validator)
                ->withInput();
        }

        //create lot
        $lot = new Lot;
        $oldCat = $request->lot['category'];

        if (isset($request->lot['id'])) {
            $lot = Lot::find($request->lot['id']);
            $oldCat = $lot->category;
            $olddetails = $lot->categoryDetails()->get()[0];
        }

        //if edited to new category delete old information


        $lot->fillItem($request->lot);

        //delete old data
        if (isset($olddetails)) {
            $olddetails->delete();
        }

        $lot->save();

        //create alt

        //dd($lot->categoryDetails()->get());
        $cat_type = "App\Models\\" . $lot->type();
        $attributes = $request->category;
        $attributes['lot_id'] = $lot->id;


        $category = new $cat_type;

        //update
        $category->fillItem($attributes);
        $category->save();

        //update images
        $images = Images::where("lot_id", "=", null)->update(["lot_id" => $lot->id]);
        //confirm
        $heading = "Successfully Created Lot";
        $message = "Lot has been created successfully returned to lot homepage";
        return $this->confirm($heading, $message, "success");
    }

    public function confirm($heading, $message, $alertType)
    {
        $title = "Success";
        $alert = new Alert("success", $heading, $message);
        $list = $this->getList();
        return view("general.home", ["title" => $title, "list" => $list, "alert" => $alert]);
    }

    public function find(Request $request)
    {
        $title = "Search Lots";
        $alert = new Alert();
        $deleted = session("deleted");

        if ($deleted != null && $deleted == true) {
            $heading = "Successfully deleted lot";
            $message = "Lot deleted, category information deleted";
            $alert = new Alert("success", $heading, $message);
        }


        if (isset($request->search)) {
            $query = Lot::query();

            $searchFields = ['id', 'name', 'category', 'price', 'year', 'artist', 'description'];

            foreach ($searchFields as $field) {
                $query->orWhere($field, "LIKE", "%" . $request->search . "%");
            }

            $lots = $query->orderby('id', "desc")->paginate(5);
        } else {
            $lots = Lot::orderby('id', "desc")->Paginate(5);
        }

        $search = $request->search;

        return view("lots.search", [
            "title" => $title,
            "lots" => $lots,
            "search" => $search,
            "alert" => $alert
        ]);
    }

    public function destroy(Lot $lot)
    {
        $lot->delete();

        $heading = "Successfully deleted lot";
        $message = "Lot deleted, category information deleted";
        return back()->with("deleted", true);
    }

    public function view(Request $request)
    {

        $title = "Fotheby's View Lots";
        $query = Lot::query();
        if (isset($request->search)) {

            $searchFields = ['id', 'name', 'category', 'price', 'year', 'artist', 'description'];

            foreach ($searchFields as $field) {
                $query->orWhere($field, "LIKE", "%" . $request->search . "%");
            }

            $lots = $query->with("images")->orderby('id', "desc")->paginate(6);
        } else {
            $lots = $query->with("images")->orderby('id', "desc")->paginate(6);
        }

        $search = $request->search;

        return view("lots.view", ["title" => $title, "lots" => $lots, "search" => $search]);
    }

    public function single(Request $request)
    {
        $title = "Fotheby's View Lot";
        $imagesPath = "/storage/images/uploads/";
        $ext = " Slide";
        $slides = ["First" . $ext, "Second" . $ext, "Third" . $ext, "Fourth" . $ext];
        if (isset($request->id)) {
            $lot = Lot::with("images")->get()->find($request->id);
        } else {
            return redirect(route("lot.view"));
        }

        if ($lot == null) {
            return redirect(route("lot.view"));
        }

        if (count($lot->images) < 1) {
            $lot->images = false;
        }
        return view("lots.single", ["title" => $title, "lot" => $lot, "imagesPath" => $imagesPath, "slides" => $slides]);
    }
}
