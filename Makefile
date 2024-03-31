setup:
	php artisan migrate:refresh --seed
	npm install

run:
	php artisan serve & npm run dev
	