// 1: initSelect on ready
$(document).ready(function () {
    $(".form--select").each(function () {
        if (!$(this).hasClass("select2-hidden-accessible")) {
            setupValue = $(this).attr("value");
            setupClear = $(this).attr("data-clear") ? true : false;
            setupPlaceholder = $(this).attr("data-placeholder");
            setupTrigger = $(this).attr("data-trigger") ? true : false;
            setupTags = $(this).attr("data-tags") ? true : false;

            if (setupValue == undefined) {
                $(this).select2({
                    allowClear: setupClear,
                    placeholder: setupPlaceholder ? setupPlaceholder : "",
                    tags: setupTags,
                });
            } else {
                $(this)
                    .val(setupValue)
                    .select2({
                        allowClear: setupClear,
                        placeholder: setupPlaceholder ? setupPlaceholder : "",
                        tags: setupTags,
                    });
            } // end else

            if (setupTrigger) $(this).trigger("change");
        } // end if
    }); // end loop

    $(".form--modal-select").each(function () {
        if (!$(this).hasClass("select2-hidden-accessible")) {
            setupValue = $(this).attr("value");
            setupClear = $(this).attr("data-clear") ? true : false;
            setupModal = $(this).attr("data-modal");
            setupPlaceholder = $(this).attr("data-placeholder");
            setupTrigger = $(this).attr("data-trigger") ? true : false;
            setupTags = $(this).attr("data-tags") ? true : false;

            if (setupValue == undefined) {
                $(this).select2({
                    dropdownParent: $(setupModal),
                    allowClear: setupClear,
                    placeholder: setupPlaceholder ? setupPlaceholder : "",
                    tags: setupTags,
                });
            } else {
                $(this)
                    .val(setupValue)
                    .select2({
                        dropdownParent: $(setupModal),
                        allowClear: setupClear,
                        placeholder: setupPlaceholder ? setupPlaceholder : "",
                        tags: setupTags,
                    });
            } // end else

            if (setupTrigger) $(this).trigger("change");
        } // end if
    }); // end loop
}); // end function

// -------------------------------------------------------------

// 2: initSelect on navigate
document.addEventListener(
    "livewire:navigated",
    function () {
        $(document).ready(function () {
            $(".form--select").each(function () {
                setupValue = $(this).attr("value");
                setupClear = $(this).attr("data-clear") ? true : false;
                setupPlaceholder = $(this).attr("data-placeholder");
                setupTrigger = $(this).attr("data-trigger") ? true : false;
                setupTags = $(this).attr("data-tags") ? true : false;

                if (setupValue == undefined) {
                    $(this).select2({
                        allowClear: setupClear,
                        placeholder: setupPlaceholder ? setupPlaceholder : "",
                        tags: setupTags,
                    });
                } else {
                    $(this)
                        .val(setupValue)
                        .select2({
                            allowClear: setupClear,
                            placeholder: setupPlaceholder
                                ? setupPlaceholder
                                : "",
                            tags: setupTags,
                        });
                } // end else

                if (setupTrigger) $(this).trigger("change");
            }); // end loop

            $(".form--modal-select").each(function () {
                setupValue = $(this).attr("value");
                setupClear = $(this).attr("data-clear") ? true : false;
                setupModal = $(this).attr("data-modal");
                setupPlaceholder = $(this).attr("data-placeholder");
                setupTrigger = $(this).attr("data-trigger") ? true : false;
                setupTags = $(this).attr("data-tags") ? true : false;

                if (setupValue == undefined) {
                    $(this).select2({
                        dropdownParent: $(setupModal),
                        allowClear: setupClear,
                        placeholder: setupPlaceholder ? setupPlaceholder : "",
                        tags: setupTags,
                    });
                } else {
                    $(this)
                        .val(setupValue)
                        .select2({
                            dropdownParent: $(setupModal),
                            allowClear: setupClear,
                            placeholder: setupPlaceholder
                                ? setupPlaceholder
                                : "",
                            tags: setupTags,
                        });
                } // end else

                if (setupTrigger) $(this).trigger("change");
            }); // end loop
        }); // end function
    },
    false
);

