# DBMS-application



## Introduction:
The purpose of this database project is to create an e-commerce platform that showcases various coffee and coffee appliance brands to users. Through this platform, users can add products to their cart and make purchases. Additionally, users can contact the admin if they encounter any issues. This report provides a comprehensive overview of the database used to build the CaffeineEmporium e-commerce platform.


## Database Technologies Used:
The CaffeineEmporium e-commerce platform uses phpmyadmin(XAMPP), firebase (for contact page), php (together with html, css) to manage and update the database.


## Database Tables:
The CaffeineEmporium database consists of seven tables, including five entities and two relationships. The tables are as follows:

1. Accounts: This entity table contains the account details of users. It includes columns such as acc_id, name, surname, mail, and password.

2. AccountToCart: This relationship table establishes a link between the Accounts and Carts tables. It includes columns such as acc_id, cart_id, and status.

3. AllProducts: This relationship table establishes a link between the Carts, Coffees, and Equipments tables. It includes columns such as product_id, eq_id, and coffee_id.

4. Carts: This entity table contains the details of the products added to the cart by users. It includes columns such as cart_id, product_id, amount, and status.

5. Coffees: This entity table contains the details of the coffee products available on the platform. It includes columns such as coffee_id, coffee_name, brand, weight, taste, origin, description, image, and price.

6. Equipments: This entity table contains the details of the coffee appliances available on the platform. It includes columns such as eq_id, eq_name, eq_type, brand, description, image, and price.

7. Orders: This entity table contains the details of the orders made by users. It includes columns such as order_id, order_date, cart_id, and total_cost.


## Database Key Structure:
The CaffeineEmporium database has a well-structured key hierarchy to ensure data consistency and accuracy. The key structure is as follows:

* Accounts table: acc_id is the primary key.
* AccountToCart table: acc_id and cart_id are foreign keys referencing the Accounts and Carts tables, respectively.
* AllProducts table: product_id is the primary key, while coffee_id and eq_id are foreign keys referencing the Coffees and Equipments tables, respectively.
* Carts table: cart_id is the primary key, while product_id is a foreign key referencing the AllProducts table.
* Coffees table: coffee_id is the primary key.
* Equipments table: eq_id is the primary key.
* Orders table: order_id is the primary key, while cart_id is a foreign key referencing the Carts table.


## Database Functionality:
The CaffeineEmporium e-commerce platform has both an admin panel and a user panel to manage and update the data. The admin panel allows for the retrieval, insertion, updating, and deletion of data from the database. The user panel, on the other hand, allows users to create their accounts, log in, and manage most of the data related to their accounts.


## Database User Interface:
The CaffeineEmporium database is accessed through a user interface created using css, html, and php. The interface allows users to interact with the database and perform various functions such as adding products to their carts and making purchases.


## Conclusion:
The CaffeineEmporium e-commerce platform is built on a robust and well-structured database that enables seamless management of data


## How to use this repository:

1. download the XAMPP from https://www.apachefriends.org/tr/download.html
2. Start MySQL Database, ProFTPD and apache Web Server from XAMPP manager.
3. import "CaffeineEmporium_SQL.sql" located in this repository to phpmyadmin database.
4. import "AdminPanel", "UserPanel" and "firebase_ChattingExtension" to "htdocs" file which comes after downloading the XAMPP.

Firebase real time database uri: "https://caffeineemporium-342a9-default-rtdb.firebaseio.com/".
mail to: "mertziya@sabanciuniv.edu" to have access to firebase realtime database
