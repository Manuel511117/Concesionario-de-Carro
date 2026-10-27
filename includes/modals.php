<!-- Modal Detalle -->
<div id="detailModal" class="fixed inset-0 z-50 hidden bg-ink/80 flex items-center justify-center p-4" role="dialog" aria-modal="true" aria-label="Detalle vehículo">
    <div class="bg-surface border border-gold-border w-full max-w-4xl rounded-3xl p-8 relative max-h-[90vh] overflow-y-auto">
        <button onclick="closeModal('detailModal')" aria-label="<?= __('modal_close') ?>" class="absolute top-4 right-4 text-white hover:text-gold"><i class="fa-solid fa-xmark text-2xl"></i></button>
        <div id="modalDetailContent"></div>
    </div>
</div>

<!-- Modal Cita -->
<div id="appointmentModal" class="fixed inset-0 z-50 hidden bg-ink/80 flex items-center justify-center p-4" role="dialog" aria-modal="true" aria-label="<?= __('modal_appt_title') ?>">
    <div class="bg-surface border border-gold-border w-full max-w-lg rounded-3xl p-8 relative">
        <button onclick="closeModal('appointmentModal')" aria-label="<?= __('modal_close') ?>" class="absolute top-4 right-4 text-white hover:text-gold"><i class="fa-solid fa-xmark text-2xl"></i></button>
        <h3 class="text-2xl font-bold text-white mb-4"><?= __('modal_appt_title') ?></h3>
        <form onsubmit="submitAppointment(event)" class="space-y-4">
            <input type="text" id="apptCarName" placeholder="<?= __('modal_appt_car') ?>" class="w-full bg-ink border border-gold-border rounded-xl p-3 text-white" readonly>
            <input type="text" name="nombre" placeholder="<?= __('modal_appt_name') ?>" class="w-full bg-ink border border-gold-border rounded-xl p-3 text-white focus:border-gold focus:outline-none" required>
            <input type="email" name="email" placeholder="Email" class="w-full bg-ink border border-gold-border rounded-xl p-3 text-white focus:border-gold focus:outline-none" required>
            <input type="datetime-local" name="fecha" class="w-full bg-ink border border-gold-border rounded-xl p-3 text-white focus:border-gold focus:outline-none" required>
            <button type="submit" class="w-full py-3 btn-gold rounded-xl"><?= __('modal_appt_confirm') ?></button>
        </form>
    </div>
</div>