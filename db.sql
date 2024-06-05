Create DATABASE hw1;
USE hw1;

CREATE TABLE users (
    id integer primary key auto_increment,
    username varchar(16) not null unique,
    password varchar(255) not null,
    email varchar(255) not null unique,
    name varchar(255) not null,
    surname varchar(255) not null
) Engine = InnoDB;

CREATE TABLE cart (
  user_id INT NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
  component_name VARCHAR(255) NOT NULL,
  model VARCHAR(255) NOT NULL,
  number_of_components INT NOT NULL,
  price DECIMAL(10,2) NOT NULL
);

CREATE TABLE orders (
  order_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  component_name VARCHAR(255) NOT NULL,
  model VARCHAR(255) NOT NULL,
  number_of_components INT NOT NULL,
  total_price DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id)
);


