<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;


class TopController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return view('top', [
            'items' => $items,
        ]);
    }

    public function register(Request $request)
    {
        $item = new Item();
        $item->title = $request->title;
        $item->detail = $request->detail;
        $item->due_date = $request->due_date;
        $item->status = 'Progress';
        $item->save();

        return redirect()->route('top');
    }

    public function delete($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect()->route('top');
    }

    public function complete($id)
    {
        $item = Item::find($id);
        $item->status = "Complete";
        $item->save();
        return redirect()->route('top');
    }
}
