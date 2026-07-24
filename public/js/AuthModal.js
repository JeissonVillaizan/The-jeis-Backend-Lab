const openModal = document.querySelectorAll('[data-modal="open-modal"]');
const modalScript = document.getElementById("modalTranslations");
const modalTranslations = JSON.parse(modalScript.innerText);

openModal.forEach((button) => {
    button.addEventListener("click", (e) => {
        const element = e.target;
        const id = element.getAttribute("data-id");
        const behavior = element.getAttribute("data-behavior");
        openSubmitModal(id, behavior);
    });
});

document
    .querySelector("#saveTranslation-form")
    ?.addEventListener("submit", (e) => {
        e.preventDefault();
        let isEmptyField = false;
        const formData = new FormData(e.target);
        const dataObject = Object.fromEntries(formData.entries());
        Object.values(dataObject).forEach((value) => {
            if (value.trim() === "") {
                isEmptyField = true;
            }
        });

        if (isEmptyField) {
            alert("Please fill in all fields.");
            return;
        }

        openSubmitModal(null, "saveTranslation", dataObject);
    });

function openSubmitModal(id = null, behavior, data = null) {
    const container = document.querySelector("#overlay");

    container.innerHTML = `

    <form class="w-full max-w-lg bg-gradient-to-br from-[#1a2942] to-[#0f1419] border border-blue-900/30 rounded-xl shadow-xl overflow-hidden">

        <div class="px-6 py-4 border-b border-blue-900/20 flex items-center justify-between">
            <h3 class="text-lg font-bold text-white">
                ${modalTranslations.confirmChanges}
            </h3>

            <button type="button"
                    id="translation-close"
                    data-modal="close-modal"
                    class="text-gray-400 hover:text-white">
                ✕
            </button>
        </div>

        <div class="p-6 space-y-4">

            <p class="text-sm text-gray-300">
               ${modalTranslations.passwordDescription} 
            </p>

            <div>
                <label class="block text-sm text-gray-400 mb-1">
                  ${modalTranslations.password}  
                </label>

                <input
                    id="modal-secret"
                    name="secret"
                    type="password"
                    class="w-full bg-[#0b1116] border border-blue-900/20 rounded-md px-3 py-2 text-gray-200"
                    placeholder="Password" />

                    <p class="mt-2 text-sm text-red-300">
                        {{ $message }}
                    </p>
            </div>

            <div class="flex items-center justify-end gap-2 pt-4 border-t border-blue-900/20">
                <button type="button"
                        id="translation-cancel"
                        data-modal="close-modal"
                        class="px-4 py-2 rounded-md bg-gray-700 text-gray-200 hover:bg-gray-600">
                    ${modalTranslations.cancel}
                </button>

                <button type="submit"
                        id="translation-confirm"
                        class=" px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700">
                    ${modalTranslations.confirm}
                </button>
            </div>

        </div>
    </form>
            `;

    container.classList.remove("hidden");

    container
        .querySelector('[data-modal="close-modal"]')
        .addEventListener("click", () => {
            closeModal(container);
        });

    container.addEventListener("click", (e) => {
        if (event.target === event.currentTarget) {
            closeModal(container);
        }
    });

    const form = container.querySelector("form");
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
                    alert(data.message);
                    closeModal(container);
                } else {
                    alert(data.message);
                }
            });
    });
}

function closeModal(container) {
    container.classList.add("hidden");
}
