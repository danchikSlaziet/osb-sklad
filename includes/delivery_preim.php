<!-- Доставка - преимущества --> <section id="delivery-benefits" class="delivery-benefits">
<div class="container">
	<div class="delivery-benefits__content">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => SITE_TEMPLATE_PATH."/includes/delivery_picture.php"
	)
);?>
		<div class="title-section">
			<h2>Наши достоинства</h2>
		</div>
		<div class="delivery-benefits__swiper swiper">
			<div class="swiper-wrapper">
				<div class="delivery-benefits__item swiper-slide">
					<div class="delivery-benefits__image">
 <img src="/local/templates/osb-new/assets/img/svg/benefit1.svg" alt="">
					</div>
					<div class="delivery-benefits__item-title">
						 Доставка
					</div>
					<div class="delivery-benefits__label">
						 Компания выполняет качественную доставку собственным транспортом.
					</div>
				</div>
				<div class="delivery-benefits__item swiper-slide">
					<div class="delivery-benefits__image">
 <img src="/local/templates/osb-new/assets/img/svg/benefit2.svg" alt="">
					</div>
					<div class="delivery-benefits__item-title">
						 Оплата
					</div>
					<div class="delivery-benefits__label">
						 Товар можно оплатить наличным или безналичным расчетом при заказе или в день доставки.
					</div>
				</div>
				<div class="delivery-benefits__item swiper-slide">
					<div class="delivery-benefits__image">
 <img src="/local/templates/osb-new/assets/img/svg/benefit3.svg" alt="">
					</div>
					<div class="delivery-benefits__item-title">
						 Обмен
					</div>
					<div class="delivery-benefits__label">
						 Компания может осуществлять обмен приобретенного товара по определенным условиям.
					</div>
				</div>
				<div class="delivery-benefits__item swiper-slide">
					<div class="delivery-benefits__image">
 <img src="/local/templates/osb-new/assets/img/svg/benefit4.svg" alt="">
					</div>
					<div class="delivery-benefits__item-title">
						 Возврат
					</div>
					<div class="delivery-benefits__label">
						 Есть возможность вернуть остатки лишнего строительного материала по выгодным условиям.
					</div>
				</div>
			</div>
		</div>
		<div class="swiper-button-inner-v2">
			<div class="swiper-button-prev-dark">
			</div>
			<div class="swiper-button-next-dark">
			</div>
		</div>
	</div>
</div>
 </section>