// -------------------------------------------------------------

// 4: initSelect
window.addEventListener("initSelect", (event) => {
    $(document).ready(function () {
        $(".form--select").each(function () {
            setupValue = $(this).attr("value");
            setupClear = $(this).attr("data-clear") ? true : false;
            setupPlaceholder = $(this).attr("data-placeholder");
            setupTrigger = $(this).attr("data-trigger") ? true : false;

            if (setupValue == undefined) {
                $(this).select2({
                    allowClear: setupClear,
                    placeholder: setupPlaceholder ? setupPlaceholder : "",
                });
            } else {
                $(this)
                    .val(setupValue)
                    .select2({
                        allowClear: setupClear,
                        placeholder: setupPlaceholder ? setupPlaceholder : "",
                    });
            } // end else

            if (setupTrigger) $(this).trigger("change");
        }); // end loop

        $(".form--modal-select").each(function () {
            setupValue = $(this).attr("value");
            setupClear = $(this).attr("data-clear") ? true : false;
            setupModal = $(this).attr("data-modal");
            setupPlaceholder = $(this).attr("data-placeholder");
            setupTrigger = $(this).attr("data-trigger") ? true : false;

            if (setupValue == undefined) {
                $(this).select2({
                    dropdownParent: setupModal,
                    allowClear: setupClear,
                    placeholder: setupPlaceholder ? setupPlaceholder : "",
                });
            } else {
                $(this)
                    .val(setupValue)
                    .select2({
                        dropdownParent: setupModal,
                        allowClear: setupClear,
                        placeholder: setupPlaceholder ? setupPlaceholder : "",
                    });
            } // end else

            if (setupTrigger) $(this).trigger("change");
        }); // end loop
    });
});

// -------------------------------------------------------------

// 4.5: initNewSelect
window.addEventListener("initNewSelect", (event) => {
    $(document).ready(function () {
        $(".form--select").each(function () {
            if (!$(this).hasClass("select2-hidden-accessible")) {
                setupValue = $(this).attr("value");
                setupClear = $(this).attr("data-clear") ? true : false;
                setupPlaceholder = $(this).attr("data-placeholder");
                setupTrigger = $(this).attr("data-trigger") ? true : false;

                if (setupValue == undefined) {
                    $(this).select2({
                        allowClear: setupClear,
                        placeholder: setupPlaceholder ? setupPlaceholder : "",
                    });
                } else {
                    $(this)
                        .val(setupValue)
                        .select2({
                            allowClear: setupClear,
                            placeholder: setupPlaceholder
                                ? setupPlaceholder
                                : "",
                        });
                } // end else

                if (setupTrigger) $(this).trigger("change");
            } // end if
        }); // end loop

        $(".form--modal-select").each(function () {
            if (!$(this).hasClass("select2-hidden-accessible")) {
                setupValue = $(this).attr("value");
                setupClear = $(this).attr("data-clear") ? true : false;
                setupModal = $(this).attr("data-modal");
                setupPlaceholder = $(this).attr("data-placeholder");
                setupTrigger = $(this).attr("data-trigger") ? true : false;

                if (setupValue == undefined) {
                    $(this).select2({
                        dropdownParent: setupModal,
                        allowClear: setupClear,
                        placeholder: setupPlaceholder ? setupPlaceholder : "",
                    });
                } else {
                    $(this)
                        .val(setupValue)
                        .select2({
                            dropdownParent: setupModal,
                            allowClear: setupClear,
                            placeholder: setupPlaceholder
                                ? setupPlaceholder
                                : "",
                        });
                } // end else

                if (setupTrigger) $(this).trigger("change");
            } // end if
        }); // end loop
    });
});

// -------------------------------------------------------------

