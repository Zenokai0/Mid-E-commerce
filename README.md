## Database structure

````
**** Sample Project ****
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
# su8_sample_project
