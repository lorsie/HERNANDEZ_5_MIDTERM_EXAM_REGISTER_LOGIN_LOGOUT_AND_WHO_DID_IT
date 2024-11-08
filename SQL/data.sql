CREATE TABLE baker (
	bakerID INT AUTO_INCREMENT PRIMARY KEY,
	firstName VARCHAR (50),
	lastName VARCHAR (50),
	bakeshopLocation VARCHAR (50),
	emailAddress VARCHAR (50),
    	added_by VARCHAR(255) NOT NULL,
   	last_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
);

CREATE TABLE pastries (
	pastriesID INT AUTO_INCREMENT PRIMARY KEY,
	bakerID INT,
	pastryName VARCHAR (50),
	doughType VARCHAR (50),
   	sweetnessLevel VARCHAR (50),
   	price DECIMAL (5,2),
    	added_by VARCHAR(255) NOT NULL,
   	last_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
);

CREATE TABLE user_passwords (
	user_id INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(50),
	password VARCHAR(50),
	date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
