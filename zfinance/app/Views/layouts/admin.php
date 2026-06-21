<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($title ?? 'Admin') ?> · Zfinances</title>
    <link rel="stylesheet" href="<?= base_url('/assets/admin/admin.css') ?>">
</head>
<body>
<div class="sidebar">
    <h2>ADMIN · Zfinances</h2>
    <ul>
        <li><a href="<?= base_url('/admin') ?>" class="<?= ($active ?? '') === 'dashboard' ? 'active' : '' ?>">🏠 Dashboard</a></li>
        <li><a href="<?= base_url('/admin/contacts') ?>" class="<?= ($active ?? '') === 'contacts' ? 'active' : '' ?>">📩 Messages</a></li>
        <li><a href="<?= base_url('/admin/newsletter') ?>" class="<?= ($active ?? '') === 'newsletter' ? 'active' : '' ?>">📧 Newsletter</a></li>
        <li><a href="<?= base_url('/admin/testimonials') ?>" class="<?= ($active ?? '') === 'testimonials' ? 'active' : '' ?>">⭐ Témoignages</a></li>
        <li>
            <form method="POST" action="<?= base_url('/admin/logout') ?>" style="margin:0;">
                <?= csrf_field() ?>
                <button type="submit" class="logout-btn">🚪 Déconnexion</button>
            </form>
        </li>
    </ul>
</div>
<div class="main">
    <?php $flash = \App\Core\Session::takeFlash(); ?>
    <?php if ($flash): ?><div class="flash flash-<?= e($flash['type']) ?>"><?= e($flash['message']) ?></div><?php endif; ?>
    <?= $content ?>
</div>
</body>
</html>
