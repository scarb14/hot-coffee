INSERT INTO coffee (name) VALUES
	 ('Кофе');

INSERT INTO coffee_ingredient (name,short_name,type_id) VALUES
('Молоко','moloko',1),
('Сироп','sirop',1),
('Шоколад','shokolad',2),
('Круассан','kryossan',2),
('Вода','voda',1);

INSERT INTO coffee_ingredient_price (country_id,amount,ingredient_id,coffee_id) VALUES
(1,0.50,2,1),
(2,0.50,2,1),
(1,0.30,1,1),
(2,0.40,1,1),
(1,1.00,3,1),
(2,1.00,3,1),
(1,1.00,4,1),
(2,1.00,4,1),
(1,0.00,5,1),
(2,0.00,5,1);

INSERT INTO coffee_ingredient_type (name) VALUES
('Основные'),
('Дополнительные');

INSERT INTO country (name) VALUES
('Испания'),
('Италия');

INSERT INTO coffee_price (country_id,amount,coffee_id) VALUES
(1,1.00,1),
(2,1.50,1);

INSERT INTO agis1.coffee_tax (percent,country_id) VALUES
(3.00,1),
(7.00,2);