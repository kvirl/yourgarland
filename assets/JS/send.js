// document.getElementById('contactForm')?.addEventListener('submit', async function (e) {
// 	e.preventDefault()

// 	const form = this
// 	const submitBtn = form.querySelector('button[type="submit"]')
// 	const responseEl = document.getElementById('responseMessage') || console

// 	// Сохраняем оригинальный текст кнопки
// 	const originalBtnText = submitBtn.textContent

// 	try {
// 		// Блокируем кнопку
// 		submitBtn.disabled = true
// 		submitBtn.textContent = 'Отправка...'

// 		// Создаем FormData
// 		const formData = new FormData(form)

// 		// Отправляем запрос
// 		const response = await fetch(form.action || 'send.php', {
// 			method: 'POST',
// 			body: formData,
// 		})

// 		// Обрабатываем ответ
// 		if (!response.ok) {
// 			// Пытаемся прочитать JSON ошибки
// 			try {
// 				const errorData = await response.json()
// 				throw new Error(errorData.message || `HTTP error! status: ${response.status}`)
// 			} catch {
// 				throw new Error(`Server error: ${response.status}`)
// 			}
// 		}

// 		// Парсим успешный ответ
// 		const data = await response.json()

// 		// Показываем сообщение
// 		if (responseEl.textContent !== undefined) {
// 			responseEl.textContent = data.message || 'Success!'
// 			responseEl.style.color = data.success ? 'green' : 'red'
// 		}

// 		// Сбрасываем форму при успехе
// 		if (data.success) {
// 			form.reset()
// 		}
// 	} catch (error) {
// 		console.error('Fetch error:', error)

// 		// Показываем пользователю понятное сообщение
// 		if (responseEl.textContent !== undefined) {
// 			responseEl.textContent = error.message.includes('500')
// 				? 'Server error. Please try later.'
// 				: error.message
// 			responseEl.style.color = 'red'
// 		}
// 	} finally {
// 		// Восстанавливаем кнопку
// 		submitBtn.disabled = false
// 		submitBtn.textContent = originalBtnText

// 		// Автоскрытие сообщения через 5 сек
// 		if (responseEl.textContent !== undefined) {
// 			setTimeout(() => {
// 				responseEl.textContent = ''
// 			}, 5000)
// 		}
// 	}
// })
{
	document.getElementById('contactForm')?.addEventListener('submit', async function (e) {
  e.preventDefault()

  const form = this
  const submitBtn = form.querySelector('button[type="submit"]')
  const responseEl = document.getElementById('responseMessage') || console

  // Сохраняем оригинальный текст кнопки
  const originalBtnText = submitBtn.textContent

  try {
    // Блокируем кнопку
    submitBtn.disabled = true
    submitBtn.textContent = 'Отправка...'

    // Создаем FormData
    const formData = new FormData(form)

    // Отправляем запрос
    const response = await fetch(form.action || 'send.php', {
      method: 'POST',
      body: formData,
    })

    // Обрабатываем ответ
    if (!response.ok) {
      // Пытаемся прочитать JSON ошибки
      try {
        const errorData = await response.json()
        throw new Error(errorData.message || `HTTP error! status: ${response.status}`)
      } catch {
        throw new Error(`Server error: ${response.status}`)
      }
    }

    // Парсим успешный ответ
    const data = await response.json()

    // Показываем сообщение
    if (responseEl.textContent !== undefined) {
      responseEl.textContent = data.message || 'Success!'
      responseEl.style.color = data.success ? 'green' : 'red'
    }

    // Сбрасываем форму при успехе
    if (data.success) {
      form.reset()
    }
  } catch (error) {
    console.error('Fetch error:', error)

    // Показываем пользователю понятное сообщение
    if (responseEl.textContent !== undefined) {
      responseEl.textContent = error.message.includes('500')
        ? 'Server error. Please try later.'
        : error.message
      responseEl.style.color = 'red'
    }
  } finally {
    // Восстанавливаем кнопку
    submitBtn.disabled = false
    submitBtn.textContent = originalBtnText

    // Автоскрытие сообщения через 5 сек
    if (responseEl.textContent !== undefined) {
      setTimeout(() => {
        responseEl.textContent = ''
      }, 5000)
    }
  }
})

// Обработчики для полей ввода
document.addEventListener('DOMContentLoaded', function() {
  const nameInput = document.querySelector('input[name="name"]')
  const phoneInput = document.querySelector('input[name="tel"]')

  // Обработчик для поля имени
  if (nameInput) {
    nameInput.addEventListener('input', function(e) {
      const inputValue = e.target.value
      const cleanValue = inputValue.replace(/[^a-zA-Zа-яА-ЯёЁ\s-]/g, "")
      e.target.value = cleanValue
    })
  }

  // Обработчик для поля телефона
  if (phoneInput) {
    phoneInput.addEventListener('input', function(e) {
      const inputValue = e.target.value
      const formattedValue = formatPhoneNumber(inputValue)
      e.target.value = formattedValue
    })

    // Обработчик для предотвращения вставки некорректных данных
    phoneInput.addEventListener('paste', function(e) {
      e.preventDefault()
      const pastedText = (e.clipboardData || window.clipboardData).getData('text')
      const formattedValue = formatPhoneNumber(pastedText)
      e.target.value = formattedValue
    })
  }
})

// Функция форматирования номера телефона
function formatPhoneNumber(value) {
  const numbers = value.replace(/\D/g, "")
  let trimmed = numbers.slice(0, 11)
  
  if (trimmed.length > 0 && !trimmed.startsWith("7")) {
    trimmed = "7" + trimmed.slice(1)
  }
  
  let formatted = "+7"
  if (trimmed.length > 1) {
    formatted += ` (${trimmed.slice(1, 4)}`
  }
  if (trimmed.length >= 5) {
    formatted += `) ${trimmed.slice(4, 7)}`
  }
  if (trimmed.length >= 8) {
    formatted += `-${trimmed.slice(7, 9)}`
  }
  if (trimmed.length >= 10) {
    formatted += `-${trimmed.slice(9, 11)}`
  }

  return formatted
}
}
