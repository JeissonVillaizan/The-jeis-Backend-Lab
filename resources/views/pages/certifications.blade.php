@extends('layouts.app')

@section('title', "Jei's Backendlab - " . t('nav.certifications'))

@section('page_title', t('certifications.page_title'))
@section('page_subtitle', t('certifications.page_subtitle'))

@section('content')
<div class="space-y-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-start justify-end">
        <button id="cert-open-btn" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-all">
            + {{ t('certifications.add') }}
        </button>
    </div>

    @if(session('status'))
        <div class="px-4 py-3 rounded-md bg-green-700 text-white">{{ session('status') }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-4">
        @forelse($certifications as $cert)
            <div class="relative bg-gradient-to-br from-[#1a2942] to-[#0f1419] border border-blue-900/30 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-transform duration-200">
                <button
                    type="button"
                    class="cert-delete-open absolute top-3 right-3 inline-flex h-9 w-9 items-center justify-center rounded-full bg-black/40 text-white border border-white/10 hover:bg-red-600/80 transition"
                    data-cert-id="{{ $cert->id }}"
                    data-cert-title="{{ $cert->title }}"
                    aria-label="{{ t('certifications.delete.aria_button') }}"
                >
                    ✕
                </button>
                @if($cert->image)
                    <div class="w-full h-48 overflow-hidden">
                        <img src="{{ asset('storage/' . $cert->image) }}" alt="{{ $cert->title }}" class="w-full h-48 object-cover" />
                    </div>
                @endif
                <div class="p-6">
                    <h3 class="text-lg font-bold text-white mb-1">{{ $cert->title }}</h3>
                    @if($cert->issuer)
                        <p class="text-sm text-gray-400 mb-2">{{ $cert->issuer }}</p>
                    @endif
                    @if($cert->date)
                        <p class="text-xs text-gray-500 mb-2">{{ \Illuminate\Support\Carbon::parse($cert->date)->locale(app()->getLocale())->isoFormat('LL') }}</p>
                    @endif
                    @if($cert->url)
                        <a href="{{ $cert->url }}" target="_blank" class="text-blue-400 hover:underline text-sm">{{ t('certifications.labels.view') }}</a>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-400">{{ t('certifications.empty') }}</p>
            </div>
        @endforelse
    </div>
</div>

<!-- Modal -->
<div id="cert-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 {{ session('open_cert_modal') || $errors->getBag('store')->any() ? '' : 'hidden' }}"></div>
<div id="cert-modal" class="fixed inset-0 z-50 flex items-start pt-24 justify-center px-4 sm:px-6 lg:px-8 {{ session('open_cert_modal') || $errors->getBag('store')->any() ? '' : 'hidden' }}">
    <div class="w-full max-w-2xl bg-[#0f1419] border border-blue-900/30 rounded-xl shadow-xl overflow-hidden">
        <div class="px-6 py-4 border-b border-blue-900/20 flex items-center justify-between">
            <h3 class="text-lg font-bold text-white">{{ t('certifications.add_new') }}</h3>
            <button id="cert-close-btn" class="text-gray-400 hover:text-white">✕</button>
        </div>

        <form class="p-6 space-y-5" method="POST" action="{{ route('certifications.store') }}" enctype="multipart/form-data">
            @csrf
            @if($errors->getBag('store')->any())
                <div class="rounded-md border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-200">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach($errors->getBag('store')->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="space-y-1.5">
                <label class="block text-sm text-gray-400">{{ t('certifications.fields.title') }}</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full bg-[#0b1116] border border-blue-900/20 rounded-md px-3 py-2 text-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition" placeholder="{{ t('certifications.placeholders.title') }}" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-1.5">
                    <label class="block text-sm text-gray-400">{{ t('certifications.fields.issuer') }}</label>
                    <input type="text" name="issuer" value="{{ old('issuer') }}" class="w-full bg-[#0b1116] border border-blue-900/20 rounded-md px-3 py-2 text-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition" placeholder="{{ t('certifications.placeholders.issuer') }}" />
                </div>
                <div class="space-y-1.5">
                    <label class="block text-sm text-gray-400">{{ t('certifications.fields.date') }}</label>
                    <input type="date" name="date" value="{{ old('date') }}" lang="{{ app()->getLocale() }}" autocomplete="off" class="w-full bg-[#0b1116] border border-blue-900/20 rounded-md px-3 py-2 text-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition" />
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="block text-sm text-gray-400">{{ t('certifications.fields.url') }}</label>
                <input type="url" name="url" value="{{ old('url') }}" autocomplete="off" inputmode="url" class="w-full bg-[#0b1116] border border-blue-900/20 rounded-md px-3 py-2 text-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition" placeholder="{{ t('certifications.placeholders.url') }}" />
            </div>

            <div class="space-y-1.5">
                <label class="block text-sm text-gray-400">{{ t('certifications.fields.image') }}</label>
                <div class="flex flex-col gap-2 sm:flex-row sm:items-center">
                    <input id="cert-image" type="file" name="image" accept="image/*" class="hidden" />
                    <button type="button" id="cert-image-btn" class="inline-flex items-center justify-center rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 transition">{{ t('certifications.fields.image_button') }}</button>
                    <span id="cert-image-name" class="text-sm text-gray-400">{{ t('certifications.fields.image_selected') }}</span>
                </div>
            </div>

            <div class="pt-4 border-t border-blue-900/20 space-y-1.5">
                <label class="block text-sm text-gray-400">{{ t('certifications.fields.secret_prompt') }}</label>
                <input type="password" name="secret" class="w-full bg-[#0b1116] border border-blue-900/20 rounded-md px-3 py-2 text-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 outline-none transition" placeholder="{{ t('certifications.placeholders.secret') }}" />
            </div>

            <div class="flex items-center justify-end gap-2 pt-2">
                <button type="button" id="cert-cancel" class="px-4 py-2 rounded-md bg-gray-700 text-gray-200 hover:bg-gray-600">{{ t('actions.cancel') }}</button>
                <button type="submit" id="cert-submit" class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700">{{ t('actions.save') }}</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete modal -->
<div id="cert-delete-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 {{ session('open_cert_delete_modal') || $errors->getBag('destroy')->any() ? '' : 'hidden' }}"></div>
<div id="cert-delete-modal" class="fixed inset-0 z-50 flex items-start pt-24 justify-center px-4 sm:px-6 lg:px-8 {{ session('open_cert_delete_modal') || $errors->getBag('destroy')->any() ? '' : 'hidden' }}">
    <div class="w-full max-w-lg bg-[#0f1419] border border-blue-900/30 rounded-xl shadow-xl overflow-hidden">
        <div class="px-6 py-4 border-b border-blue-900/20 flex items-center justify-between">
            <h3 class="text-lg font-bold text-white">{{ t('certifications.delete.title') }}</h3>
            <button type="button" id="cert-delete-close" class="text-gray-400 hover:text-white" aria-label="{{ t('certifications.delete.aria_close') }}">✕</button>
        </div>

        <form id="cert-delete-form" class="p-6 space-y-4" method="POST" action="">
            @csrf
            @method('DELETE')

            @if($errors->getBag('destroy')->any())
                <div class="rounded-md border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-200">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach($errors->getBag('destroy')->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <p id="cert-delete-title" class="text-sm text-gray-300"></p>

            <div>
                <label class="block text-sm text-gray-400 mb-1">{{ t('certifications.fields.secret_prompt') }}</label>
                <input type="password" name="secret" class="w-full bg-[#0b1116] border border-blue-900/20 rounded-md px-3 py-2 text-gray-200" placeholder="{{ t('certifications.delete.secret_placeholder') }}" />
            </div>

            <div class="flex items-center justify-end gap-2 pt-4 border-t border-blue-900/20">
                <button type="button" id="cert-delete-cancel" class="px-4 py-2 rounded-md bg-gray-700 text-gray-200 hover:bg-gray-600">{{ t('certifications.delete.cancel') }}</button>
                <button type="submit" class="px-4 py-2 rounded-md bg-red-600 text-white hover:bg-red-700">{{ t('certifications.delete.confirm') }}</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const openBtn = document.getElementById('cert-open-btn');
    const overlay = document.getElementById('cert-overlay');
    const modal = document.getElementById('cert-modal');
    const closeBtn = document.getElementById('cert-close-btn');
    const cancelBtn = document.getElementById('cert-cancel');
    const deleteOverlay = document.getElementById('cert-delete-overlay');
    const deleteModal = document.getElementById('cert-delete-modal');
    const deleteCloseBtn = document.getElementById('cert-delete-close');
    const deleteCancelBtn = document.getElementById('cert-delete-cancel');
    const deleteForm = document.getElementById('cert-delete-form');
    const deleteTitle = document.getElementById('cert-delete-title');
    const deleteButtons = document.querySelectorAll('.cert-delete-open');
    const imageInput = document.getElementById('cert-image');
    const imageButton = document.getElementById('cert-image-btn');
    const imageName = document.getElementById('cert-image-name');
    const deleteBaseAction = "{{ url('/certifications') }}";
    const deletePromptTemplate = @json(t('certifications.delete.prompt'));
    const deleteFallbackText = @json(t('certifications.delete.fallback'));

    function openModal() {
        if (overlay) overlay.classList.remove('hidden');
        if (modal) modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeModal() {
        if (overlay) overlay.classList.add('hidden');
        if (modal) modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function openDeleteModal(certId, certTitle) {
        if (deleteForm) deleteForm.action = `${deleteBaseAction}/${certId}`;
        if (deleteTitle) deleteTitle.textContent = certTitle ? deletePromptTemplate.replace(':title', certTitle) : deleteFallbackText;
        if (deleteOverlay) deleteOverlay.classList.remove('hidden');
        if (deleteModal) deleteModal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeDeleteModal() {
        if (deleteOverlay) deleteOverlay.classList.add('hidden');
        if (deleteModal) deleteModal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    if (openBtn) openBtn.addEventListener('click', openModal);
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (cancelBtn) cancelBtn.addEventListener('click', closeModal);
    if (overlay) overlay.addEventListener('click', closeModal);
    if (deleteCloseBtn) deleteCloseBtn.addEventListener('click', closeDeleteModal);
    if (deleteCancelBtn) deleteCancelBtn.addEventListener('click', closeDeleteModal);
    if (deleteOverlay) deleteOverlay.addEventListener('click', closeDeleteModal);

    if (imageButton && imageInput) {
        imageButton.addEventListener('click', function () {
            imageInput.click();
        });
    }

    if (imageInput && imageName) {
        imageInput.addEventListener('change', function () {
            imageName.textContent = imageInput.files && imageInput.files.length > 0
                ? imageInput.files[0].name
                : @json(t('certifications.fields.image_selected'));
        });
    }

    if (modal && !modal.classList.contains('hidden')) {
        document.body.classList.add('overflow-hidden');
    }

    if (deleteModal && !deleteModal.classList.contains('hidden')) {
        document.body.classList.add('overflow-hidden');
    }

    deleteButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            openDeleteModal(button.dataset.certId, button.dataset.certTitle);
        });
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeModal();
        if (e.key === 'Escape') closeDeleteModal();
    });
});
</script>
@endsection
