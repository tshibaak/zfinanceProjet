<?php $flash = \App\Core\Session::takeFlash(); ?>
<?php if ($flash): ?>
<div id="popupOverlay" class="popup-overlay">
    <div class="popup-content <?= e($flash['type']) ?>">
        <span class="close-popup">&times;</span>
        <h3><?= $flash['type'] === 'success' ? '✅ Succès' : '❌ Erreur' ?></h3>
        <p><?= e($flash['message']) ?></p>
    </div>
</div>
<?php endif; ?>
