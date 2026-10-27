// assets/js/app.js

let favorites = new Set();
let selectedCalcTerm = 24;

document.addEventListener('DOMContentLoaded', () => {
    setupCalculator();
    updateFavCounterUI();

    // Menú móvil
    document.getElementById('mobileMenuBtn').addEventListener('click', () => {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    });
    
    document.querySelectorAll('.mobile-link').forEach(link => {
        link.addEventListener('click', () => document.getElementById('mobileMenu').classList.add('hidden'));
    });
});

// --- MODALES ---
function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// --- DETALLE DEL AUTO ---
function openDetailModal(car) {
    const content = document.getElementById('modalDetailContent');
    
    content.innerHTML = `
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div>
                <img src="${car.image}" class="w-full h-80 object-cover rounded-2xl">
            </div>
            <div>
                <span class="text-xs font-bold text-red-500 uppercase">${car.brand}</span>
                <h2 class="text-3xl font-extrabold text-white mt-1">${car.model}</h2>
                <p class="text-2xl font-black text-white mt-2">$${car.price.toLocaleString()} USD</p>
                
                <div class="grid grid-cols-2 gap-3 mt-6 p-4 bg-slate-950 border border-slate-800 rounded-xl text-xs">
                    <div><span class="text-slate-500">Motor:</span> <p class="font-bold text-slate-200">${car.engine}</p></div>
                    <div><span class="text-slate-500">Potencia:</span> <p class="font-bold text-slate-200">${car.hp}</p></div>
                    <div><span class="text-slate-500">Transmisión:</span> <p class="font-bold text-slate-200">${car.trans}</p></div>
                    <div><span class="text-slate-500">Tracción:</span> <p class="font-bold text-slate-200">${car.traction}</p></div>
                </div>

                <div class="grid grid-cols-2 gap-3 mt-8">
                    <button onclick="closeModal('detailModal'); openAppointmentModal('${car.brand} ${car.model}')" class="py-3 bg-red-600 text-white font-bold rounded-xl">Prueba Manejo</button>
                    <button onclick="closeModal('detailModal'); scrollToFinancing(${car.price})" class="py-3 bg-slate-800 text-white font-bold rounded-xl">Cotizar Crédito</button>
                </div>
            </div>
        </div>
    `;
    openModal('detailModal');
}

// --- FAVORITOS ---
function toggleFavorite(id, event) {
    if(event) event.stopPropagation();
    if (favorites.has(id)) {
        favorites.delete(id);
        showToast('Eliminado de favoritos', 'info');
    } else {
        favorites.add(id);
        showToast('Añadido a favoritos ❤️', 'success');
    }
    updateFavCounterUI();
    renderFavoritesList();
}

function updateFavCounterUI() {
    document.getElementById('favCounter').innerText = favorites.size;
    document.getElementById('mobileFavCounter').innerText = favorites.size;
}

function openFavoritesModal() {
    renderFavoritesList();
    openModal('favoritesModal');
}

function renderFavoritesList() {
    const container = document.getElementById('favModalList');
    container.innerHTML = '';
    if (favorites.size === 0) {
        container.innerHTML = `<p class="text-center text-slate-500 py-10">No tienes favoritos aún.</p>`;
        return;
    }
    // Nota: Aquí necesitaríamos que PHP pase el arreglo de autos a JS para buscar los datos. 
    // Una forma rápida es poner el arreglo en un data-attribute en el HTML, pero por ahora lo dejamos simple.
}

// --- CALCULADORA ---
function setupCalculator() {
    ['calcPrice', 'calcDown', 'calcRate'].forEach(id => {
        document.getElementById(id).addEventListener('input', calculateFinancing);
    });
    calculateFinancing();
}

function setCalcTerm(meses) {
    selectedCalcTerm = meses;
    document.querySelectorAll('.term-btn').forEach(btn => {
        if(parseInt(btn.dataset.term) === meses) {
            btn.classList.add('bg-red-600', 'text-white');
        } else {
            btn.classList.remove('bg-red-600', 'text-white');
        }
    });
    calculateFinancing();
}

function calculateFinancing() {
    const price = parseFloat(document.getElementById('calcPrice').value);
    const downPercent = parseFloat(document.getElementById('calcDown').value);
    const annualRate = parseFloat(document.getElementById('calcRate').value);
    
    const loanAmount = price - (price * (downPercent / 100));
    const monthlyRate = (annualRate / 100) / 12;
    let monthlyPayment = 0;

    if (monthlyRate > 0) {
        monthlyPayment = loanAmount * (monthlyRate * Math.pow(1 + monthlyRate, selectedCalcTerm)) / (Math.pow(1 + monthlyRate, selectedCalcTerm) - 1);
    } else {
        monthlyPayment = loanAmount / selectedCalcTerm;
    }

    document.getElementById('calcPriceDisplay').innerText = `$${price.toLocaleString()} USD`;
    document.getElementById('calcDownDisplay').innerText = `$${Math.round(price * (downPercent / 100)).toLocaleString()} USD`;
    document.getElementById('monthlyPaymentDisplay').innerText = Math.round(monthlyPayment).toLocaleString();
}

function scrollToFinancing(price) {
    document.getElementById('calcPrice').value = price;
    calculateFinancing();
    document.getElementById('financiamiento').scrollIntoView({ behavior: 'smooth' });
}

// --- TOASTS ---
function showToast(message, type = 'info') {
    const container = document.getElementById('toastContainer');
    const toast = document.createElement('div');
    toast.className = `p-4 rounded-xl border text-xs font-bold ${type === 'success' ? 'bg-emerald-900 text-white' : 'bg-slate-900 text-white'}`;
    toast.innerText = message;
    container.appendChild(toast);
    setTimeout(() => { toast.remove(); }, 3000);
}