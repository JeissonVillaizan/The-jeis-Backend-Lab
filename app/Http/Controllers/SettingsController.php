<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function index(): View
    {
        $translations = Translation::query()
            ->orderBy('key')
            ->orderBy('locale')
            ->get();

        return view('pages.settings', compact('translations'));
    }

public function store(Request $request)
{

    $validator = Validator::make($request->all(), [
        'key' => ['required', 'string', 'max:255'],
        'locale' => ['required', 'in:en,es'],
        'value' => ['required', 'string', 'max:5000'],
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'message' => 'Validation failed.',
            'errors' => $validator->errors(),
        ], 422);
    }

    $data = $validator->validated();

    $secret = $request->header('X-secret');

    if ($secret !== env('SECRET')) {
        return response()->json([
            'success' => false,
            'message' => 'No eres Jeisson Villaizan!',
        ], 403);

    }

    Translation::updateOrCreate(
        [
            'key' => $data['key'],
            'locale' => $data['locale'],
        ],
        [
            'value' => $data['value'],
        ]
    );
    return response()->json([
        'success' => true,
        'message' => 'Translation saved successfully.',
        'data' => $data,
    ], 200);
}

    public function destroy(Request $request, Translation $translation)
    {

    $secret = $request->header('X-secret');

            if ($secret !== env('SECRET')) {
        return response()->json([
            'success' => false,
            'message' => 'No eres Jeisson Villaizan!',
        ], 403);

    }
        $translation->delete();

        return response()->json([
            'success' => true,
            'message' => 'Translation deleted successfully.'
        ]);
    }
        

}