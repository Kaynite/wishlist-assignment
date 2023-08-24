<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\View\View;

class ItemController extends Controller
{
    public function index(): View
    {
        return view('items.index', [
            'items' => Item::latest('id')->paginate(),
        ]);
    }
}
