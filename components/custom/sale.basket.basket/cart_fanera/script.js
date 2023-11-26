$(document).on('click', '.cart__delete', function () {
	let $this = $(this)
	let prod__ID = $this.data('prod-id')
	let cart__ID = $this.data('cart-id')
	let cart = $('.quantityPurchase');
	let count__product = $this.parent().find('.cart-input').val()
	// console.log($this.parent().find('.cart-input').val())
	$.ajax({
		url: "/cart/",
		method: 'get',
		data: {
			'element-id': cart__ID,
		},
		success: function (data) {
			let $cart__list = $('.cart');
			let $basket__preview = $('.basket-preview__table');
			cart.text((i, val) => +val - count__product)
			if ($cart__list.length > 0) {
				$cart__list.html($(data).find('.cart').html());
				$basket__preview.html($(data).find('.basket-preview__table').html());
				let BasketEl = document.querySelectorAll('.basket-preview__table .basket-preview__row')
				if (BasketEl.length) {
					for (var i = 0; i < BasketEl.length; i++) {
						let productBasket__ID = BasketEl[i].getAttribute('data-prod-id')
						if (productBasket__ID == prod__ID) {
							BasketEl[i].remove()
						}
					}
				}
			}
		},
	});
})