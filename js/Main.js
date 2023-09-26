window.onload = function () {
    let canvas = new Canvas();
    canvas.drawGraph();
    let button = document.querySelector("input[type=text]");
    button.addEventListener("input", validateY);
    button.addEventListener("focus", validateY);




    document.getElementById('checkButton').onclick = function (){
        if (validateY() && validateX()) {
            console.log( document.querySelectorAll('input[type="checkbox"]:checked'))
            let x = [];
            document.querySelectorAll('input[type="checkbox"]:checked').forEach(el => x.push(el.value))
            console.log(x)
            let y = document.getElementById("Y_input").value.replace(',', '.');
            let r = document.querySelector('input[type="radio"]:checked').value;
            canvas.drawGraph();
            x.forEach((X) => {
                $.ajax({
                    type: 'GET',
                    url: '/php/check.php',
                    async: false,
                    data: { "x": X, "y": y, "r": r},
                    success: function (serverAnswer){

                        console.log(serverAnswer);

                        // let host ="se.ifmo.ru/~s368475"

                        let host = 'http://localhost:63342';

                        let element = document.createElement("a");
                        let a = document.documentElement.appendChild(element)
                        a.href = `${host}/php/check.php`;
                        a.target = '_frame';

                        a.click();

                        canvas.drawWithDot( X/r, y/r );
                    }
                });
            })
        }
    }
};
