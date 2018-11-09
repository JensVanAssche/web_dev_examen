# Web Dev Examen Opdracht
## Nutella Wedrijd by Jens Van Assche

### Setup:

Stap 1: pull van github \
Stap 2: voer command uit: composer install \
Stap 3: voer command uit: npm install \
Stap 4: copieer .env.example naar .env en vul correcte db data in \
Vul deze gegevens in voor de mailservice:

	MAIL_DRIVER=mailgun
	MAIL_HOST=smtp.mailgun.org
	MAIL_PORT=587
	MAIL_USERNAME=postmaster@sandbox5df5be4fc22a447eb999d3118dd24810.mailgun.org
	MAIL_PASSWORD=1edba08d42758b90bfd4c72e88155d57-4412457b-18ae7e32
	MAIL_ENCRYPTION=null

	MAILGUN_DOMAIN=sandbox5df5be4fc22a447eb999d3118dd24810.mailgun.org
	MAILGUN_SECRET=349c3a769b5f326e6af055e11b5fb10c-4412457b-cad19e72

Stap 5: voer command uit: php artisan key:generate \
Stap 6: maak een database aan en voer command uit: php artisan migrate \
Stap 7: voer command uit: php artisan db:seed voor de admin user toe te voegen \

De setup is nu klaar, er moeten nog een paar dingen gebeuren om de webstrijd op en running te hebben

Stap 8: log je in op /login \
gegevens zijn: \
email: admin@nutella.com \
password: password \
Stap 9: ga naar /dashboard en vul de periodes en codes in
