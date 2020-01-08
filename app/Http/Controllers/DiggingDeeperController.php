<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class DiggingDeeperController extends Controller
{
    public function collections(){
    	$result = [];

    	$eloquentCollection = BlogPost::withTrashed()->get();

    	dd($eloquentCollection->count());
    }
}
