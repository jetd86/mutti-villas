import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import iconUrl from 'leaflet/dist/images/marker-icon.png';
import iconRetinaUrl from 'leaflet/dist/images/marker-icon-2x.png';
import shadowUrl from 'leaflet/dist/images/marker-shadow.png';

export function initStaticMap(containerId, coords = [7.8250067, 98.3290741], zoom = 14) {
    const map = L.map(containerId, {
        center: coords,
        zoom: zoom,
        zoomControl: false,        // ❌ отключает кнопки +/-
        dragging: false,           // ❌ отключает перетаскивание
        scrollWheelZoom: false,    // ❌ отключает zoom колесом мыши
        doubleClickZoom: false,    // ❌ отключает zoom по двойному клику
        boxZoom: false,            // ❌ отключает zoom по выделению области
        keyboard: false,           // ❌ отключает управление клавиатурой
        touchZoom: false,          // ❌ отключает pinch-to-zoom на мобильных
        tap: false                 // ❌ отключает touch-события (если подключен leaflet.tap)
    });
    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '',
        subdomains: 'abcd',
        maxZoom: 19
    }).addTo(map);

    L.Marker.prototype.options.icon = L.icon({
        iconUrl,
        iconRetinaUrl,
        shadowUrl,
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });
    L.marker(coords).addTo(map).bindPopup('Точка интереса');
}
