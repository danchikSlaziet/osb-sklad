window.onload = function () {
    setInterval(function () {
        var el = $('#preloader');
        el.css('opacity', 0);
        el.css('visibility', 'hidden');
    }, 500);
};
// Галерея
$(document).ready(function () {
	$('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function () {
		$(this).toggleClass('open');
	});

	if ($("#lightgallery").length > 0) {
		$("#lightgallery").lightGallery();
	}

	$(document.body).click(function () {
		$(".lg-image").each(function () {
			if ($(this).css("opacity") === "1") {
				$('.admin').show();
			} else {
				$('.admin').hide();
			}

		})
	});
});

// Действия в зависимости от размера окна
if (typeof navigator.userAgent !== "undefined") {
	if (navigator.userAgent.indexOf('Lighthouse') >= 0) {
		getAnalytics();
	}
}

function getAnalytics() {
	if (document.querySelector('.contact__map') != null) {
		document.querySelector('.contact__map').innerHTML = "";
	}
}

if ($('body').innerWidth() < 991) {
	let header_auth = $('.header__auth').clone();
	let header_basket = $('.header__basket').clone();

	$('#header__auth').remove();
	$('#header__auth-mobile').html(header_auth);
	console.log(header_auth.parent())

	$('#header__basket').remove();
	$('#header__basket-mobile').html(header_basket);


	// Перемещение табов и заголовка в карточке товара

	let productcard__title = $('.product-card__product-title').clone();
	let productcard__tabs = $('#tab').clone();
	$('.product-card__product-title').remove();
	$('.product-card__product-title-mob').html(productcard__title);
	$('#tab').remove();
	$('#tab-mob').html(productcard__tabs);

	// Вкл/Выкл слайдера в табах (отзывы)
	$('#swiper-review').addClass('swiper-review swiper');
	// Вкл/Выкл слайдера в преимуществах на главной
	$('.index-benefits__swiper').addClass('swiper');
}


function setHeaderIcon(path) {
	function header_default() {
		$(".header__city img").attr("src", path + "/city.svg");
		$(".header__adress img").attr("src", path + "/adress.svg");
		$(".header__hours-item img").attr("src", path + "/clock.svg");
		$(".header__phone img").attr("src", path + "/phone.svg");
		$(".header__phone-mobile a img").attr("src", path + "/phone.svg");
		$(".header__auth img").attr("src", path + "/auth.svg");
		$(".header__btn-nav img").attr("src", path + "/btn-nav.svg");
		$('.header').removeClass('index');
	}

	function header_light() {
		$(".header__city img").attr("src", path + "/city-light.svg");
		$(".header__adress img").attr("src", path + "/adress-light.svg");
		$(".header__hours-item img").attr("src", path + "/clock-light.svg");
		$(".header__phone img").attr("src", path + "/phone-light.svg");
		$(".header__phone-mobile a img").attr("src", path + "/phone-light.svg");
		$(".header__auth img").attr("src", path + "/auth-light.svg");
		$(".header__btn-nav img").attr("src", path + "/btn-nav-light.svg");
		$('.header').addClass('index');
	}

	if ($(window).scrollTop() > 100) {
		header_default();

	} else if ($(window).scrollTop() < 100) {
		header_light();
	}

	$(document).scroll(function () {
		if ($(window).scrollTop() > 50) {
			header_default();
		} else if ($(window).scrollTop() < 50) {
			header_light();
		}
	});
}


// Слушатели

