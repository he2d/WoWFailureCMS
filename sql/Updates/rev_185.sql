/*Important for news working*/
ALTER TABLE comments ADD reply INT (10) NOT NULL DEFAULT 0;
UPDATE `version` SET `Revision`='185' WHERE `Name`='AquaFlameCMS';