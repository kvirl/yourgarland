document.addEventListener('DOMContentLoaded', () => {
	const burger = document.querySelector('.burger')
	const nav = document.querySelector('.nav-link')
	const body = document.body

	// Функция переключения меню
	function toggleMenu() {
		burger.classList.toggle('active')
		nav.classList.toggle('open')

		if (nav.classList.contains('open')) {
			body.style.overflow = 'hidden'
		} else {
			body.style.overflow = ''
		}
	}

	// Клик по бургеру
	burger.addEventListener('click', toggleMenu)

	// Закрытие по клику на пункты меню
	document.querySelectorAll('.item_a').forEach(link => {
		link.addEventListener('click', toggleMenu)
	})

	// Закрытие по клику вне меню
	document.addEventListener('click', e => {
		if (
			nav.classList.contains('open') &&
			!nav.contains(e.target) &&
			!burger.contains(e.target)
		) {
			toggleMenu()
		}
	})

	// Закрытие по Escape
	document.addEventListener('keydown', e => {
		if (e.key === 'Escape' && nav.classList.contains('open')) {
			toggleMenu()
		}
	})
})
