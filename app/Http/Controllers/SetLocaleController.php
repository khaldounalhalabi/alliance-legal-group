<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetLocaleController extends Controller
{
    public function setLanguage(Request $request)
    {
        $request->validate([
            'lang' => 'required|in:'.implode(',', config('cubeta-starter.available_locales')),
        ]);

        $lang = $request->input('lang');

        session()->put('locale', $lang);

        // Set the locale for the current application
        app()->setLocale($lang);

        // Redirect back to the previous page
        return response()->json([
            'message' => 'success',
        ]);
    }
}
