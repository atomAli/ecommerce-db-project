# E-R Schema Report
# E-commerce Database Project

## 1. Introduction

I designed a database for an online store. The system manages customers, products, orders, payments, reviews, and tags.

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

### Product
- product_id (PK)
- name
- description
- price
- stock_quantity
- category_id (FK)
- created_at

### Orders
- order_id (PK)
- customer_id (FK)
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
- rating
- comment
- review_date

### Tag
- tag_id (PK)
- name

### Product_Tag (Junction Table)
- product_id (PK, FK)
- tag_id (PK, FK)

## 3. Relationships

- Customer has many Orders (1:N)
- Customer has many Reviews (1:N)
- Category has many Products (1:N)
- Order has many OrderItems (1:N)
- Product has many OrderItems (1:N)
- Product has many Reviews (1:N)
- Order has one Payment (1:1)
- Product has many Tags (N:M) via Product_Tag
- Tag has many Products (N:M) via Product_Tag

## 4. Normalization

### 3NF

A table is in 3NF if it is in 2NF and no non-key column depends on another non-key column.

- Customer: all columns depend on customer_id. OK
- Category: all columns depend on category_id. OK
- Product: all columns depend on product_id. OK
- Orders: all columns depend on order_id. OK
- OrderItem: all columns depend on order_item_id. OK
- Payment: all columns depend on payment_id. OK
- Review: all columns depend on review_id. OK
- Tag: all columns depend on tag_id. OK
- Product_Tag: all columns are part of the composite primary key. OK

All tables are in 3NF.

### BCNF

A table is in BCNF if for every dependency X -> Y, X is a superkey.

- Customer: candidate keys are customer_id and email. OK
- Category: only candidate key is category_id. OK
- Product: only candidate key is product_id. OK
- Orders: only candidate key is order_id. OK
- OrderItem: only candidate key is order_item_id. OK
- Payment: candidate keys are payment_id and order_id. OK
- Review: only candidate key is review_id. OK
- Tag: only candidate key is tag_id. OK
- Product_Tag: composite primary key (product_id, tag_id) is the only candidate key. OK

All tables are in BCNF.

## 5. Conclusion

The database satisfies both 3NF and BCNF. All tables have proper primary keys and foreign keys. The Product_Tag junction table implements the Many-to-Many relationship between Product and Tag.
