<!-- Modal Detalle -->
<div id="detailModal" class="fixed inset-0 z-50 hidden bg-slate-950/80 flex items-center justify-center p-4">
    <div class="bg-slate-900 border border-slate-800 w-full max-w-4xl rounded-3xl p-8 relative">
        <button onclick="closeModal('detailModal')" class="absolute top-4 right-4 text-white hover:text-red-500"><i class="fa-solid fa-xmark text-2xl"></i></button>
        <div id="modalDetailContent"></div>
    </div>
</div>

<!-- Modal Cita -->
<div id="appointmentModal" class="fixed inset-0 z-50 hidden bg-slate-950/80 flex items-center justify-center p-4">
    <div class="bg-slate-900 border border-slate-800 w-full max-w-lg rounded-3xl p-8 relative">
        <button onclick="closeModal('appointmentModal')" class="absolute top-4 right-4 text-white hover:text-red-500"><i class="fa-solid fa-xmark text-2xl"></i></button>
        <h3 class="text-2xl font-bold text-white mb-4">Agendar Prueba</h3>
        <form onsubmit="event.preventDefault(); closeModal('appointmentModal'); alert('Cita agendada');" class="space-y-4">
            <input type="text" id="apptCarName" placeholder="Vehículo de interés" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-white" readonly>
            <input type="text" placeholder="Tu Nombre" class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-white" required>
            <button type="submit" class="w-full py-3 bg-red-600 text-white font-bold rounded-xl">Confirmar</button>
        </form>
    </div>
</div>