window.addEventListener('click', e => {
	const target = e.target

	// Скрытие открытие шапки

	if (target.closest('.header__btn-nav, .header__nav-close')) {
		$('#header__nav-block').toggleClass('show');
		$(".header__auth img").attr("src", "assets/img/svg/auth.svg");
		$('body').toggleClass('overflow-h');
	}
	;

	// Аккордион

	if (target.closest('.acc-btn')) {
		$(target).parent().closest(".acc").toggleClass('show');
	}
	;

	// Модалка выбора города

	const changeCity = target.closest('.header__city, .header__nav-city, .footer__city, .change-city__close, .change-city__back, .product-card__city, .select-city__dropdown__choose__no') || (target.closest('.change-city.overlay') && !target.closest('.change-city__content'))

	if (changeCity) {
		$('.change-city').toggleClass('show');
	}

	// Фильтр

	const ToggleFilter = target.closest('.catalog__btn-filter, .filter__close')

	if (ToggleFilter) {
		$('.filter').toggleClass('show');
	}

	// Поиск

	const changeInput = target.closest('.ui-autocomplete-input, .autocomplete-close')

	if (changeInput) {
		$('.ui-menu').toggleClass('show');
		$('.autocomplete-close').toggleClass('show');
	}

	// Оставить отзыв

	const leaveReview = target.closest('.reviews__leave, .reviews__form-close')

	if (leaveReview) {
		$('.reviews__form').toggleClass('show');
	}

	// Уточнить остаток

	const refineReminders = target.closest('.product__refine-btn, .remainders__close') || (target.closest('.remainders.overlay') && !target.closest('.remainders__content'))

	if (refineReminders) {
		$('.remainders').toggleClass('show');
		let basket = target.closest('.product__refine-btn');
		if (basket != null) {
			let productName = basket.parentElement.querySelector('.product__title');

			if (productName === null) productName = basket.parentElement.querySelector('#product__title');

			$('#hidden-product-title').val(productName.textContent.trim())
			$('.remainders__product-name').text(productName.textContent.trim())
		}
	}

	// Свернуть развернуть описание в карточке товарам

	function collapseSection(element) {
		element.height('');
		element.attr('data-collapsed', true);
		console.log(1);
	}

	function expandSection(element) {
		var sectionHeight = element.prop('scrollHeight');
		element.css('height', sectionHeight);
		element.attr('data-collapsed', false);
	}

	const collapseBtn = target.closest('.toggle-button')

	if (collapseBtn) {
		let section = $(collapseBtn).parent().find('.collapsible');


		// var section = document.querySelector('.collapsible');
		var isCollapsed = section.attr('data-collapsed') === 'true';

		if (isCollapsed) {
			expandSection(section)
			$(collapseBtn).text('Свернуть')
		} else {
			console.log(isCollapsed)
			$(collapseBtn).text('Развернуть')
			collapseSection(section)
			// $("html").animate({ scrollTop: $(section).offset().top - 250 }, "slow")
		}

	}

});

// МАСКА ДЛЯ ВВОДА ТЕЛЕФОНА
$(document).ready(function ($) {
	"use strict";
	$.mask.definitions['N'] = '[/0-6|9/]';
	$("#feedback_input-phone, #cart__form-phone, #remainders__phone").mask("+7(N99) 999-99-99");
});

// Калькулятор в карточке товара

if ($('.product-card__field').length > 0) {
	let fieldBlock_productCard = $('.product-card__calc');
	widthValue = 0;
	heightValue = 0;
	result = $('.product-card__count');
	unitWidth = $('.product-card__product-title').attr('data-width');
	unitLength = $('.product-card__product-title').attr('data-length');
	quantityField = $('.product-card__calc-number');
	quantityLink = $('.product-card__result');
	makeCalcBlock = $('.product-card__need');
	thisWord = $('.product-card__word');
	wordArr = ['лист', 'листа', 'листов'];

	function wordDecline(num, words) {
		let count = num % 100;
		if (count >= 5 && count <= 20) {
			thisWord.text(words[2]);
		} else {
			count = count % 10;
			if (count === 1) {
				thisWord.text(words[0]);
			} else if (count >= 2 && count <= 4) {
				thisWord.text(words[1]);
			} else {
				thisWord.text(words[2]);
			}
		}
		return thisWord.textContent;
	}

	fieldBlock_productCard.on('input', (evt) => {

		if (evt.target.classList.contains('product-card__input-calc')) {
			// evt.target.value += 'мм';
			// widthValue = getValue('Ширина');
			// heightValue = getValue('Высота');

			if (evt.target.getAttribute('name') === 'Ширина') {
				widthValue = evt.target.value;
			} else if (evt.target.getAttribute('name') === 'Высота') {
				heightValue = evt.target.value;
			}
			if (widthValue.length > 0 && heightValue.length > 0) {
				result__num = Math.ceil(((Number(widthValue) * Number(heightValue))) / (((unitWidth / 1000) * (unitLength / 1000))));
				result.text(result__num);
				wordDecline(result__num, wordArr);
			} else {

			}
		}
	});

	quantityLink.on('click', (evt) => {
		evt.preventDefault();
		console.log(result__num);
		quantityField.val(result__num);
	});
}


