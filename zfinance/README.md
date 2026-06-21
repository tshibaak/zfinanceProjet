# Zfinances — Application web (architecture MVC)

Refactorisation complète du site corporate **Zfinances** (cabinet d'expertise comptable & audit, Kinshasa)
en une architecture **MVC** claire, sécurisée et maintenable.

## Pourquoi cette refonte ?

Le code d'origine mélangeait tout : SQL dans les vues, `require` de fichiers PHP en dur,
mots de passe en clair, pas de routeur, duplication du header/sidebar dans chaque page,
deux fichiers `db.php` différents. Cette version sépare proprement les responsabilités.

## Architecture

```
zfinance/
├── public/                 ← SEUL dossier exposé au web (document root)
│   ├── index.php           ← Front controller (point d'entrée unique)
│   ├── .htaccess           ← Réécrit toutes les URLs vers index.php
│   └── assets/             ← CSS, JS, images publiques
├── app/
│   ├── Core/               ← Le "framework" maison
│   │   ├── Database.php    ← Connexion PDO (singleton)
│   │   ├── Router.php      ← Associe URL → Contrôleur@méthode
│   │   ├── Controller.php  ← Classe de base (rendu des vues)
│   │   ├── Model.php       ← Classe de base (accès PDO)
│   │   ├── Request.php     ← Encapsule $_GET / $_POST / méthode HTTP
│   │   ├── Validator.php   ← Validation des entrées (regex, requis…)
│   │   ├── Session.php     ← Démarrage session + messages flash
│   │   ├── Csrf.php        ← Jeton anti-CSRF
│   │   └── Auth.php        ← Garde d'accès admin (middleware)
│   ├── Controllers/        ← Logique applicative
│   │   ├── HomeController.php
│   │   ├── ContactController.php
│   │   ├── NewsletterController.php
│   │   └── Admin/
│   │       ├── AuthController.php
│   │       ├── DashboardController.php
│   │       ├── ContactController.php
│   │       ├── NewsletterController.php
│   │       └── TestimonialController.php
│   ├── Models/             ← Accès aux données (1 classe = 1 table)
│   │   ├── Contact.php
│   │   ├── Subscriber.php
│   │   ├── Testimonial.php
│   │   └── Admin.php
│   └── Views/              ← Présentation (HTML, aucun SQL)
│       ├── layouts/        ← Gabarits public.php / admin.php
│       ├── partials/       ← Header, footer, flash, marquee…
│       ├── home/           ← Page d'accueil enrichie
│       └── admin/          ← Pages d'administration
├── routes/web.php          ← Déclaration de toutes les routes
├── config/                 ← Configuration (DB, app)
└── database/               ← schema.sql + seed.php
```

## Flux d'une requête

1. Le serveur envoie **toute** requête à `public/index.php` (grâce au `.htaccess`).
2. `index.php` charge la config, l'autoloader et `routes/web.php`.
3. Le **Router** trouve la route correspondante et instancie le **Contrôleur**.
4. Le contrôleur valide les données (**Validator**), appelle le **Model** (PDO préparé),
   puis rend une **Vue** via un **layout**.

## Améliorations de sécurité

| Avant | Après |
|-------|-------|
| Mot de passe admin en clair (`admin123`) | `password_hash()` / `password_verify()` |
| Accès direct aux fichiers `.php` | Routeur + front controller unique |
| SQL écrit dans les vues | Models dédiés, requêtes préparées partout |
| Aucune protection CSRF | Jeton CSRF sur tous les formulaires POST |
| Garde admin copiée dans chaque page | Middleware `Auth::requireAdmin()` |
| Header/sidebar dupliqués | Layouts + partials réutilisables |

## Installation

```bash
# 1. Base de données
mysql -u root -p < database/schema.sql
php database/seed.php          # crée le compte admin (hash)

# 2. Config : éditer config/config.php (identifiants DB)

# 3. Servir le dossier public/
php -S localhost:8000 -t public
```

- Site public : `http://localhost:8000/`
- Admin : `http://localhost:8000/admin/login` (admin / admin123 — à changer)

> Le rendu visuel enrichi (photos finance, dynamiques, marquee « Ils nous font confiance »)
> est prototypé dans **`Zfinances Site.dc.html`** à la racine du projet, et repris dans
> `app/Views/home/index.php` + `public/assets/css/trust.css`.
