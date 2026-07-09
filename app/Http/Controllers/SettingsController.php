<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'key' => ['required', 'string', 'max:255'],
            'locale' => ['required', 'in:en,es'],
            'value' => ['required', 'string', 'max:5000'],
        ]);

        Translation::query()->updateOrCreate(
            [
                'key' => $data['key'],
                'locale' => $data['locale'],
            ],
            [
                'value' => $data['value'],
            ]
        );

        return back()->with('status', 'Translation saved successfully.');
    }

    public function destroy(Translation $translation): RedirectResponse
    {
        $translation->delete();

        return back()->with('status', 'Translation deleted successfully.');
    }
}