// 5: initChildSelect
window.addEventListener("initChildSelect", (event) => {
    $(document).ready(function () {
        $(".child-select").each(function () {
            if (!$(this).hasClass("select2-hidden-accessible")) {
                setupClear = $(this).attr("data-clear") ? true : false;
                setupPlaceholder = $(this).attr("data-placeholder");
                setupTrigger = $(this).attr("data-trigger") ? true : false;

                $(this).select2({
                    allowClear: setupClear,
                    placeholder: setupPlaceholder ? setupPlaceholder : "",
                });
            } // end if
        }); // end loop

        $(".child-modal-select").each(function () {
            if (!$(this).hasClass("select2-hidden-accessible")) {
                setupModal = $(this).attr("data-modal");
                setupClear = $(this).attr("data-clear") ? true : false;
                setupPlaceholder = $(this).attr("data-placeholder");
                setupTrigger = $(this).attr("data-trigger") ? true : false;

                $(this).select2({
                    dropdownParent: setupModal,
                    allowClear: setupClear,
                    placeholder: setupPlaceholder ? setupPlaceholder : "",
                });
            } // end if
        }); // end loop
    });
});

// -------------------------------------------------------------

// 5: resetSelect
window.addEventListener("resetSelect", (event) => {
    $(document).ready(function () {
        $(".form--modal-select").each(function () {
            $(this).val("").trigger("change");
        }); // end loop
    });
});

window.addEventListener("resetFormSelect", (event) => {
    $(document).ready(function () {
        $("form .form--select").each(function () {
            $(this).val("").trigger("change");
        }); // end loop
    });
});

// -------------------------------------------------------------

// 5.5: destroyModalSelect
window.addEventListener("destroyModalSelect", (event) => {
    $(document).ready(function () {
        $(".form--modal-select").each(function () {
            $(this).select2("destroy");
        }); // end loop
    });
});

// -------------------------------------------------------------

// 6: initEditSelect
window.addEventListener("setSelect", (event) => {
    $(document).ready(function () {
        selectId = event.detail.id;
        setupValue = event.detail.value;
        setupDelay = event.detail.delay ? true : false;

        setupClear = $(selectId).attr("data-clear") ? true : false;
        setupModal = $(selectId).attr("data-modal");
        setupPlaceholder = $(selectId).attr("data-placeholder");
        setupTrigger = $(selectId).attr("data-trigger") ? true : false;
        setupValueChild = null;

        if (setupDelay) {
            // ::clone
            setupValueChild = setupValue;

            $(selectId)
                .val(setupValueChild)
                .select2({
                    dropdownParent: setupModal,
                    allowClear: setupClear,
                    placeholder: setupPlaceholder ? setupPlaceholder : "",
                });
        } else {
            $(selectId)
                .val(setupValue)
                .select2({
                    dropdownParent: setupModal,
                    allowClear: setupClear,
                    placeholder: setupPlaceholder ? setupPlaceholder : "",
                });
        } // end if

        if (setupTrigger) $(selectId).trigger("change");
    });
});

// -------------------------------------------------------------

// 6: initEditSelect
window.addEventListener("setSelectOptions", (event) => {
    $(document).ready(function () {
        selectId = event.detail.id;
        setupValue = event.detail.value;
        setupDelay = event.detail.delay ? true : false;

        setupClear = $(selectId).attr("data-clear") ? true : false;
        setupModal = $(selectId).attr("data-modal");
        setupPlaceholder = $(selectId).attr("data-placeholder");
        setupTrigger = $(selectId).attr("data-trigger") ? true : false;
        setupValueChild = null;

        if (setupDelay) {
            // ::clone
            setupValueChild = setupValue;

            $(selectId)
                .val(setupValueChild)
                .select2({
                    dropdownParent: setupModal,
                    allowClear: setupClear,
                    placeholder: setupPlaceholder ? setupPlaceholder : "",
                });
        } else {
            $(selectId)
                .val(setupValue)
                .select2({
                    dropdownParent: setupModal,
                    allowClear: setupClear,
                    placeholder: setupPlaceholder ? setupPlaceholder : "",
                });
        } // end if

        if (setupTrigger) $(selectId).trigger("change");
    });
});

// -------------------------------------------------------------

