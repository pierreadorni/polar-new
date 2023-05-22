<p align="center" style="display: flex; align-items: center; font-size: 24pt; justify-content: center">
<a href="https://assos.utc.fr/polar" target="_blank" style=""><img src="https://assos.utc.fr/images/assos/6e64aa20-3af5-11e9-915e-f3b800ff53e4/1551316140.png" width="400" height="100" alt="Polar Logo" style="object-fit: contain"></a>
<svg style="transform: scale(2)" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="none" stroke="#000" stroke-width="2" d="M7,7 L17,17 M7,17 L17,7"></path></svg>
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo" style="max-width: 100%;">
</p>

# Nouveau site du polar

Ceci est le repo du nouveau site du polar, développé dans le contexte de l'UV LO18 par Alexia Rolland, [Xavier Lemerle](https://github.com/LemerleXavier) et [Pierre Adorni](https://github.com/pierreadorni).

## Installation

### Prérequis

- PHP 8.1
- [Composer](https://getcomposer.org/download/)
- [NodeJS](https://nodejs.org/en/download/)

### Installation des dépendances

```bash
composer install
```

```bash
npm install
```

### Configuration

Copier le fichier `.env.example` en `.env` et modifier les variables d'environnement si besoin.
Exemple de configuration BDD rapide avec SQLite : 

```bash
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

### Génération de la clé d'application

```bash
php artisan key:generate
```

## Développement

Lancer le serveur vite pour le front
```bash
npm run dev
```

Lancer le serveur PHP
```bash
php artisan serve
```

Et à vos claviers !
