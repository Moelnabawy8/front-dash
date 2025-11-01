<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::paginate(10);
        return view('admin.subscribers.index', compact('subscribers'));
    }
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        return redirect()->route("admin.subscribers.index")
            ->with('Success', 'Subscriber deleted successfully!');
    }
}
