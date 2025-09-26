import './infrastructure.scss'

// Lazy load картинок
document.querySelectorAll('img:not([loading])')
    .forEach(img => img.setAttribute('loading', 'lazy'))

// Глобальные лого
const logos = [
    { id: 'headerLogoContainer', src: '/local/assets/assets/images/logo-dark.png' },
    { id: 'mobileLogoContainer', src: '/local/assets/assets/images/logo-white.png' },
    { id: 'footerLogoContainer', src: '/local/assets/assets/images/logo-white.png' }
]
logos.forEach(({ id, src }) => {
    const el = document.getElementById(id)
    if (el) {
        const img = document.createElement('img')
        img.src = src
        img.alt = 'Mutti Villas'
        img.className = 'field-image'
        el.appendChild(img)
    }
})
