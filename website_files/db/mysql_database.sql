-- Creating Group A's database
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*
Tables are created in the order shown below along with the inserted values.
*/
/*----------------------------------------------------------------------------------------------*/

/* input required */
/* Submit & Log Items */
CREATE TABLE submitlog (
sl_id int NOT NULL AUTO_INCREMENT,
item_name varchar(100) NOT NULL,
item_location varchar(100)  NOT NULL,
item_type varchar(100)  NOT NULL,
item_desc varchar(200)  NOT NULL,
registered_item TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
CONSTRAINT submitlog_PK PRIMARY KEY (sl_id)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- INSERT VALUES for submitlog table
INSERT INTO submitlog (sl_id, item_name, item_location, item_type, item_desc) VALUES
(1, 'credit card', 'Commons', 'Identification', 'Light blue card with name and number');
INSERT INTO submitlog (sl_id, item_name, item_location, item_type, item_desc) VALUES
(2, 'social security card', 'Commons', 'Visa credit card with bank logo', 'Used for conducting digital transactions.');
INSERT INTO submitlog (sl_id, item_name, item_location, item_type, item_desc) VALUES
(3, 'house keys', 'Commons', 'Keys with a green keychain', 'Access to entering a home.');

ALTER TABLE submitlog MODIFY sl_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 3;
/*----------------------------------------------------------------------------------------------*/

/* no input required */
/* Subscription Table */
CREATE TABLE subscription (
sub_id int NOT NULL AUTO_INCREMENT, 
sub_service varchar(300)  NOT NULL,
cost int  NOT NULL,
CONSTRAINT sub_PK PRIMARY KEY (sub_id));

-- INSERT VALUES for subscription table
INSERT INTO subscription (sub_id, sub_service, cost) VALUES
(1, '3 Months Subscription Plan', 30);
INSERT INTO subscription (sub_id, sub_service, cost) VALUES
(2, '6 Months Subscription Plan', 60);
INSERT INTO subscription (sub_id, sub_service, cost) VALUES
(3, '1 Year Subscription Plan', 90);
/*----------------------------------------------------------------------------------------------*/

/* input required */
/* Ticket Table */
CREATE TABLE ticket (
t_id int NOT NULL AUTO_INCREMENT, 
confirmation varchar(50)  NOT NULL,
ticket_type varchar(50)  NOT NULL,
submitted timestamp  NOT NULL,
CONSTRAINT t_PK PRIMARY KEY (t_id)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- INSERT VALUES for ticket table
INSERT INTO ticket (t_id, confirmation, ticket_type, submitted) VALUES
(1, 'Confirmed', 'Service Request', '2025-12-01 10:15:00');
INSERT INTO ticket (t_id, confirmation, ticket_type, submitted) VALUES
(2, 'Pending', 'Billing and Payment', '2025-12-01 11:34:25');
INSERT INTO ticket (t_id, confirmation, ticket_type, submitted) VALUES
(3, 'Cancelled', 'Technical Support', '2025-12-01 09:45:36');

ALTER TABLE ticket MODIFY t_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 3;
/*----------------------------------------------------------------------------------------------*/

/* input required */
/* Login & Signup Table */
CREATE TABLE loginsign (
ls_id int NOT NULL AUTO_INCREMENT,
ls_t_id int  NOT NULL,
ls_sub_id int  NOT NULL,
user_name varchar(50)  NOT NULL,
username varchar(50)  NOT NULL,
user_password varchar(100)  NOT NULL,
email varchar(100)  NOT NULL,
registered_item TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
CONSTRAINT loginsign_PK PRIMARY KEY (ls_id),
CONSTRAINT t_FK FOREIGN KEY (ls_t_id) REFERENCES ticket (t_id),
CONSTRAINT sub_FK FOREIGN KEY (ls_sub_id) REFERENCES subscription (sub_id)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- INSERT VALUES for loginsign table
INSERT INTO loginsign (ls_id, ls_t_id, ls_sub_id, user_name, username, user_password, email) VALUES
(1, 1, 3, 'Derp', 'derp123', 'sushiwushi11', 'derp25@umbc.edu');
INSERT INTO loginsign (ls_id, ls_t_id, ls_sub_id, user_name, username, user_password, email) VALUES
(2, 3, 2, 'Sophie', 'sophie456', 'pollens36', 'sophie21@umbc.edu');
INSERT INTO loginsign (ls_id, ls_t_id, ls_sub_id, user_name, username, user_password, email) VALUES
(3, 2, 1, 'Link', 'link789', 'triforce3', 'link33@umbc.edu');

ALTER TABLE loginsign MODIFY ls_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 3;
/*----------------------------------------------------------------------------------------------*/

/* For the admins */
/* Search Function/Display General Item(s) */
CREATE TABLE searchdisplay (
sd_id int NOT NULL AUTO_INCREMENT,
sl_id_FK int  NOT NULL,
ls_id_FK int  NOT NULL,
keyword varchar(100)  NOT NULL,
CONSTRAINT searchdisplay_PK PRIMARY KEY (sd_id),
CONSTRAINT loginsign_FK FOREIGN KEY (ls_id_FK) REFERENCES loginsign (ls_id),
CONSTRAINT submitlog_FK FOREIGN KEY (sl_id_FK) REFERENCES submitlog (sl_id)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- INSERT VALUES for searchdisplay table
INSERT INTO searchdisplay (sd_id, sl_id_FK, ls_id_FK, keyword) VALUES
(1, 2, 1, 'credit card');
INSERT INTO searchdisplay (sd_id, sl_id_FK, ls_id_FK, keyword) VALUES
(2, 1, 3, 'social security card');
INSERT INTO searchdisplay (sd_id, sl_id_FK, ls_id_FK, keyword) VALUES
(3, 3, 2, 'house keys');

ALTER TABLE searchdisplay MODIFY sd_id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 3;
/*----------------------------------------------------------------------------------------------*/
COMMIT;