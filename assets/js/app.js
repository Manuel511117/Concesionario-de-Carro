let favorites = new Set();
let selectedCalcTerm = 24;

document.addEventListener('DOMContentLoaded', () => {
    setupCalculator();
});

function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
    document.body.style.overflow = 'auto';
}

function openDetailModal(car) {
    const content = document.getElementById('modalDetailContent');
    content.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <img src="${car.image}" class="w-full h-64 object-cover rounded-2xl">
            <div>
                <span class="text-xs font-bold text-red-500 uppercase">${car.brand}</span>
                <h2 class="text-3xl font-extrabold text-white mt-1">${car.model}</h2>
                <p class="text-2xl font-black text-white mt-2">$${car.price.toLocaleString()} USD</p>
                <div class="mt-6 text-sm text-slate-300">
                    <p><strong>Motor:</strong> ${car.engine}</p>
                    <p><strong>Potencia:</strong> ${car.hp}</p>
                </div>
                <button onclick="closeModal('detailModal'); scrollToFinancing(${car.price})" class="mt-6 w-full py-3 bg-red-600 text-white font-bold rounded-xl">Cotizar Crédito</button>
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
    alert("Función de favoritos en construcción.");
}

function setupCalculator() {
    ['calcPrice', 'calcDown', 'calcRate'].forEach(id => {
        document.getElementById(id).addEventListener('input', calculateFinancing);
    });
    calculateFinancing();
}

function setCalcTerm(meses) {
    selectedCalcTerm = meses;
    document.querySelectorAll('.term-btn').forEach(btn => {
        if(parseInt(btn.dataset.term) === meses) btn.classList.add('bg-red-600', 'text-white');
        else btn.classList.remove('bg-red-600', 'text-white');
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