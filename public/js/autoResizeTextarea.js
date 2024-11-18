document.addEventListener("DOMContentLoaded", function () {
    const textareas = document.querySelectorAll("textarea");

    textareas.forEach(textarea => {
        textarea.addEventListener("input", function () {
            this.style.height = "auto";
            this.style.height = (this.scrollHeight) + "px";
        });

        // Reset height on form submit
        textarea.form.addEventListener("submit", function () {
            textarea.style.height = "auto";
        });
    });
});
