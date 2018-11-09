# Web Dev Examen Opdracht
## Nutella Wedstrijd door Jens Van Assche

### Details
Dit is mijn examenopdracht voor het vak Web Development. De bedoeling was om een wedstrijd website te maken op basis van periodes en een zelf gekozen wedstrijd mechanisme. Ik heb gekozen voor een op voorhand ingestelde code in te geven die op een fictieve verpakking zou kunnen staan.

### Setup:
Laravel en MySQL zouden al geïnstalleerd moeten zijn, zoniet doe dit eerst!

Stap 1: pull van github \
Stap 2: voer command uit: composer install \
Stap 3: copieer .env.example naar .env en vul correcte db data in \
Stap 4: maak een database aan en voer commands uit: php artisan make:auth en php artisan migrate \
Stap 5: voer command uit: php artisan key:generate \
Stap 6: voer command uit: php artisan db:seed voor de admin user toe te voegen \

De setup is nu klaar, er moeten nog een paar dingen gebeuren om de webstrijd up en running te hebben

Stap 7: log je in op /login \
gegevens zijn: \
email: admin@nutella.com \
password: password \
Stap 8: ga naar /dashboard en vul de periodes en codes in