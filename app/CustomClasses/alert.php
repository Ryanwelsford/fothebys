<?php

namespace App\CustomClasses;

class Alert
{
    public $type;
    public $heading;
    public $message;


    public function __construct($type = "false", $heading = "false", $message = "false")
    {
        $this->type = $type;
        $this->heading = $heading;
        $this->message = $message;
    }

    public function build()
    {
        if ($this->heading == "false") {
            return;
        }
        return view("alert", ["type" => $this->type, "heading" => $this->heading, "message" => $this->message]);
    }
}
