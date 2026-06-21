<?php /** Variables : $testimonials */ ?>
<div class="header"><h1>Témoignages (<?= count($testimonials) ?>)</h1></div>

<div class="table-container" style="margin-bottom:24px;padding:20px;">
    <h3 style="margin-bottom:14px;color:#000066;">Ajouter un témoignage</h3>
    <form method="POST" action="<?= base_url('/admin/testimonials') ?>" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(180px,1fr));gap:12px;align-items:end;">
        <?= csrf_field() ?>
        <div><label>Auteur</label><input type="text" name="author" required style="width:100%;padding:9px;border:1px solid #CCCCFF;border-radius:6px;"></div>
        <div><label>Entreprise</label><input type="text" name="company" style="width:100%;padding:9px;border:1px solid #CCCCFF;border-radius:6px;"></div>
        <div><label>Note</label><select name="rating" style="width:100%;padding:9px;border:1px solid #CCCCFF;border-radius:6px;"><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></div>
        <div style="grid-column:1/-1;"><label>Message</label><textarea name="message" required rows="2" style="width:100%;padding:9px;border:1px solid #CCCCFF;border-radius:6px;"></textarea></div>
        <button type="submit" class="action-btn btn-view" style="height:38px;">Ajouter</button>
    </form>
</div>

<div class="table-container">
    <table>
        <thead><tr><th>Auteur</th><th>Entreprise</th><th>Message</th><th>Note</th><th>Date</th><th></th></tr></thead>
        <tbody>
        <?php foreach ($testimonials as $t): ?>
            <tr>
                <td><?= e($t['author']) ?></td>
                <td><?= e($t['company']) ?></td>
                <td><?= nl2br(e($t['message'])) ?></td>
                <td>⭐ <?= (int) $t['rating'] ?>/5</td>
                <td><?= date('d/m/Y', strtotime($t['created_at'])) ?></td>
                <td>
                    <form method="POST" action="<?= base_url('/admin/testimonials/delete') ?>" onsubmit="return confirm('Supprimer ?');" style="margin:0;">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id" value="<?= (int) $t['id'] ?>">
                        <button type="submit" class="action-btn btn-delete">Suppr.</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
