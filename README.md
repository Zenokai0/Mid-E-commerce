## Database structure


````
**** Project ****
+ user
+ product
	- id
	- name
	- price
	- category
	- image
	- description
+ user_cart
	- id
	- user_id
	- product_id
	- qty
+ order
	- id
	- user_id
	- datetime
	- total_amount
	- paid_amount
	- paid_by
+ order_item
	- id
	- product_id
	- price
	- qty
	- discount
	

````
### how to use

```
#clone the repo
git clone https://github.com/Zenokai0/Mid-E-commerce.git

#change directory to project
cd Midterm-E-Commerce

#create a .env file in Midterm-E-Commerce/.env
#copy all the details from .env.example
#add your db password(mysql root pw)
#also create db in mysql and add that db name to .env

#run
composer install
php artisan key:generate

#run this if you just created the db
php artisan migrate --seed

#else (this will reset the db to original)
php artisan migrate:fresh --seed

php artisan serve

```
