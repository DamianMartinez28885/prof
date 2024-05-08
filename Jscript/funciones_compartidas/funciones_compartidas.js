const num1 = document.getElementById('boton1');
const num2 = document.getElementById('boton2');
const num3 = document.getElementById('boton3');
const num4 = document.getElementById('boton4');
const num5 = document.getElementById('boton5');
const num6 = document.getElementById('boton6');
const num7 = document.getElementById('boton7');
const num8 = document.getElementById('boton8');
const num9 = document.getElementById('boton9');
const memoria = 0;

const acumulador = document.getElementById('botonacumulador');
const borraracumulador = document.getElementById('botonborraracumulador');
const borrarpantalla = document.getElementById('botonborrarpantalla');
const sumar = document.getElementById('botonsumar');

let pantalla = document.getElementById('pantalla');

num1.addEventListener('click', function () {
	addToDisplay(1);
});

num2.addEventListener('click', function () {
	addToDisplay(2);
});

num3.addEventListener('click', function () {
	addToDisplay(3);
});

num4.addEventListener('click', function () {
	addToDisplay(4);
});

num5.addEventListener('click', function () {
	addToDisplay(5);
});

num6.addEventListener('click', function () {
	addToDisplay(6);
});

num7.addEventListener('click', function () {
	addToDisplay(7);
});

num8.addEventListener('click', function () {
	addToDisplay(8);
});

num9.addEventListener('click', function () {
	addToDisplay(9);
});

function addToDisplay(value) {
	pantalla.value += value;
}

function clearDisplay() {
	pantalla.value = '';
}

function clearAccumulator() {
	memoria = 0;
}

function showAccumulator() {
	alert(memoria);
}

function sum() {
	const currentValue = parseInt(pantalla.value);
	memoria += currentValue;
	clearDisplay();
}



sumar.addEventListener('click', function () {
	sum();
});

acumulador.addEventListener('click', function () {
	showAccumulator();
});

borrarpantalla.addEventListener('click', function () {
	clearDisplay();
});

borraracumulador.addEventListener('click', function () {
	clearAccumulator();
});