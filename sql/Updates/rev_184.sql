/*Important to register.php*/
ALTER TABLE users ADD (registerIp VARCHAR(30) NOT NULL DEFAULT '0-0-0-0', country VARCHAR (20) NULL DEFAULT NULL , birth DATE NULL DEFAULT NULL, quest1 INT(2) NOT NULL DEFAULT 0, ans1 VARCHAR(50) NOT NULL DEFAULT 'undefined');
UPDATE `version` SET `Revision`='184' WHERE `Name`='AquaFlameCMS';