const num1 = document.getElementById('boton1');
const num2 = document.getElementById('boton2');
const num3 = document.getElementById('boton3');
const num4 = document.getElementById('boton4');
const num5 = document.getElementById('boton5');
const num6 = document.getElementById('boton6');
const num7 = document.getElementById('boton7');
const num8 = document.getElementById('boton8');
const num9 = document.getElementById('boton9');

const acumulador = document.getElementById('botonacumular');
const borraracumulador = document.getElementById('botonborraracumulador');
const borrarpantalla = document.getElementById('botonborrarpantalla');
const sumar = document.getElementById('botonsumar');
const pantalla = document.getElementById('pantalla');

let memoria = 0;

num1.addEventListener('click', function () {
	mostrarenpantalla(1);
});

num2.addEventListener('click', function () {
	mostrarenpantalla(2);
});

num3.addEventListener('click', function () {
	mostrarenpantalla(3);
});

num4.addEventListener('click', function () {
	mostrarenpantalla(4);
});

num5.addEventListener('click', function () {
	addToDisplay(5);
});

num6.addEventListener('click', function () {
	mostrarenpantalla(6);
});

num7.addEventListener('click', function () {
	mostrarenpantalla(7);
});

num8.addEventListener('click', function () {
	mostrarenpantalla(8);
});

num9.addEventListener('click', function () {
	mostrarenpantalla(9);
});

function mostrarenpantalla(value) {
	pantalla.value += value;
}

function borrarpant() {
	pantalla.value = '';
}

function borrarmemoria() {
	memoria = 0;
}

function mostrarenalert() {
	alert(memoria);
}

function sumador() {
	const auxiliar = parseInt(pantalla.value);
	memoria += auxiliar;
	borrarpant();
}

sumar.addEventListener('click', function () {
	sumador();
});

acumulador.addEventListener('click', function () {
	mostrarenalert();
});

borrarpantalla.addEventListener('click', function () {
	borrarpant();
});

borraracumulador.addEventListener('click', function () {
	borrarmemoria();
});