// Табы в карточке товара
if ($('body').innerWidth() > 991) {
	function openTab(evt, Tab) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tab__content");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}

		tablinks = document.getElementsByClassName("tab__links");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(Tab).style.display = "inline-block";
		evt.currentTarget.className += " active";
	}

	if (document.getElementById("defaultOpen")) {
		document.getElementById("defaultOpen").click();
	}
}


// Функция для паралакса
if ($('.parallax__image').length > 0) {
	$('.parallax__image').each(function () {
		var img = $(this);
		var imgParent = $(this).parent();

		function parallaxImg() {
			var speed = img.data('speed');
			var imgY = imgParent.offset().top;
			var winY = $(this).scrollTop();
			var winH = $(this).height();
			var parentH = imgParent.innerHeight();

			var winBottom = winY + winH;

			if (winBottom > imgY && winY < imgY + parentH) {
				var imgBottom = ((winBottom - imgY) * speed);
				var imgTop = winH + parentH;
				var imgPercent = ((imgBottom / imgTop) * 100) + (50 - (speed * 50));
			}
			img.css({
				top: imgPercent + '%',
				transform: 'translate(-50%, -' + imgPercent + '%)'
			});
		};
		$(document).on({
			scroll: function () {
				parallaxImg();
			}
		}).ready(function () {
			parallaxImg();
		});
	});
}

function SortProd(sort) {

	if (sort === 'asc') {
		sortList('data-price')
		$('.catalog__grid div[data-n="100000"]').appendTo($('.catalog__grid'));
	} else if (sort === 'desc') {
		//$('.catalog__grid div[data-n="100000"]').show();
		sortListDesc('data-price')
	} else {
		sortList('data-' + sort)
	}

};

$(document).on('change', '#catalog__select-sort', function () {
	let $this = $(this)
	let valueSelect = $this.children("option:selected").val()
	SortProd(valueSelect)
	console.log(valueSelect);
});

console.log(document.querySelector('.catalog__sort'));
if (document.querySelector('.catalog__sort')) {
	// Сортировка по умолчанию
	document.addEventListener('DOMContentLoaded', () => sortList('data-height'))

	function sortList(sortType) {
		console.log(sortType, 1)
		let items = document.querySelector('.catalog__grid');
		for (let i = 0; i < items.children.length - 1; i++) {
			for (let j = i; j < items.children.length; j++) {
				let a = Number(items.children[i].getAttribute(sortType))
				let b = Number(items.children[j].getAttribute(sortType))
				if (a > b) {

					let replacedNode = items.replaceChild(items.children[j], items.children[i]);
					insertAfter(replacedNode, items.children[i]);
				}
			}
		}
	}

	function sortListDesc(sortType) {
		let items = document.querySelector('.catalog__grid');
		for (let i = 0; i < items.children.length - 1; i++) {
			for (let j = i; j < items.children.length; j++) {
				let a = Number(items.children[i].getAttribute(sortType))
				let b = Number(items.children[j].getAttribute(sortType))
				if (a < b) {
					let replacedNode = items.replaceChild(items.children[j], items.children[i]);
					insertAfter(replacedNode, items.children[i]);
				}
			}
		}
	}


	function insertAfter(elem, refElem) {
		return refElem.parentNode.insertBefore(elem, refElem.nextSibling);
	}
}
//Калькулятор на главной
// СБРОС ОТДЕЛЬНОГО ИТЕМА
function reset__item(item) {

	$('#' + item + ' .square').text('0');
	$('#' + item + ' .panel_count').text('0');
	$('#' + item + ' .calculator__btn').text('Рассчитать стоимость');
}

