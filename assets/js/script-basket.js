var timeout
function showBasketPreview() {
	window.clearTimeout(timeout)
	let element = document.querySelector('.basket-preview__content');
	if (element) {
		element.classList.add('show');
		timeout = setTimeout(function () {
			element.classList.remove('show');
		}, 1500);
	}

	// window.addEventListener('click', e => {
	// 	const target = e.target
	// 	let BasketHideBtn = target.closest('.basket-preview__btn-hide')
	// 	if (BasketHideBtn) {
	// 		document.querySelector('.basket-preview__content').classList.remove('show');
	// 	}
	// });
}


window.addEventListener('click', e => {
	const target = e.target
	let butForm = target.closest('.butForm')
	let Basket = document.querySelector('.basket-preview__table')
	let BasketEl = document.querySelectorAll('.basket-preview__table .basket-preview__row')
	let BasketEl_item = document.createElement('tr');
	let product__content = $(butForm).parents(".preview__content")

	BasketEl_item.classList.add('basket-preview__row');

	if (butForm) {

		// Получение необходимых параметров с товара выбранного клиентом

		// Заголовок
		let product__title = product__content.find(".preview__title")[0].innerText
		// Количество
		let product__count = parseInt(product__content.find(".preview__count").val())
		// Цена
		let product__price = parseFloat(product__content.find(".preview__price")[0].innerText.replace(/\s/g, '').replace(/,/g, '.'))
		// Картинка
		let product__image = product__content.find(".preview__image")[0]

		let product__priceSum
		let product__ID = butForm.getAttribute('data-prod-id')
		let check_change = false

		// Проверка на случай если у инпута не указано значение можно убрать если 100% будет значение
		if (!product__count) {
			product__count = 1
		}

		// Проверка на пустоту корзину
		// если пустая, то добавляем в корзину наш новый товар 
		// если не пустая, то  проходимся циклом по всем товарам и ищем совпадения по айди товара, 
		// если не нашли совпадения, то наш check_change остается без изменений и товар добавляется в конец

		if (BasketEl.length) {

			for (var i = 0; i < BasketEl.length; i++) {
				let productBasket__ID = BasketEl[i].getAttribute('data-prod-id')
				if (productBasket__ID == product__ID) {
					product__count_old = parseInt(BasketEl[i].querySelector('.basket-preview__count').textContent)
					if (product__count_old) {
						product__count += product__count_old
					}
					check_change = true

					product__priceSum = Math.floor((product__count * product__price) * 100) / 100
					BasketEl[i].innerHTML = `<td class="basket-preview__title">` + product__title + `</td>
							<td class="basket-preview__count">` + product__count + `шт. </td>
							<td class="basket-preview__price">` + product__price + `р. </td>
							<td class="basket-preview__price-sum">` + product__priceSum + `р. </td>`;

					// Добавление картинки для нового товара
					$(product__image).clone().prependTo("tr[data-prod-id='" + product__ID + "'] .basket-preview__title")
				}
			}
		}

		else {

			product__priceSum = Math.floor((product__count * product__price) * 100) / 100
			BasketEl_item.innerHTML = `<td class="basket-preview__title">` + product__title + `</td>
			<td class="basket-preview__count">` + product__count + `шт. </td>
			<td class="basket-preview__price">` + product__price + `р. </td>
			<td class="basket-preview__price-sum">` + product__priceSum + `р. </td>`;
			BasketEl_item.setAttribute('data-prod-id', product__ID)

			// Добавление в конец нового товара 
			Basket.append(BasketEl_item);

			// Добавление картинки для нового товара
			$(product__image).clone().prependTo("tr[data-prod-id='" + BasketEl_item.getAttribute('data-prod-id') + "'] .basket-preview__title")
		}

		if (!check_change) {
			console.log(3)
			product__priceSum = Math.floor((product__count * product__price) * 100) / 100
			BasketEl_item.innerHTML = `<td class="basket-preview__title">` + product__title + `</td>
			<td class="basket-preview__count">` + product__count + `шт. </td>
			<td class="basket-preview__price">` + product__price + `р. </td>
			<td class="basket-preview__price-sum">` + product__priceSum + `р. </td>`;
			BasketEl_item.setAttribute('data-prod-id', product__ID)

			// Добавление в конец нового товара 
			Basket.append(BasketEl_item);
			// Добавление картинки для нового товара
			$(product__image).clone().prependTo("tr[data-prod-id='" + BasketEl_item.getAttribute('data-prod-id') + "'] .basket-preview__title")
		}


		let BasketResultPrice = 0

		// Получение обновленной таблицы
		let BasketElUpdate = $('.basket-preview__table .basket-preview__row')

		// Проход по всем итоговым суммам товаров и их суммирование
		for (var i = 0; i < BasketElUpdate.length; i++) {
			BasketResultPrice += parseFloat(BasketElUpdate[i].querySelector('.basket-preview__price-sum').textContent)
		}

		let priceResult = document.querySelector('.basket-preview__price-result')



		priceResult.innerHTML = 'Итого: ' + Math.floor(BasketResultPrice * 100) / 100 + 'р. ';


		// Показ превью корзины и запуск таймера
		showBasketPreview()
	}

});


