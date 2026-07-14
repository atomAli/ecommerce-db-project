# E-R Schema Report
# E-commerce Customer and Order Management

## 1. Introduction

In this project I designed a database for an online store. The system manages customers, products, categories, orders, payments, and reviews. I used the Entity-Relationship model and ensured the database follows 3NF and BCNF.

## 2. Entities

### Customer
- customer_id (PK)
- first_name
- last_name
- email (UNIQUE)
- phone
- password_hash
- registration_date

### Category
- category_id (PK)
- name
- description
- parent_category_id (FK, self-referencing)

### Product
- product_id (PK)
- name
- description
- price
- stock_quantity
- category_id (FK)
- created_at

### Address
- address_id (PK)
- customer_id (FK)
- address_line1
- address_line2
- city
- state
- zip_code
- country
- is_default

### Orders
- order_id (PK)
- customer_id (FK)
- address_id (FK)
- order_date
- status
- total_amount

### OrderItem
- order_item_id (PK)
- order_id (FK)
- product_id (FK)
- quantity
- unit_price

### Payment
- payment_id (PK)
- order_id (FK, UNIQUE)
- payment_date
- amount
- payment_method
- status

### Review
- review_id (PK)
- product_id (FK)
- customer_id (FK)
- rating (1-5)
- comment
- review_date

## 3. Relationships

- Customer has many Addresses (1:N)
- Customer has many Orders (1:N)
- Customer has many Reviews (1:N)
- Category has many Products (1:N)
- Order has many OrderItems (1:N)
- Product has many OrderItems (1:N)
- Product has many Reviews (1:N)
- Order has one Payment (1:1)
- Order belongs to one Address (N:1)

## 4. Normalization

### 3NF (Third Normal Form)

A table is in 3NF when:
1. It is in 2NF
2. No non-key column depends on another non-key column

I checked all tables:

- Customer: all columns depend only on customer_id. No transitive dependencies. OK
- Category: all columns depend only on category_id. OK
- Product: all columns depend only on product_id. The category_id is a foreign key, not a transitive dependency. OK
- Address: all columns depend only on address_id. OK
- Orders: all columns depend only on order_id. OK
- OrderItem: all columns depend only on order_item_id. OK
- Payment: all columns depend only on payment_id. OK
- Review: all columns depend only on review_id. OK

All tables are in 3NF.

### BCNF (Boyce-Codd Normal Form)

A table is in BCNF when for every dependency X -> Y, X is a superkey.

- Customer: the only candidate keys are customer_id and email. Both are superkeys. OK
- Category: only candidate key is category_id. OK
- Product: only candidate key is product_id. OK
- Address: only candidate key is address_id. OK
- Orders: only candidate key is order_id. OK
- OrderItem: only candidate key is order_item_id. OK
- Payment: candidate keys are payment_id and order_id (because of UNIQUE constraint). Both are superkeys. OK
- Review: only candidate key is review_id. OK

All tables are in BCNF.

## 5. Conclusion

The database design satisfies both 3NF and BCNF. All tables have proper primary keys and foreign keys. The relationships correctly represent the business rules of an e-commerce system.