function calculator(panels) {
	if (panels.length > 0) {

		function byField(field) {
			return (a, b) => a[field] > b[field] ? 1 : -1;
		}

		panels.sort(byField('price'))

		let formats_select = document.getElementById('format_list')
		let height_select = document.getElementById('height_list')
		let tmp = []
		let parent_container = document.getElementById('parent')

		//panels  << index

		function changeSelects(event) {
			if (event.target.getAttribute('id') === 'format_list') {
				formats_select = event.target
				height_select = formats_select.closest('.form').querySelector('.height_list')
				height_select.innerHTML = ''
				tmp = []
				let id = formats_select.selectedIndex
				let length = Number(formats_select[id].dataset.length)
				let width = Number(formats_select[id].dataset.width)
				panels.forEach(item => {
					if (item.length == length && item.width == width) {
						createOption(height_select, item.height, item)
					}
				})
			}

		}

		function createOption(domElement, textContent, item) {
			if (domElement) {
				if (tmp.indexOf(textContent) < 0) {
					let el = document.createElement("option")
					el.textContent = textContent
					el.value = item.id
					el.dataset.length = item.length
					el.dataset.width = item.width
					el.dataset.height = item.height
					domElement.appendChild(el)
					tmp.push(textContent)
				}
			}

		}

		// function getAllValues(id) {
		// 	let AllForms = document.querySelectorAll('.form')
		// 	console.log(AllForms)
		// 	let p = []
		// 	AllForms.forEach(square => {
		// 		let form = new FormData(square)
		// 		let obj = {}
		// 		for (let pair of form.entries()) {
		// 			obj[pair[0]] = pair[1]
		// 			console.log(obj[pair[0]]);
		// 		}
		// 		p.push(obj)
		// 	})

		// 	return p
		// }

		function getAllValues(item__id) {
			// console.log('#' + item__id + ' .form');
			// console.log(item__id)
			let AllForms = document.querySelectorAll('#' + item__id + ' .form')

			let p = []
			AllForms.forEach(square => {
				let form = new FormData(square)
				let obj = {}
				for (let pair of form.entries()) {
					obj[pair[0]] = pair[1]
					// console.log(obj[pair[0]]);
				}
				p.push(obj)
			})

			return p
		}

		function renderResults(array, item__id) {
			let result_parent = document.getElementById(item__id)
			let result_template = document.getElementById('result_template')
			let result_child = document.querySelector('#' + item__id + ' .result_child')

			if (result_child) {
				result_child.remove();

			}
			if (array != 0) { $('#' + item__id + ' .calculator__result').remove() }

			// console.log('Сработал!')
			let i = 1

			array.forEach(result => {

				let clone = result_template.cloneNode()
				// console.log(result)
				let id = Date.now()
				clone.id = 'id' + id
				clone.classList.add('result_child')
				clone.style.display = "block"
				clone.innerHTML = result_template.innerHTML
				// clone.querySelector('.square_id').innerHTML = i++
				clone.querySelector('#basketId').value = result.id
				clone.querySelector('#productId').value = result.product_id
				clone.querySelector('#prName').value = result.name
				clone.querySelector('#prPrice').value = result.total_cost
				clone.querySelector('#pCForm').dataset.formId = result.id
				clone.querySelector('#prImage').value = result.image
				clone.querySelector('#butForm').dataset.prodId = result.id
				// clone.querySelector('.productForm_productCard').value = result.id
				clone.querySelector('#basketQuantity').value = result.count
				clone.querySelector('.panel_name').innerHTML = result.name
				clone.querySelector('.square').innerHTML = result.s_user
				clone.querySelector('.panel_count').innerHTML = result.count
				// clone.querySelector('.panel_cost').innerHTML    = result.price
				clone.querySelector('.total_price').innerHTML = result.total_cost
				clone.querySelector('.calculator__reset-item').id = 'reset_' + item__id
				clone.querySelector('.calculator__reset-item').value = item__id

				result_parent.appendChild(clone)

			})
		}

		function del_square(event) {
			let square = event.target.closest('.child_element')
			square.innerHTML = null
			document.querySelector('.calculator__addNew').disabled = false
			square.remove()
			jQuery(window).trigger('resize').trigger('scroll');
		}

		//Калькулятор на главной

		function reset__all(event) {
			let all__square = $('.calculator__item')
			$(all__square).each(function (square) {
				if (!$(this).is('#template')) {
					// console.log($(this))
					$(this).remove();
				}
			})
			$('#template .square').text('0')
			$('#template .panel_count').text('0')
			$('#template .calculator__btn').text('Рассчитать стоимость')
			jQuery(window).trigger('resize').trigger('scroll');
		}

		$('.calculator__reset').on('click', (e) => { reset__all(e) })


		let add_square = document.querySelector('.calculator__addNew')

		if (add_square) {
			add_square.addEventListener('click', (e) => {
				let template = document.getElementById('template')
				if (document.querySelectorAll('.child_element').length >= 4) {
					e.target.disabled = true
				}
				else {
					e.target.disabled = false
				}
				let clone = template.cloneNode()
				let id = Date.now()
				// console.log('#' + id)
				clone.id = 'id' + id
				clone.classList.add('child_element')
				clone.innerHTML = template.innerHTML

				let closeButton = clone.querySelector('.calculator__btn-close')
				closeButton.style.display = "flex"
				closeButton.addEventListener('click', (e) => { del_square(e) })
				parent_container.appendChild(clone)
				// console.log($('#id' + id))
				$('#id' + id).find('.calculator__btn').attr("id", 'calculator__btn' + id)
				$('#id' + id + ' .square').text('0')
				$('#id' + id + ' .panel_count').text('0')
				$('#id' + id + ' .calculator__btn').text('Рассчитать стоимость')
				jQuery(window).trigger('resize').trigger('scroll');
				// const y = document.getElementById(id).getBoundingClientRect().top + window.pageYOffset - 200;
				// window.scrollTo({ top: y, behavior: 'smooth' });
			})
		}


		if (parent_container) {
			parent_container.addEventListener('change', e => changeSelects(e))
			panels.forEach(item => {
				createOption(formats_select, item.length + 'x' + item.width, item)
				createOption(height_select, item.height, item)
			})
		}

		function changeCalcBtn(event) {
			target = event.target
			item__id = $(target).parent().parent().parent().attr('id')

			$('#' + item__id + ' .calculator__btn').text('Рассчитать стоимость')
			console.log(item__id)
		}

		$('.calculator__data').on('change', (e) => {
			changeCalcBtn(e)
		})


		let calc_button = document.getElementById('calculator__btn')
		let calc_btn = $('.calculator__btn')
		if (calc_btn) {
			window.addEventListener('click', e => {
				const target = e.target
				let item__id = $(target).parents('.calculator__item').attr('id')
				// console.log(item__id)
				if ($(target).hasClass('calculator__btn')) {
					let AllSquares = getAllValues(item__id)
					let results = []
					AllSquares.forEach(square => {
						let panel = panels.filter(item => item.id == square.height)
						let obj = {}
						// calculator__datasquare)
						panel.forEach(item => {
							let s_user = (Number(square.length_field) * Number(square.height_filed)) / 1000000
							let s_panel = (Number(item.length) * Number(item.width)) / 1000000
							let count = Math.ceil(s_user / s_panel)
							let total_cost = count * Number(item.price)
							obj = {
								id: item.id,
								product_id: item.product_id,
								name: item.name,
								count: count,
								s_user: parseFloat(s_user).toFixed(2),
								price: item.price.toLocaleString('ru-RU'),
								total_cost: total_cost.toLocaleString('ru-RU'),
								image: item.picture,
							}
							results.push(obj)
						})
						let res_id = '';

						if (item__id == 'template') {
							res_id = 'template';
							renderResults(results, res_id)
						}
						else {
							res_id = item__id;
							renderResults(results, res_id)
						}
					})

				}

			});

		}


	} else {
		console.log("Нет данных")
	}
}

