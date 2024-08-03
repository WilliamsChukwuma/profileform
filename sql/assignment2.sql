create  table if0_36995341_williamscode.user(
    userID_Number int not null auto_increment,
	fullname varchar (255),
	Email varchar (255) NOT NULL UNIQUE,
	Gender varchar (10),
	password varchar (255),
    primary key (userID_Number),
);

CREATE TABLE if0_36995341_williamscode.uploadImages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL,
    FOREIGN KEY (`email`) REFERENCES `user`(`Email`) ON DELETE CASCADE
);



