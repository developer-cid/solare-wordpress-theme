document.addEventListener("DOMContentLoaded", () => {
    const faqItems = document.querySelectorAll(".faq-item");

    if (!faqItems.length) {
        return;
    }

    faqItems.forEach((item) => {
        const button = item.querySelector(".faq-button");

        if (!button) {
            return;
        }

        button.setAttribute("aria-expanded", "false");

        button.addEventListener("click", () => {
            const wasOpen = item.classList.contains("open");

            faqItems.forEach((faqItem) => {
                faqItem.classList.remove("open");

                const faqButton =
                    faqItem.querySelector(".faq-button");

                if (faqButton) {
                    faqButton.setAttribute(
                        "aria-expanded",
                        "false"
                    );
                }
            });

            if (!wasOpen) {
                item.classList.add("open");

                button.setAttribute(
                    "aria-expanded",
                    "true"
                );
            }
        });
    });
});