var onloadCallbackRecap = function () {

	grecaptcha.ready(function () {
		grecaptcha.execute('6Lfwyz4bAAAAAC3zD9U-UP5ts10JGNww5Po53mOA', { action: 'contact_callback' }).then(function (token) {
			let recapResponse = document.createElement("input");
			recapResponse.type = "hidden";
			recapResponse.className = "recap_response";
			recapResponse.name = "recap_response";
			recapResponse.id = "recap_response";
			recapResponse.value = token;


			//!!! выбираем нужную форму селектором
			let form = document.querySelector('form[name=simple_form]');
			form.appendChild(recapResponse);

		});
		grecaptcha.execute('6Lfwyz4bAAAAAC3zD9U-UP5ts10JGNww5Po53mOA', { action: 'modal_callback' }).then(function (token) {
			let recapResponse = document.createElement("input");
			recapResponse.type = "hidden";
			recapResponse.className = "recap_response";
			recapResponse.name = "recap_response";
			recapResponse.id = "recap_response";
			recapResponse.value = token;


			//!!! выбираем нужную форму селектором
			let form = document.querySelector('form[name=simple_form_2]');
			form.appendChild(recapResponse);

		});
	});
};

//ЧЕКБОКС ДЛЯ СКРЫТИЯ ИЛИ ПОКАЗАЗА ПРОДУКТОВ ИЗ РАЗНЫХ КАТЕГОРИЙ (2 ВАРИАНТА)
function cangeActiveCategory(showCategory, hideCategory) {
	$('.filter-tags__item[data-filter="' + showCategory + '"]').show();
	$('.filter-tags__item[data-filter="' + hideCategory + '"]').hide();
	console.log(showCategory, hideCategory);
	$('.catalog__category[data-change-category="' + showCategory + '"]').addClass('active');
	$('.catalog__category[data-change-category="' + hideCategory + '"]').removeClass('active');
}

