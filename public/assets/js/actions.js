// 1: download
$(document).on("click", ".download--btn", function () {
    // 1.2: getDownloadSection
    section = $(this).attr("data-download");
    document.fonts.ready.then(() => {
        html2canvas(document.querySelector(section), {
            useCORS: true,
        }).then((canvas) => {
            // :: createLink
            invoiceLink = document.createElement("a");
            invoiceLink.id = "temporary--link";
            invoiceLink.href = canvas.toDataURL("image/png");
            invoiceLink.download = "invoice.png";
            document.body.appendChild(invoiceLink); // Append to DOM if necessary
            // document.getElementById("invoice--main").appendChild(invoiceLink);
            invoiceLink.click();
        });
    });
});

// 3: closeModal
window.addEventListener("closeModal", (event) => {
    // 1: get closeButtonParams
    closeModalButton = event.detail.modal;
    $(closeModalButton).trigger("click");
});

$(document).ready(function () {
    document
        .querySelectorAll('[data-bs-toggle="tooltip"]')
        .forEach((el) => new bootstrap.Tooltip(el));
});
