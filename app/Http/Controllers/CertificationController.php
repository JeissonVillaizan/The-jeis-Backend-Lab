<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'issuer' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'url' => 'nullable|url|max:2048',
            'image' => 'nullable|image|max:2048',
            'secret' => 'required|string',
        ], $this->storeValidationMessages());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator, 'store')
                ->withInput()
                ->with('open_cert_modal', true);
        }

        $data = $validator->validated();

        // Validate secret matches env value
        $secret = env('SECRET');
        if (! $secret || $data['secret'] !== $secret) {
            return back()
                ->withErrors(['secret' => t('certifications.errors.not_jeisson')], 'store')
                ->withInput()
                ->with('open_cert_modal', true);
        }

        $certData = [
            'title' => $data['title'],
            'issuer' => $data['issuer'] ?? null,
            'date' => $data['date'] ?? null,
            'url' => $data['url'] ?? null,
        ];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('certifications', 'public');
            $certData['image'] = $path;
        }

        Certification::create($certData);

        return back()->with('status', 'Certification added');
    }

    public function index()
    {
        $certifications = Certification::orderBy('date', 'desc')->get();
        return view('pages.certifications', compact('certifications'));
    }

    public function destroy(Request $request, Certification $certification)
    {
        $validator = Validator::make($request->all(), [
            'secret' => 'required|string',
        ], $this->destroyValidationMessages());

        if ($validator->fails()) {
            return back()
                ->withErrors($validator, 'destroy')
                ->with('open_cert_delete_modal', true);
        }

        $data = $validator->validated();

        $secret = env('SECRET');
        if (! $secret || $data['secret'] !== $secret) {
            return back()
                ->withErrors(['secret' => t('certifications.errors.not_jeisson')], 'destroy')
                ->with('open_cert_delete_modal', true);
        }

        if ($certification->image) {
            Storage::disk('public')->delete($certification->image);
        }

        $certification->delete();

        return back()->with('status', 'Certification deleted');
    }

    private function storeValidationMessages(): array
    {
        return [
            'title.required' => t('certifications.validation.title.required'),
            'title.string' => t('certifications.validation.title.string'),
            'title.max' => t('certifications.validation.title.max'),
            'issuer.string' => t('certifications.validation.issuer.string'),
            'issuer.max' => t('certifications.validation.issuer.max'),
            'date.date' => t('certifications.validation.date.date'),
            'url.url' => t('certifications.validation.url.url'),
            'url.max' => t('certifications.validation.url.max'),
            'image.image' => t('certifications.validation.image.image'),
            'image.max' => t('certifications.validation.image.max'),
            'secret.required' => t('certifications.validation.secret.required'),
            'secret.string' => t('certifications.validation.secret.string'),
        ];
    }

    private function destroyValidationMessages(): array
    {
        return [
            'secret.required' => t('certifications.validation.secret.required'),
            'secret.string' => t('certifications.validation.secret.string'),
        ];
    }
}