let category1 = $('#catalog__checkbox').attr('data-first');
let category2 = $('#catalog__checkbox').attr('data-second');

$(document).ready(function () {
	if ($('#catalog__checkbox').is(':checked')) {
		cangeActiveCategory(category2, category1)
	} else {
		cangeActiveCategory(category1, category2)
	}
});

$('#catalog__checkbox').on('change', function () {
	if (this.checked) {
		cangeActiveCategory(category2, category1)
	} else {
		cangeActiveCategory(category1, category2)
	}

});

if (document.querySelector('.area-shipped')) {
	function getRandom(min, max) {
		min = Math.ceil(min);
		max = Math.floor(max);
		let coefficient = Math.floor(Math.random() * (max - min)) + min;
		return coefficient;
	}

	function summ() {
		let shippedQuantity = document.querySelector('.area-shipped');
		let date1 = Date.UTC('2014', '5', '11')
		let date2 = Date.now()
		let sec = Math.floor((date2 - date1) / 1000)
		let num = Math.round(sec * 0.6);
		let delay = getRandom(4, 10);
		let num2 = Math.round(delay * (getRandom(3, 8)) / 10);
		shippedQuantity.textContent = (num + num2).toLocaleString('ru-RU')
		// console.log(num2);
		setTimeout(summ, delay * 1000)
	}

	summ()

}

// смена на цветное лого при наведении на главной странице

function hoverOnLogo(arrayLinks) {
	if (document.querySelector(".partners")) {
		const partners = document.querySelector(".partners");
		const partnersItem = partners.querySelectorAll(".partners__item");
		partnersItem.forEach((elem, index) => {
			let imgHref = elem.querySelector('img').src;
			elem.addEventListener('mouseover', () => {
				elem.querySelector('img').src = arrayLinks[index];
			});
			elem.addEventListener('mouseout', () => {
				elem.querySelector('img').src = imgHref;
			})
		});
	}
}
