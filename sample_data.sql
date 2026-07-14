USE ecommerce_db;

INSERT INTO category (name, description) VALUES
('Electronics', 'Electronic devices'),
('Clothing', 'Clothes and fashion');

INSERT INTO product (name, description, price, stock_quantity, category_id, created_at) VALUES
('Laptop', 'High performance laptop', 999.99, 50, 1, NOW()),
('Smartphone', 'Latest smartphone', 699.99, 100, 1, NOW()),
('Tablet', '10 inch tablet', 399.99, 40, 1, NOW()),
('Headphones', 'Wireless headphones', 149.99, 60, 1, NOW()),
('Mouse', 'Wireless mouse', 19.99, 150, 1, NOW()),
('T-Shirt', 'Cotton t-shirt', 29.99, 200, 2, NOW()),
('Jeans', 'Classic jeans', 49.99, 150, 2, NOW()),
('Jacket', 'Winter jacket', 89.99, 60, 2, NOW()),
('Sneakers', 'Running sneakers', 69.99, 100, 2, NOW());

INSERT INTO customer (first_name, last_name, email, phone, password_hash, registration_date) VALUES
('John', 'Doe', 'john@example.com', '1234567890', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW()),
('Jane', 'Smith', 'jane@example.com', '0987654321', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW());

INSERT INTO orders (customer_id, order_date, status, total_amount) VALUES
(1, NOW(), 'pending', 1049.98);

INSERT INTO order_item (order_id, product_id, quantity, unit_price) VALUES
(1, 1, 1, 999.99),
(1, 6, 1, 29.99);

INSERT INTO payment (order_id, payment_date, amount, payment_method, status) VALUES
(1, NOW(), 1049.98, 'credit_card', 'completed');

INSERT INTO review (product_id, customer_id, rating, comment, review_date) VALUES
(1, 1, 5, 'Great laptop!', NOW()),
(2, 2, 4, 'Good phone', NOW());

INSERT INTO tag (name) VALUES
('new'),
('sale'),
('popular'),
('wireless'),
('portable');

INSERT INTO product_tag (product_id, tag_id) VALUES
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(3, 5),
(4, 4),
(5, 4),
(6, 2),
(7, 3),
(8, 2),
(9, 3);
