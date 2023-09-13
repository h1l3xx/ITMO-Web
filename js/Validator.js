function validateX(){
    let checkboxes = document.querySelectorAll('input[type=checkbox]')
    for (let checkbox of checkboxes){
        if(checkbox.checked){
            return true;
        }
    }
    checkboxes[4].setCustomValidity("Выберите значние.");
    checkboxes[4].reportValidity();

    return false;
}

function validateY() {
    let value = document.getElementById("Y_input");
    let y = value.value.replace(',', '.');
    if (!checkNum(y) || parseFloat(y) > 3 || parseFloat(y) < -5) {


        value.setCustomValidity("Указанное значение должно быть между -5 и 3.");

        value.reportValidity();


        return false;
    } else {
        value.setCustomValidity("");
        value.reportValidity();

        return true;
    }

}

function checkNum(value) {
    return !isNaN(parseFloat(value)) && isFinite(value);
}