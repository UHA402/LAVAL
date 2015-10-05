CREATE DATABASE IF NOT EXISTS laval



            /*    USERS    */
            
        
CREATE TABLE users
(
    ID INT NOT NULL AUTO_INCREMENT,
    Name VARCHAR(20) NOT NULL,
    FirstName VARCHAR(20) NOT NULL,
    Session VARCHAR(20) NOT NULL,
    Email VARCHAR(40) NOT NULL,
    Password VARCHAR(20) NOT NULL,
    Role VARCHAR(20) NOT NULL,
    PRIMARY KEY (ID)
)


