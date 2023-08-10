function showAlert(alertId) {
    var alert = document.getElementById(alertId);
    if (alert) {
        setTimeout(function () {
            alert.classList.add("show");
            setTimeout(function () {
                alert.classList.remove("show");
            }, 5000);
        }, 100);
    }
}

document.addEventListener("DOMContentLoaded", function () {
    showAlert("success-alert");
    showAlert("error-alert");
});
