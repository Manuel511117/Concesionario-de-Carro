let favorites = JSON.parse(localStorage.getItem('apex_favs') || '[]');
let selectedCalcTerm = 24;

document.addEventListener('DOMContentLoaded', () => {
    setupCalculator();
    updateFavCounter();
    setupDetailClose();
});

function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    const f = document.getElementById(id).querySelector('button, input, select');
    if (f) f.focus();
}
function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
    document.body.style.overflow = 'auto';
}
function setupDetailClose() {
    document.querySelectorAll('#detailModal, #appointmentModal').forEach(m => {
        m.addEventListener('click', e => { if (e.target === m) closeModal(m.id); });
    });
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') { closeModal('detailModal'); closeModal('appointmentModal'); }
    });
}

function openDetailModal(car) {
    const c = document.getElementById('modalDetailContent');
    c.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <img src="${car.image}" alt="${car.brand} ${car.model}" class="w-full h-64 object-cover rounded-2xl">
            <div>
                <span class="text-xs font-bold gold-text uppercase">${car.brand}</span>
                <h2 class="text-3xl font-extrabold text-white mt-1">${car.model}</h2>
                <p class="text-2xl font-black gold-text mt-2">$${Number(car.price).toLocaleString()} USD</p>
                <div class="mt-6 text-sm text-slate-300 space-y-1">
                    <p><strong>Año:</strong> ${car.year}</p>
                    <p><strong>Motor:</strong> ${car.engine || '-'}</p>
                    <p><strong>Potencia:</strong> ${car.hp || '-'}</p>
                    <p><strong>Transmisión:</strong> ${car.trans || '-'}</p>
                    <p><strong>Combustible:</strong> ${car.fuel || '-'}</p>
                    <p><strong>Tracción:</strong> ${car.traction || '-'}</p>
                    <p><strong>Kilometraje:</strong> ${car.mileage}</p>
                </div>
                <button onclick="closeModal('detailModal'); scrollToFinancing(${car.price})" class="mt-6 w-full py-3 btn-gold rounded-xl">Cotizar Crédito</button>
            </div>
        </div>
    `;
    openModal('detailModal');
}

function openAppointmentModal(carName = 'Consulta General') {
    document.getElementById('apptCarName').value = carName;
    openModal('appointmentModal');
}

function openFavoritesModal() {
    const list = favorites.length ? favorites.join(', ') : 'No tienes favoritos aún.';
    alert('Favoritos: ' + list);
}

function toggleFavorite(id) {
    const i = favorites.indexOf(id);
    if (i > -1) favorites.splice(i, 1); else favorites.push(id);
    localStorage.setItem('apex_favs', JSON.stringify(favorites));
    updateFavCounter();
}
function updateFavCounter() {
    const el = document.getElementById('favCounter');
    if (el) el.textContent = favorites.length;
}

function setupCalculator() {
    const ids = ['calcPrice', 'calcDown', 'calcRate'];
    ids.forEach(id => {
        const el = document.getElementById(id);
        if (el) el.addEventListener('input', () => {
            if (id === 'calcRate') {
                const rate = document.getElementById('calcRateDisplay');
                if (rate) rate.textContent = el.value + '%';
            }
            calculateFinancing();
        });
    });
    calculateFinancing();
}

function setCalcTerm(meses) {
    selectedCalcTerm = meses;
    document.querySelectorAll('.term-btn').forEach(btn => {
        if (parseInt(btn.dataset.term) === meses) {
            btn.classList.add('bg-gold', 'text-black');
            btn.classList.remove('bg-surface', 'text-slate-300');
        } else {
            btn.classList.remove('bg-gold', 'text-black');
            btn.classList.add('bg-surface', 'text-slate-300');
        }
    });
    calculateFinancing();
}

function calculateFinancing() {
    const price = parseFloat(document.getElementById('calcPrice')?.value || 0);
    const downPercent = parseFloat(document.getElementById('calcDown')?.value || 0);
    const annualRate = parseFloat(document.getElementById('calcRate')?.value || 0);
    const loanAmount = price - (price * (downPercent / 100));
    const monthlyRate = (annualRate / 100) / 12;
    let monthlyPayment = 0;
    if (monthlyRate > 0) {
        monthlyPayment = loanAmount * (monthlyRate * Math.pow(1 + monthlyRate, selectedCalcTerm)) / (Math.pow(1 + monthlyRate, selectedCalcTerm) - 1);
    } else {
        monthlyPayment = loanAmount / selectedCalcTerm;
    }
    const set = (id, val) => { const e = document.getElementById(id); if (e) e.textContent = val; };
    set('calcPriceDisplay', `$${price.toLocaleString()} USD`);
    set('calcDownDisplay', `$${Math.round(price * (downPercent / 100)).toLocaleString()} USD`);
    set('monthlyPaymentDisplay', Math.round(monthlyPayment).toLocaleString());
}

function scrollToFinancing(price) {
    const p = document.getElementById('calcPrice');
    if (p) { p.value = price; calculateFinancing(); }
    document.getElementById('financiamiento')?.scrollIntoView({ behavior: 'smooth' });
}

function toast(msg, type = 'ok') {
    const box = document.getElementById('toastContainer');
    if (!box) return;
    const el = document.createElement('div');
    el.className = `px-4 py-3 rounded-xl shadow-lg text-sm font-semibold ${type === 'ok' ? 'bg-gold text-black' : 'bg-red-600 text-white'}`;
    el.textContent = msg;
    box.appendChild(el);
    setTimeout(() => el.remove(), 3500);
}

async function submitContact(e) {
    e.preventDefault();
    const fd = new FormData(e.target);
    try {
        const r = await fetch('api/contacto.php', { method: 'POST', body: fd });
        const j = await r.json();
        toast(j.message, j.ok ? 'ok' : 'err');
        if (j.ok) e.target.reset();
    } catch { toast('Error de red', 'err'); }
}
async function submitSellLead(e) {
    e.preventDefault();
    const fd = new FormData(e.target);
    try {
        const r = await fetch('api/vender.php', { method: 'POST', body: fd });
        const j = await r.json();
        toast(j.message, j.ok ? 'ok' : 'err');
        if (j.ok) e.target.reset();
    } catch { toast('Error de red', 'err'); }
}
async function submitAppointment(e) {
    e.preventDefault();
    const fd = new FormData(e.target);
    fd.append('car_name', document.getElementById('apptCarName').value);
    try {
        const r = await fetch('api/cita.php', { method: 'POST', body: fd });
        const j = await r.json();
        toast(j.message, j.ok ? 'ok' : 'err');
        if (j.ok) { closeModal('appointmentModal'); e.target.reset(); }
    } catch { toast('Error de red', 'err'); }
}