// 6.5: mirrorSelect
window.addEventListener("mirrorSelect", (event) => {
    $(document).ready(function () {
        selectClass = event.detail.class;
        setupValue = event.detail.value;

        $(selectClass).each(function () {
            setupClear = $(this).attr("data-clear") ? true : false;
            setupPlaceholder = $(this).attr("data-placeholder");
            setupTrigger = $(this).attr("data-trigger") ? true : false;

            $(this)
                .val(setupValue)
                .select2({
                    allowClear: setupClear,
                    placeholder: setupPlaceholder ? setupPlaceholder : "",
                });

            if (setupTrigger) $(this).trigger("change");
        }); // end loop
    });
});

// -------------------------------------------------------------
// -------------------------------------------------------------

// 7: refreshSelect with Dynamic Content - childSelect
window.addEventListener("refreshSelect", (event) => {
    $(document).ready(function () {
        selectId = event.detail.id;
        var data = event.detail.data;

        // setupValue = $(selectId).select2("val");
        setupValue = $(selectId).attr("value");
        setupClear = $(selectId).attr("data-clear") ? true : false;
        setupModal = $(selectId).attr("data-modal");
        setupPlaceholder = $(selectId).attr("data-placeholder");
        setupTrigger = $(selectId).attr("data-trigger") ? true : false;

        // :: removePrevious
        if ($(selectId).hasClass("select2-hidden-accessible")) {
            $(selectId).empty();
        } // end if

        // :: initNew
        $(selectId)
            .select2({
                dropdownParent: setupModal,
                allowClear: setupClear,
                placeholder: setupPlaceholder ? setupPlaceholder : "",
                data: data,
            })
            .val(setupValue);

        if (setupTrigger) $(selectId).trigger("change");
    });
});

// -------------------------------------------------------------
// -------------------------------------------------------------

// 7: refreshSelect with Dynamic Content - childSelect
window.addEventListener("refreshSelectWithValues", (event) => {
    $(document).ready(function () {
        selectId = event.detail.id;
        var data = event.detail.data;
        value = event.detail.value;

        console.log(value);
        setupValue = value;
        setupClear = $(selectId).attr("data-clear") ? true : false;
        setupModal = $(selectId).attr("data-modal");
        setupPlaceholder = $(selectId).attr("data-placeholder");
        setupTrigger = $(selectId).attr("data-trigger") ? true : false;

        // :: removePrevious
        if ($(selectId).hasClass("select2-hidden-accessible")) {
            $(selectId).empty();
        } // end if

        // :: initNew
        $(selectId)
            .select2({
                dropdownParent: setupModal,
                allowClear: setupClear,
                placeholder: setupPlaceholder ? setupPlaceholder : "",
                data: data,
            })
            .val(setupValue);

        if (setupTrigger) $(selectId).trigger("change");
    });
});

// -------------------------------------------------------------
// -------------------------------------------------------------

// 6: refreshSelect with Dynamic Content - childSelect
window.addEventListener("refreshRawSelect", (event) => {
    $(document).ready(function () {
        selectId = event.detail.id;

        setupValue = $(selectId).select2("val");
        setupClear = $(selectId).attr("data-clear") ? true : false;
        setupModal = $(selectId).attr("data-modal");
        setupPlaceholder = $(selectId).attr("data-placeholder");
        setupTrigger = $(selectId).attr("data-trigger") ? true : false;

        // :: re-init
        $(selectId)
            .val(setupValue)
            .select2({
                dropdownParent: setupModal,
                allowClear: setupClear,
                placeholder: setupPlaceholder ? setupPlaceholder : "",
            });

        if (setupTrigger) $(selectId).trigger("change");
    });
});

window.addEventListener("refreshRawSelectUsingValue", (event) => {
    $(document).ready(function () {
        selectId = event.detail.id;

        setupValue = $(selectId).attr("value");
        setupClear = $(selectId).attr("data-clear") ? true : false;
        setupModal = $(selectId).attr("data-modal");
        setupPlaceholder = $(selectId).attr("data-placeholder");
        setupTrigger = $(selectId).attr("data-trigger") ? true : false;

        // :: re-init
        $(selectId)
            .val(setupValue)
            .select2({
                dropdownParent: setupModal,
                allowClear: setupClear,
                placeholder: setupPlaceholder ? setupPlaceholder : "",
            });

        if (setupTrigger) $(selectId).trigger("change");
    });
});
