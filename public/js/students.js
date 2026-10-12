(function () {
    // sort dropdown
    var dropdown = document.querySelector('.dropdown');
    var toggle = document.getElementById('viewAllToggle');

    if (dropdown && toggle) {
        toggle.addEventListener('click', function (e) {
            e.stopPropagation();
            dropdown.classList.toggle('open');
        });
        document.addEventListener('click', function () {
            dropdown.classList.remove('open');
        });
    }

    // delete modal
    var modal = document.getElementById('deleteModal');
    var text = document.getElementById('deleteModalText');
    var cancelBtn = document.getElementById('deleteCancel');
    var confirmBtn = document.getElementById('deleteConfirm');
    var pendingForm = null;

    function closeModal() {
        modal.hidden = true;
        pendingForm = null;
    }

    document.querySelectorAll('form[data-delete-name]').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            pendingForm = form;
            text.textContent = 'Are you sure you want to delete ' + form.dataset.deleteName + '? This can\'t be undone.';
            modal.hidden = false;
        });
    });

    if (modal) {
        cancelBtn.addEventListener('click', closeModal);
        confirmBtn.addEventListener('click', function () {
            if (pendingForm) pendingForm.submit();
        });
        modal.addEventListener('click', function (e) {
            if (e.target === modal) closeModal();
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeModal();
        });
    }
})();