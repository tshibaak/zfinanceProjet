<?php /** Variables : $subscribers */ ?>
<div class="header"><h1>Abonnés Newsletter (<?= count($subscribers) ?>)</h1></div>
<div class="table-container">
    <table>
        <thead><tr><th>Email</th><th>Date d'inscription</th></tr></thead>
        <tbody>
        <?php foreach ($subscribers as $s): ?>
            <tr><td><?= e($s['email']) ?></td><td><?= date('d/m/Y H:i', strtotime($s['created_at'])) ?></td></tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
