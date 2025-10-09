document.addEventListener('DOMContentLoaded', function () {
	// Универсальная функция для инициализации слайдера
	function initSlider(sliderId, prevButtonId, nextButtonId) {
		const slider = document.querySelector(sliderId)
		const prevButton = document.querySelector(prevButtonId)
		const nextButton = document.querySelector(nextButtonId)

		// Проверка существования элементов
		if (!slider || !prevButton || !nextButton) {
			console.warn(`Элементы для слайдера ${sliderId} не найдены`)
			return
		}

		const slides = Array.from(slider.querySelectorAll('img'))
		const slideCount = slides.length
		let slideIndex = 0

		// Функция обновления слайдера
		function updateSlider() {
			slides.forEach((slide, index) => {
				slide.style.display = index === slideIndex ? 'block' : 'none'
			})
		}

		// Обработчики событий
		prevButton.addEventListener('click', function (e) {
			e.preventDefault()
			slideIndex = (slideIndex - 1 + slideCount) % slideCount
			updateSlider()
		})

		nextButton.addEventListener('click', function (e) {
			e.preventDefault()
			slideIndex = (slideIndex + 1) % slideCount
			updateSlider()
		})

		// Инициализация
		updateSlider()

		// Добавляем обработчики свайпов для мобильных устройств
		let touchStartX = 0
		let touchEndX = 0

		slider.addEventListener(
			'touchstart',
			function (e) {
				touchStartX = e.changedTouches[0].screenX
			},
			{ passive: true }
		)

		slider.addEventListener(
			'touchend',
			function (e) {
				touchEndX = e.changedTouches[0].screenX
				handleSwipe()
			},
			{ passive: true }
		)

		function handleSwipe() {
			const threshold = 50 // Минимальная дистанция свайпа
			if (touchStartX - touchEndX > threshold) {
				// Свайп влево = следующий слайд
				nextButton.click()
			} else if (touchEndX - touchStartX > threshold) {
				// Свайп вправо = предыдущий слайд
				prevButton.click()
			}
		}
	}

	// Инициализация всех слайдеров
	initSlider('#slide_1', '#slide_button_1_prev', '#slide_button_1_next')
	initSlider('#slide_2', '#slide_button_2_prev', '#slide_button_2_next')
	initSlider('#slide_3', '#slide_button_3_prev', '#slide_button_3_next')
	initSlider('#slide_4', '#slide_button_4_prev', '#slide_button_4_next')
	initSlider('#slide_5', '#slide_button_5_prev', '#slide_button_5_next')
	initSlider('#slide_6', '#slide_button_6_prev', '#slide_button_6_next')
	initSlider('#slide_7', '#slide_button_7_prev', '#slide_button_7_next')
	initSlider('#slide_8', '#slide_button_8_prev', '#slide_button_8_next')
})
