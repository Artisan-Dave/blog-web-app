import TomSelect from "tom-select";
import "tom-select/dist/css/tom-select.bootstrap5.min.css";
import "tom-select/dist/js/plugins/remove_button.js"; // ✅ add the remove button plugin

document.addEventListener("DOMContentLoaded", () => {
    const selectElements = document.querySelectorAll(".tom-select");

    selectElements.forEach((el) => {
        new TomSelect(el, {
            plugins: {
                remove_button: {
                    title: 'Remove this item',
                },
            },
            persist: false,
            create: false, // true = allow adding new items
            sortField: {
                
                field: "text",
                direction: "asc",
            },
            placeholder: "Select options...",
        });
    });

});
