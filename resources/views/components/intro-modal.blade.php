<script>
    if (document.cookie.split('; ').some(row => row.startsWith('intro_seen='))) {
        document.documentElement.classList.add('hide-intro');
    }
</script>
<style>
    .hide-intro .intro-modal {
        display: none;
    }

    @keyframes pulseGlow {

        0%,
        100% {
            opacity: 0.5;
            transform: scale(1);
        }

        50% {
            opacity: 1;
            transform: scale(1.05);
        }
    }

    .animate-glow {
        animation: pulseGlow 1.5s infinite ease-in-out;
    }

    .loader {
        perspective: 600px;
        width: 200px;
        height: 200px;
    }

    .cube {
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        animation: rotate 10s linear infinite;
    }

    .face {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, #4f46e580, #06b6d480);
        opacity: 0.8;
        border: 0.5px solid var(--gradient-via);
        --size: 400px;
    }

    .dark .face {
        background: linear-gradient(45deg, #3b82f680, #ec489980);
    }

    .face:nth-child(1) {
        transform: rotateX(90deg) translateZ(var(--size));
    }

    .face:nth-child(2) {
        transform: rotateX(-90deg) translateZ(var(--size));
    }

    .face:nth-child(3) {
        transform: translateZ(var(--size));
    }

    .face:nth-child(4) {
        transform: rotateY(90deg) translateZ(var(--size));
    }

    .face:nth-child(5) {
        transform: rotateY(-90deg) translateZ(var(--size));
    }

    .face:nth-child(6) {
        transform: rotateY(180deg) translateZ(var(--size));
    }

    @keyframes rotate {
        0% {
            transform: rotateX(0deg) rotateY(0deg);
        }

        100% {
            transform: rotateX(360deg) rotateY(360deg);
        }
    }

    .curtain-reveal {
        /* 0.8s es la duración total de la animación */
        animation: curtainUp 0.8s cubic-bezier(0.5, 0, 0.2, 1) forwards;
    }

    @keyframes curtainUp {
        0% {
            transform: translateY(0);
        }

        30% {
            /* Se mueve ligeramente hacia abajo preparándose para el impulso */
            transform: translateY(30px);
        }

        100% {
            /* Se desliza por completo hacia arriba fuera de la pantalla */
            transform: translateY(-100%);
            visibility: hidden;
        }
    }
</style>

<div id='intro-modal' class="intro-modal fixed inset-0 z-50 hidden items-center justify-center">

    <div id="intro-card"
        class="relative cardGradient isolate overflow-hidden text-slate-900 dark:text-white w-full  text-center w-full h-screen flex flex-col items-center justify-center p-6 bg-slate-300 dark:bg-slate-950">
        <div class="loader -z-10 absolute justify-center items-center blur-[10px] opacity-50 pointer-events-none ">
            <div class="cube">
                <div class="face"></div>
                <div class="face"></div>
                <div class="face"></div>
                <div class="face"></div>
                <div class="face"></div>
                <div class="face"></div>
            </div>
        </div>
        <div class="  mx-auto flex justify-center mb-6 ">
            <svg class=" w-32 h-32" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4"
                    d="M12 2l8 4.5v9L12 20l-8-4.5v-9L12 2z"></path>
                <path stroke="currentColor" stroke-width="0.9" stroke-linecap="round" fill="none" d="M13.5 8V13.5H10">
                </path>
                <circle cx="13.5" cy="8" r="1" fill="currentColor"></circle>
                <circle cx="13.5" cy="13.5" r="1" fill="currentColor"></circle>
                <circle cx="10" cy="13.5" r="1" fill="currentColor"></circle>
            </svg>
        </div>
        <h1 class="text-4xl font-bold mb-2">{{ t('intro.title') }}</h1>
        <p class="text-slate-600 dark:text-slate-300 mb-4 max-w-xl text-lg relative z-10">{{ t('intro.description') }}
        </p>

        <div class="relative group">
            <button id="intro-close"
                class="relative  inline-block p-px font-semibold leading-6 text-white bg-gray-800 shadow-2xl cursor-pointer rounded-xl shadow-zinc-900 transition-transform duration-300 ease-in-out hover:scale-105 active:scale-95">
                <span
                    class="absolute inset-0 rounded-xl bg-gradient-to-r from-teal-400 via-blue-500 to-purple-500 p-[2px] opacity-0 transition-opacity duration-500 group-hover:opacity-100"></span>

                <span class="relative z-10 block px-6 py-3 rounded-xl bg-gray-950">
                    <div class="relative z-10 flex items-center space-x-2">
                        <span
                            class="transition-all duration-500 group-hover:translate-x-1">{{ t('intro.close') }}</span>
                        <svg class="w-6 h-6 transition-transform duration-500 group-hover:translate-x-1"
                            data-slot="icon" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd"
                                d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                                fill-rule="evenodd"></path>
                        </svg>
                    </div>
                </span>
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const introModal = document.getElementById('intro-modal');
        const introCard = document.getElementById('intro-card');
        const introCloseButton = document.getElementById('intro-close');

        function showIntroModal() {
            document.documentElement.classList.remove('hide-intro');
            if (introModal) {
                introModal.classList.add('flex');
                introModal.classList.remove('hidden');
            }
        }
        function hideIntroModal() {
            if (introModal) {
                introModal.classList.add('curtain-reveal');
                setTimeout(() => {
                    introModal.classList.remove('flex');
                    introModal.classList.add('hidden');
                    introModal.classList.remove('curtain-reveal');
                    document.body.style.overflow = 'auto';
                }, 800)


            }
        }
        if (!document.cookie.split('; ').some(row => row.startsWith('intro_seen='))) {
            showIntroModal();
        }
        if (introCloseButton) {
            introCloseButton.addEventListener('click', function () {
                // Set a temporal day cookie to remember that the intro has been seen
                //const expires = new Date(Date.now() + 86400000).toUTCString();
                //document.cookie = "intro_seen=true; expires=" + expires + "; path=/; SameSite=Lax";
                hideIntroModal();
            });
        }
    });
</script>