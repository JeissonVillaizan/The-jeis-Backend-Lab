const openModalButtons = document.querySelectorAll(".translation-open-modal");
const modalOverlay = document.getElementById("translation-modal-overlay");
const modalContainer = document.getElementById("translation-modal-container");
const closeModalButton = document.getElementById("translation-close");
const cancelModalButton = document.getElementById("translation-cancel");
const confirmModalButton = document.getElementById("translation-confirm");
const secretInput = document.getElementById("modal-secret");

console.log("AuthModal.js cargado");

if (modalOverlay) {
    let currentForm = null;

    openModalButtons.forEach((button) => {
        button.addEventListener("click", () => {
            currentForm = button.closest("form");

            modalOverlay.classList.remove("hidden");
            modalContainer.classList.remove("hidden");

            secretInput.value = "";
            secretInput.focus();
        });
    });

    closeModalButton.addEventListener("click", closeModal);
    cancelModalButton.addEventListener("click", closeModal);
    modalOverlay.addEventListener("click", closeModal);
    confirmModalButton.addEventListener("click", submitForm);

    function closeModal() {
        modalOverlay.classList.add("hidden");
        modalContainer.classList.add("hidden");
        secretInput.value = "";
    }

    function submitForm() {
        if (!currentForm) return;

        currentForm.querySelector('[name="secret"]').value = secretInput.value;
        currentForm.submit();
    }
}
