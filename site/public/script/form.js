const stepContainer = document.getElementById("step-container");
const addStepCheckbox = document.getElementById("add-step-checkbox");

addStepCheckbox.addEventListener("change", () => {
    if (addStepCheckbox.checked) {
        const newStepField = document.createElement("div");
        newStepField.classList.add("input-icons");
        const stepNumber = stepContainer.children.length + 1;
        newStepField.innerHTML = `
            <i class="fa-solid fa-book icon"></i>
            <textarea class="input-field" type="text" id="steps-${stepNumber}" name="steps[]" placeholder="Schrijf hier wat je moet doen"></textarea>
        `;
        stepContainer.appendChild(newStepField);
        addStepCheckbox.checked = false;
        addStepCheckbox.disabled = false;
    } else {
        addStepCheckbox.disabled = true;
    }
});