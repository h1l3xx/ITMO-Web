window.onload = function () {
    let canvas = new Canvas();
    canvas.drawGraph();
    let button = document.querySelector("input[type=text]");
    button.addEventListener("input", validateY);
    button.addEventListener("focus", validateY);





    let checkboxes = document.querySelectorAll('input[type=checkbox]')
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener("click", () => {
            checkboxes.forEach((check) => {
                if (check !== checkbox) {
                    check.checked = false;
                }
            });
        });
    });

    document.getElementById('checkButton').onclick = function (){
        if (validateY() && validateX()) {
            let x = document.querySelector('input[type="checkbox"]:checked').value;
            let y = document.getElementById("Y_input").value.replace(',', '.');
            let r = document.querySelector('input[type="radio"]:checked').value;
            $.ajax({
                type: 'GET',
                url: '/php/check.php',
                async: false,
                data: { "x": x, "y": y, "r": r},
                success: function (serverAnswer){
                    console.log(serverAnswer)
                    const jsonObject = JSON.parse(serverAnswer);
                    document.getElementById("resultContainer").innerHTML = jsonObject.html;
                    canvas.drawWithDot(
                        jsonObject.xCoef,
                        jsonObject.yCoef,
                    );
                }
            });
        }
    }
};
