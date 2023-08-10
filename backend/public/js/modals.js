document.addEventListener('DOMContentLoaded', function () {
    function showModal(route, modalId, formConfirmId, btnCloseId) {
        const modal = document.getElementById(modalId);
        const confirm = document.getElementById(formConfirmId);
        const btnClose = document.getElementById(btnCloseId);
        modal.classList.toggle('hidden');
        confirm.action = route
        btnClose.addEventListener('click', function () {
            modal.classList.add('hidden')
        });
    }

    window.actionModal = function(route, modalId, formConfirmId, btnCloseId) {
        showModal(route, modalId, formConfirmId, btnCloseId);
    }
});
