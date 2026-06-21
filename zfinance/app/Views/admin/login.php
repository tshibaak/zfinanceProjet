<?php /** Vue login admin (sans layout). Variables : $error */ ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin · Zfinances</title>
    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'Inter','Segoe UI',sans-serif;background:#F0F0FF;display:flex;justify-content:center;align-items:center;min-height:100vh;color:#000066}
        .login-container{background:#fff;padding:40px;border-radius:14px;box-shadow:0 12px 40px rgba(0,0,255,.12);width:100%;max-width:400px}
        h2{color:#0000FF;text-align:center;margin-bottom:24px;font-size:24px;font-weight:700}
        .error-message{background:#ffebee;color:#c62828;padding:12px;border-radius:8px;border-left:4px solid #e53935;margin-bottom:20px;font-size:14px}
        .form-group{margin-bottom:20px}
        label{display:block;margin-bottom:8px;font-size:14px;color:#000099;font-weight:500}
        input{width:100%;padding:12px;border:1.5px solid #CCCCFF;border-radius:8px;font-size:15px;outline:none;transition:border-color .2s,box-shadow .2s}
        input:focus{border-color:#0000FF;box-shadow:0 0 0 3px rgba(0,0,255,.12)}
        button{width:100%;padding:12px;background:#0000FF;color:#fff;border:none;border-radius:8px;font-size:16px;font-weight:600;cursor:pointer;transition:background .2s}
        button:hover{background:#0000CC}
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Connexion Admin</h2>
        <?php if (!empty($error)): ?><div class="error-message"><?= e($error['message']) ?></div><?php endif; ?>
        <form method="POST" action="<?= base_url('/admin/login') ?>">
            <?= csrf_field() ?>
            <div class="form-group"><label for="username">Utilisateur</label><input type="text" id="username" name="username" required autocomplete="username"></div>
            <div class="form-group"><label for="password">Mot de passe</label><input type="password" id="password" name="password" required></div>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>
