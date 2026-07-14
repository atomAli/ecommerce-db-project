USE ecommerce_db;

INSERT INTO category (name, description) VALUES
('Electronics', 'Electronic devices and gadgets'),
('Clothing', 'Apparel and fashion items'),
('Books', 'Books and literature'),
('Home & Kitchen', 'Home appliances and kitchen items'),
('Sports', 'Sports equipment and accessories');

INSERT INTO product (name, description, price, stock_quantity, category_id) VALUES
('Laptop', 'High-performance laptop with 16GB RAM', 999.99, 50, 1),
('Smartphone', 'Latest smartphone with 5G support', 699.99, 100, 1),
('T-Shirt', 'Cotton t-shirt in various colors', 29.99, 200, 2),
('Jeans', 'Classic denim jeans', 49.99, 150, 2),
('Programming Book', 'Learn PHP and MySQL', 39.99, 75, 3),
('Coffee Maker', 'Automatic coffee maker', 89.99, 30, 4),
('Yoga Mat', 'Non-slip yoga mat', 24.99, 100, 5),
('Headphones', 'Wireless noise-canceling headphones', 149.99, 60, 1);

INSERT INTO customer (first_name, last_name, email, phone, password_hash) VALUES
('John', 'Doe', 'john@example.com', '1234567890', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
('Jane', 'Smith', 'jane@example.com', '0987654321', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
('Ali', 'Ahmadi', 'ali@example.com', '1122334455', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

INSERT INTO address (customer_id, address_line1, address_line2, city, state, zip_code, country, is_default) VALUES
(1, '123 Main Street', 'Apt 4', 'New York', 'NY', '10001', 'USA', TRUE),
(1, '456 Oak Avenue', '', 'Boston', 'MA', '02101', 'USA', FALSE),
(2, '789 Pine Road', '', 'Los Angeles', 'CA', '90001', 'USA', TRUE),
(3, '321 University St', '', 'Tehran', 'Tehran', '12345', 'Iran', TRUE);

INSERT INTO orders (customer_id, address_id, status, total_amount) VALUES
(1, 1, 'delivered', 1049.98),
(2, 3, 'processing', 749.98),
(1, 1, 'pending', 39.99);

INSERT INTO order_item (order_id, product_id, quantity, unit_price) VALUES
(1, 1, 1, 999.99),
(1, 3, 1, 29.99),
(2, 2, 1, 699.99),
(2, 3, 1, 29.99),
(2, 8, 1, 19.99),
(3, 5, 1, 39.99);

INSERT INTO payment (order_id, amount, payment_method, status) VALUES
(1, 1049.98, 'credit_card', 'completed'),
(2, 749.98, 'paypal', 'completed'),
(3, 39.99, 'cash_on_delivery', 'pending');

INSERT INTO review (product_id, customer_id, rating, comment) VALUES
(1, 1, 5, 'Excellent laptop, fast and reliable!'),
(2, 2, 4, 'Great phone, good camera quality.'),
(5, 3, 5, 'Very helpful book for learning PHP.'),
(3, 1, 4, 'Comfortable t-shirt, good quality fabric.');
