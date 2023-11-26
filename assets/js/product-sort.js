function SortProd(sort) {

	if (sort === 'asc') {
		sortList('data-price')
		$('.catalog__grid div[data-n="100000"]').appendTo($('.catalog__grid'));
	} else if (sort === 'desc') {
		//$('.catalog__grid div[data-n="100000"]').show();
		sortListDesc('data-price')
	} else { sortList('data-' + sort) }

};

$(document).on('change', '#catalog__select-sort', function () {
	let $this = $(this)
	let valueSelect = $this.children("option:selected").val()
	SortProd(valueSelect)
	console.log(valueSelect);
});


if (document.querySelector('.product')) {
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