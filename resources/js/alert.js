document.addEventListener("DOMContentLoaded", function () {
    const acceptButton = document.querySelector("#accept-button");
    const modalBackdrop = document.querySelector("#alert-modal");

    if(acceptButton){
        const showModal = () => {
            modalBackdrop.style.display = "flex";
            modalBackdrop.style.opacity = 0;
            setTimeout(() => {
                modalBackdrop.style.opacity = 1;
            }, 0); 
        };
        
        const hideModal = () => {
            modalBackdrop.style.opacity = 0;
            setTimeout(() => {
                modalBackdrop.style.display = "none";
            }, 200);
        };

        showModal();
        acceptButton.addEventListener("click", hideModal);
        modalBackdrop.addEventListener("click", (event) => {
            if (event.target.id === "alert-modal") {
                hideModal();
            }
        });        
    }
});
