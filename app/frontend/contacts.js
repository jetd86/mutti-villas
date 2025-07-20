import bgMap from '@images/contract-section-map.svg?as=src';
import './contacts.scss'

document.addEventListener('DOMContentLoaded', () => {
    // Maps
    const mapBlock = document.getElementById('map');
    if (mapBlock) {
        const img = document.createElement('img')
        img.src = bgMap
        img.alt = 'Map'
        img.style.width = '100%'
        mapBlock.appendChild(img)
    }
});
