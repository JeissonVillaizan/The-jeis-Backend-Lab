const openModal = document.querySelectorAll('[data-modal="open-modal"]');
const modalScript = document.getElementById("modalTranslations");
const modalTranslations = JSON.parse(modalScript.innerText);
const container = document.querySelector("#overlay");

openModal.forEach((button) => {
    button.addEventListener("click", (e) => {
        const element = e.target;
        const id = element.getAttribute("data-id");
        const behavior = element.getAttribute("data-behavior");
        openSubmitModal(id, behavior);
    });
});

container.addEventListener("click", (overlayElement) => {
    if (overlayElement.target === overlayElement.currentTarget) {
        closeModal();
    }
});

document
    .querySelector("#saveTranslation-form")
    ?.addEventListener("submit", (e) => {
        e.preventDefault();
        let emptyFields = [];
        const formData = new FormData(e.target);
        const dataObject = Object.fromEntries(formData.entries());
        Object.values(dataObject).forEach((value, index) => {
            if (value.trim() === "") {
                emptyFields.push(index - 1);
            }
        });
        console.log("Empty fields:", emptyFields);
        if (emptyFields.length > 0) {
            for (const index of emptyFields) {
                console.log("Empty field index:", index);
                document.querySelector(`#key-error-${index}`).innerText =
                    modalTranslations.keyError;
            }

            return;
        }

        openSubmitModal(null, "saveTranslation", dataObject);
    });

function openSubmitModal(id = null, behavior, data = null) {
    container.innerHTML = `

<form class="w-full max-w-lg cardGradient border border-blue-900/30 rounded-xl shadow-xl overflow-hidden">

    <div class="px-6 py-4 border-b border-blue-900/20 flex items-center justify-between">
        <h3 class="text-lg font-bold text-slate-900 dark:text-white">
            ${modalTranslations.confirmChanges}
        </h3>

        <button type="button"
                id="translation-close"
                data-modal="close-modal"
                class="text-slate-400 hover:text-slate-900 dark:hover:text-white">
            ✕
        </button>
    </div>

    <div class="p-6 space-y-4">

        <p class="text-sm text-slate-600 dark:text-slate-300">
             ${modalTranslations.passwordDescription} 
        </p>

        <div>
            <label class="block text-sm text-slate-700 dark:text-slate-400 mb-1">
              ${modalTranslations.password}  
            </label>

            <input
                id="modal-secret"
                name="secret"
                type="password"
                class="w-full cardGradient border border-blue-900/20 rounded-md px-3 py-2 text-slate-900 dark:text-white placeholder-slate-400"
                placeholder="Password" />

                <p id="modal-error-message" class="mt-2 text-sm text-red-500 dark:text-red-300">
                    
                </p>
        </div>

        <div class="flex items-center justify-end gap-2 pt-4 border-t border-blue-900/20">
            <button type="button"
                    id="translation-cancel"
                    data-modal="close-modal"
                    class="px-4 py-2 rounded-md buttonSecondary">
                ${modalTranslations.cancel}
            </button>

            <button type="submit"
                    id="translation-confirm"
                    class="px-4 py-2 rounded-md buttonPrimary">
                ${modalTranslations.confirm}
            </button>
        </div>

    </div>
</form>
            `;

    container.classList.remove("hidden");

    const form = container.querySelector("form");
    form.querySelectorAll('[data-modal="close-modal"]').forEach((button) => {
        button.addEventListener("click", () => {
            closeModal();
        });
    });

    form.addEventListener("submit", (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const dataObject = Object.fromEntries(formData.entries());

        const endpoints = [
            {
                behavior: "saveTranslation",
                endpoint: "/settings/translations",
                method: "POST",
            },
            {
                behavior: "deleteTranslation",
                endpoint: "/settings/translations/",
                method: "DELETE",
            },
        ];

        const filteredEndpoint = endpoints.find(
            (obj) => obj.behavior === behavior,
        );

        if (id) {
            filteredEndpoint.endpoint += id;
        }
        const dataJSON = JSON.stringify(data, null, 2);
        const response = fetch(filteredEndpoint.endpoint, {
            method: filteredEndpoint.method,
            headers: {
                "Content-Type": "application/json",
                "X-secret": dataObject.secret,
            },
            body: dataJSON,
        })
            .then((response) => response.json())

            .then((data) => {
                if (data.success) {
                    document
                        .querySelector("#status-message")
                        .classList.remove("hidden");
                    document.querySelector("#status-message").innerText =
                        data.message;
                    closeModal();
                } else {
                    container.querySelector("#modal-error-message").innerText =
                        data.message;
                }
            });
    });
}

function closeModal() {
    container.classList.add("hidden");
    container.innerHTML = "";
}
