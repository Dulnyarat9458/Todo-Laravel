
document.addEventListener("DOMContentLoaded", function () {
    const cancelButton = document.querySelector("#cancel-button");
    const modalBackdrop = document.querySelector("#confirm-modal");
    const confirmButton = document.querySelector("#confirm-button"); 

    window.showModal = function() {
        modalBackdrop.style.display = "flex";
        modalBackdrop.style.opacity = 0;
        setTimeout(() => {
            modalBackdrop.style.opacity = 1;
        }, 0); 
    };
    
    window.hideModal = () => {
        modalBackdrop.style.opacity = 0;
        setTimeout(() => {
            modalBackdrop.style.display = "none";
        }, 200);
    };

    cancelButton.addEventListener("click", hideModal);
    
    confirmButton.addEventListener("click", () => {
        const target = confirmButton.getAttribute("data-target");
        document.getElementById(target).submit();
    });

    modalBackdrop.addEventListener("click", (event) => {
        if (event.target.id === "confirm-modal") {
            hideModal();
        }
    });
});
