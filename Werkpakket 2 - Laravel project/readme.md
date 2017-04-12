# Werkwijze om project werkende te krijgen

## Database
*   Maak op je server naar keuze (ik heb ubuntu server gebruikt) een database genaamd 'laravel' aan
*   In het project ga naar de .env file
*   In de tweede alinea verander de gegevens die kloppen voor jou MySQL server. Bij mij was dit:
    *   DB_CONNECTION=mysql
    *   DB_HOST=192.168.241.140
    *   DB_PORT=3306
    *   DB_DATABASE=laravel
    *   DB_USERNAME=user
    *   DB_PASSWORD=user

## XAMPP
*   Om het project te kunnen runnen moet je XAMPP server (Apache) runnen.
*   In PHPStorm ga naar 'Tools' => 'Deployment' => 'Configuration' => Klik op groene kruisje
*   Name = XAMPP, Type = 'Local or mounted folder'  => OK
*   Bij 'Uploadload/download project files' moet je het pad naar de 'htdocs' folder van XAMPP geven. Bij mij is dit gewoon 'C:\xampp\htdocs'
*   Bij 'Browse files on server' moet je het pad naar je project opgeven, hier mag je gewoon 'http://localhost' plaatsen
*   Ga naar het tab 'Mappings'
*   Bij 'Deployment path..' zet je 'laravel'
*   Bij 'Web path...' zet je '/laravel'
*   Klik OK
*   In project explorer rechtklik bovenaan op het project en kies 'Upload to..' en kies 'XAMPP' (dit kan even duren)
*   Ga met een opdrachtprompt naar de projectmap en geef het volgende commando 'php artisan key:generate'
*   In je browser ga je naar <http://localhost:3307/laravel/public/people>
*   Success (hopefully) !





