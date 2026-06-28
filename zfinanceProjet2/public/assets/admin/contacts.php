<?php

session_start();

if(empty($_SESSION['admin_logged'])){
    header('Location: login.php');
    exit;
}

require __DIR__ . "/../../../src/config/db.php";

$contacts = $db->query("
    SELECT *
    FROM contacts
    ORDER BY created_at DESC
")->fetchAll(PDO::FETCH_ASSOC);

?>
<html>

<head>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>

<body>

<div class="sidebar">

    <h2>ADMIN</h2>

    <ul>

        <li>
            <a href="dashboard.php">🏠 Dashboard</a>
        </li>

        <li>
            <a href="contacts.php">📩 Messages Contact(<?= count($contacts) ?>)</a> 
        </li>

        <li>
            <a href="newsletter.php">📧 Newsletter</a>
        </li>

        <li>
            <a href="testimonials.php">⭐ Témoignages</a>
        </li>

        <li>
            <a href="../../index.php?q=accueil">↩ Retour au site</a>
        </li>

        <li>
            <a href="logout.php">🚪 Déconnexion</a>
        </li>

    </ul>

</div>
<div class="main">

    <div class="table-container">
        <table>

            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Sujet</th>
                    <th>Statut</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

            <?php foreach($contacts as $contact): ?>

                <tr>

                    <td><?= htmlspecialchars($contact['nom']) ?></td>

                    <td><?= htmlspecialchars($contact['email']) ?></td>

                    <td><?= htmlspecialchars($contact['sujet']) ?></td>

                    <td>

                        <?php if($contact['statut']=="lu"): ?>

                            <span class="badge badge-read">
                                Lu
                            </span>

                        <?php else: ?>

                            <span class="badge badge-unread">
                                Non lu
                            </span>

                        <?php endif; ?>

                    </td>

                    <td><?= date('d/m/Y H:i', strtotime($contact['created_at'])) ?></td>

                    <td>
<button
    class="action-btn btn-view"
    data-id="<?= $contact['id'] ?>"
    data-nom="<?= htmlspecialchars($contact['nom'], ENT_QUOTES, 'UTF-8') ?>"
    data-email="<?= htmlspecialchars($contact['email'], ENT_QUOTES, 'UTF-8') ?>"
    data-tel="<?= htmlspecialchars($contact['telephone'], ENT_QUOTES, 'UTF-8') ?>"
    data-message="<?= htmlspecialchars($contact['message'], ENT_QUOTES, 'UTF-8') ?>"
>
    Voir
</button>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>
    </div>
</div>
<!-- POPUP -->

<div id="messageModal" class="modal">

    <div class="modal-content">

        <span class="close" onclick="closeModal()">
            &times;
        </span>

        <h2>Détails du message</h2>

        <hr>

        <p>
            <strong>Nom :</strong>
            <span id="modalNom"></span>
        </p>

        <p>
            <strong>Email :</strong>
            <span id="modalEmail"></span>
        </p>

        <p>
            <strong>Téléphone :</strong>
            <span id="modalTel"></span>
        </p>

        <br>

        <p id="modalMessage"></p>

    </div>

</div>

<script>

    function showMessage(nom,email,tel,message){

        document.getElementById('modalNom').textContent = nom;
        document.getElementById('modalEmail').textContent = email;
        document.getElementById('modalTel').textContent = tel;
        document.getElementById('modalMessage').textContent = message;

        document.getElementById('messageModal').style.display = 'block';
    }

    function closeModal(){

        document.getElementById('messageModal').style.display = 'none';
    }

    window.onclick = function(event){

        const modal = document.getElementById('messageModal');

        if(event.target === modal){
            modal.style.display = 'none';
        }
    }
document.querySelectorAll('.btn-view').forEach(btn => {
    btn.addEventListener('click', function () {

        const id = this.dataset.id;

        const nom = this.dataset.nom;
        const email = this.dataset.email;
        const tel = this.dataset.tel;
        const message = this.dataset.message;

        document.getElementById('modalNom').textContent = nom;
        document.getElementById('modalEmail').textContent = email;
        document.getElementById('modalTel').textContent = tel;
        document.getElementById('modalMessage').textContent = message;

        document.getElementById('messageModal').style.display = 'block';

        // 🔥 update statut en base
        fetch('mark_as_read.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'id=' + encodeURIComponent(id)
        })
        .then(res => res.text())
        .then(res => {
            if (res === "ok") {
                // optionnel: update UI direct
                this.closest('tr')
                    .querySelector('.badge')
                    .textContent = 'Lu';
            }
        });

    });
});

document.getElementById('messageModal').addEventListener('click', function(event){
    if(event.target === this){
        this.style.display = 'none';
    }
});
</script>

</body>



</html>
