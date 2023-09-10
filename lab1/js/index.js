const canvasPlot = document.getElementById('canvas_plot');
const ctx = canvasPlot.getContext('2d');

//Сетка
const canvasPlotWidth = canvasPlot.clientWidth;
const canvasPlotHeight = canvasPlot.clientHeight;


const scaleX = 50;
const scaleY = 50;

ctx.font = `${Math.round(scaleX/2.5)}px Arial`;
ctx.textAlign = 'left';
ctx.baseLine = 'top';

ctx.beginPath();
ctx.strokeStyle = '#C0C0C0';

for (let i = 0; i <= canvasPlotWidth; i = i + scaleX) {
    ctx.moveTo(i, 0);
    ctx.lineTo(i, canvasPlotHeight);
}

for (let i = 0; i <= canvasPlotHeight; i = i + scaleY) {
    ctx.moveTo(0, i);
    ctx.lineTo(canvasPlotWidth, i);
}
ctx.stroke();
ctx.closePath();

//Ось X, ось Y

const xAxis = Math.round(canvasPlotWidth / scaleX / 2) * scaleX;
const yAxis = Math.round(canvasPlotHeight / scaleY /2) * scaleY;

ctx.strokeStyle = '#000000'
ctx.fillStyle = '#00BFFF'

//Отрисовка фигур графика

ctx.beginPath();

//Треугольник
ctx.moveTo(250, 250);
ctx.lineTo(450, 250);
ctx.lineTo(250, 50);
ctx.fill();

ctx.closePath();
//Четверть круга
ctx.arc(250, 250, 100, 0, Math.PI/2, true);
ctx.fill();

ctx.closePath();


//Прямоугольник
ctx.beginPath();

ctx.fillRect(50, 250, 200, 100);

ctx.closePath();

ctx.beginPath();
ctx.moveTo(xAxis, 0);
ctx.lineTo(xAxis, canvasPlotHeight);

ctx.moveTo(0, yAxis);
ctx.lineTo(canvasPlotWidth, yAxis);

ctx.stroke();
ctx.closePath();




//Разметка R и "точек" по оси X
ctx.fillStyle = '#000000'

ctx.beginPath();

//Точка (0,0)

ctx.fillRect(248, 248, 4, 4)

// Обозначение оси X
ctx.fillText('X', 480, 275);

// R
ctx.fillText('R', 455, 275);
ctx.fillRect(450, 245, 2, 10);

// R/2
ctx.fillText('R/2', 355, 275);
ctx.fillRect(350, 245, 2, 10);

// -R
ctx.fillText('-R', 55, 275);
ctx.fillRect(50, 245, 2, 10);

// -R/2
ctx.fillText('R/2', 155, 275);
ctx.fillRect(150, 245, 2, 10);

ctx.closePath();

//Разметка R и "точек" по оси Y

ctx.beginPath();
// Обозначение оси Y
ctx.fillText('Y', 230, 20);

// R
ctx.fillText('R', 220, 57);
ctx.fillRect(245,50, 10, 2);

// R/2
ctx.fillText('R/2', 207, 157);
ctx.fillRect(245,150, 10, 2);

// -R/2
ctx.fillText('-R/2', 203, 357);
ctx.fillRect(245,350, 10, 2);

// -R
ctx.fillText('-R', 210, 457);
ctx.fillRect(245,450, 10, 2);

ctx.closePath();