

const game = document.querySelector('.game');
var arrBag = [];
var arrNice = [];
var newBag;
var interval = 1000;
var item = 1;

function createGame() {
	for (let i = 0; i < 16; i++) {
		let a = document.querySelector('.game');
		let b = document.createElement('div');
		b.classList.add('box');
		b.setAttribute('data-value', i);
		a.appendChild(b);
	}
}
function replay() {
	var replay = document.querySelector('.replay');
	replay.addEventListener('click', function () {
		box.forEach(function (box) {
			box.classList.remove('green');
			box.classList.remove('nice');
			box.classList.remove('red');
			box.classList.remove('bag');


		});
		if (document.querySelector('.replay-w')) {
			arrBag.splice(0, arrBag.length);
			let bangw = document.querySelector('.won');
			newBag = setInterval(randomBag, 1800);
			bangw.style.animation = 'start .2s ease-in-out';
			bangw.style.top = '100%';


		}
		$(".won p").removeClass("replay-w").removeClass("replay");

		if (document.querySelector('.replay-l')) {
			arrBag.splice(0, arrBag.length);
			let bangl = document.querySelector('.lose');
			newBag = setInterval(randomBag, 1500);
			bangl.style.animation = 'start .2s ease-in-out';
			bangl.style.top = '100%';


		}
		arrBag.splice(0, arrBag.length);
		$(".lose p").removeClass("replay-l").removeClass("replay");
	});
}

function addNice(e) {
	let c = e.target;

	if (arrNice.indexOf(c.dataset.value) == -1) {
		arrNice.push(c.dataset.value);
		if (arrNice.length == 16) {
			clearInterval(arrNice);

			let bangw = document.querySelector('.won');
			bangw.style.animation = 'won .6s ease-in-out';
			bangw.style.top = '30%';
			$(".won p").addClass('replay').addClass('replay-w');
			replay();
		}
	}


	if (arrBag.indexOf(c.dataset.value) != -1) {
		arrBag.splice(arrBag.indexOf(c.dataset.value), 1);
	}
	c.classList.remove('red');
	c.classList.remove('bag');
	c.classList.add('green');
	c.classList.add('nice');

}

function randomBag() {
	let e = Math.random() * 16;
	let g = Math.floor(e);

	if (arrBag.indexOf(box[g].dataset.value) == -1 && document.querySelector('.replay-l') == null && document.querySelector('.replay-w') == null) {
		arrBag.push(box[g].dataset.value);
		box[g].classList.add('red');
		box[g].classList.remove('green');
		box[g].classList.add('bag');
		if (arrBag.length == 16) {
			clearInterval(newBag);


			let bangl = document.querySelector('.lose');
			bangl.style.animation = 'won .6s ease-in-out';
			bangl.style.top = '30%';
			$(".lose p").addClass('replay').addClass('replay-l');
			replay();
		}


	}
	console.log(arrBag)


	if (arrNice.indexOf(box[g].dataset.value) != -1) {
		arrNice.splice(arrNice.indexOf(box[g].dataset.value), 1);
	}
}


createGame();

var box = document.querySelectorAll('.box');
var start = document.querySelector('.floating');
start.addEventListener('click', function () {
	let init = document.querySelector('.init');
	init.style.animation = 'start .5s ease-in';
	init.style.top = '100%';
	if (document.querySelector('.replay-l') == null && document.querySelector('.replay-w') == null) { newBag = setInterval(randomBag, interval); };
});

box.forEach(function (box) {
	box.addEventListener('click', addNice, false);
}, false);

function fire(e) {

	let trg = e.target;

	const itemDim = this.getBoundingClientRect(),
		itemSize = {
			x: itemDim.right - itemDim.left,
			y: itemDim.bottom - itemDim.top,
		};

};


box.forEach(function (box) {
	box.addEventListener('click', fire);
});

// window.addEventListener('click', e => {
// 	const target = e.target
// 	if (target.closest('.end-game') ) {
// 		$('#game404').toggleClass('d-none');
// 		$('#error404').removeClass('d-none');
// 	}
// })
