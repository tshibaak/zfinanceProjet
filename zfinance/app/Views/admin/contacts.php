<?php /** Variables : $contacts */ ?>
<div class="header"><h1>Messages de contact (<?= count($contacts) ?>)</h1></div>
<div class="table-container">
    <table>
        <thead><tr><th>Nom</th><th>Email</th><th>Sujet</th><th>Statut</th><th>Date</th><th>Actions</th></tr></thead>
        <tbody>
        <?php foreach ($contacts as $c): ?>
            <tr>
                <td><?= e($c['nom']) ?></td>
                <td><?= e($c['email']) ?></td>
                <td><?= e($c['sujet']) ?></td>
                <td><?php if ($c['statut'] === 'lu'): ?><span class="badge badge-read">Lu</span><?php else: ?><span class="badge badge-unread">Non lu</span><?php endif; ?></td>
                <td><?= date('d/m/Y H:i', strtotime($c['created_at'])) ?></td>
                <td style="display:flex;gap:8px;">
                    <button class="action-btn btn-view"
                        data-id="<?= (int) $c['id'] ?>"
                        data-nom="<?= e($c['nom']) ?>"
                        data-email="<?= e($c['email']) ?>"
                        data-tel="<?= e($c['telephone']) ?>"
                        data-message="<?= e($c['message']) ?>">Voir</button>
                    <form method="POST" action="<?= base_url('/admin/contacts/delete') ?>" onsubmit="return confirm('Supprimer ce message ?');" style="margin:0;">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" value="<?= (int) $c['id'] ?>">
                        <button type="submit" class="action-btn btn-delete">Suppr.</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div id="messageModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Détails du message</h2><hr>
        <p><strong>Nom :</strong> <span id="modalNom"></span></p>
        <p><strong>Email :</strong> <span id="modalEmail"></span></p>
        <p><strong>Téléphone :</strong> <span id="modalTel"></span></p>
        <br><p id="modalMessage"></p>
    </div>
</div>

<script>
const CSRF = '<?= \App\Core\Csrf::token() ?>';
function closeModal(){ document.getElementById('messageModal').style.display='none'; }
window.onclick = e => { if(e.target === document.getElementById('messageModal')) closeModal(); };
document.querySelectorAll('.btn-view').forEach(btn => {
    btn.addEventListener('click', function(){
        document.getElementById('modalNom').textContent = this.dataset.nom;
        document.getElementById('modalEmail').textContent = this.dataset.email;
        document.getElementById('modalTel').textContent = this.dataset.tel;
        document.getElementById('modalMessage').textContent = this.dataset.message;
        document.getElementById('messageModal').style.display = 'block';
        fetch('<?= base_url('/admin/contacts/read') ?>', {
            method:'POST',
            headers:{'Content-Type':'application/x-www-form-urlencoded'},
            body:'id='+encodeURIComponent(this.dataset.id)+'&_csrf='+encodeURIComponent(CSRF)
        }).then(r=>r.json()).then(()=>{ const b=this.closest('tr').querySelector('.badge'); if(b){b.textContent='Lu';b.className='badge badge-read';} });
    });
});
</script>
