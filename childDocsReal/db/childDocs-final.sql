CREATE TABLE `admins`(
    `AdminID` INT UNSIGNED NOT NULL AUTO_INCREMENT
);
ALTER TABLE
    `admins` ADD PRIMARY KEY `admins_adminid_primary`(`AdminID`);
CREATE TABLE `buildings`(
    `BuildingNum` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `Capacity` INT NOT NULL,
    `BuildingVehicleID` INT NULL
);
ALTER TABLE
    `buildings` ADD PRIMARY KEY `buildings_buildingnum_primary`(`BuildingNum`);
CREATE TABLE `busses`(
    `BusNum` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `Capacity` INT NOT NULL,
    `LicenseNum` INT NOT NULL,
    `BusShift` VARCHAR(45) NULL
);
ALTER TABLE
    `busses` ADD PRIMARY KEY `busses_busnum_primary`(`BusNum`);
CREATE TABLE `childs`(
    `ChildID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `Fname` VARCHAR(45) NOT NULL,
    `Mname` VARCHAR(45) NULL,
    `Lname` VARCHAR(45) NOT NULL,
    `DOB` DATE NOT NULL,
    `GuardianSSN` INT NOT NULL,
    `RoomNum` INT NOT NULL,
    `BusNum` INT NULL,
    `BusShift` VARCHAR(45) NULL
);
ALTER TABLE
    `childs` ADD PRIMARY KEY `childs_childid_primary`(`ChildID`);
CREATE TABLE `drivers`(
    `DriverID` INT NOT NULL,
    `LicenseNum` VARCHAR(45) NOT NULL,
    `LicenseLevel` VARCHAR(45) NOT NULL
);
ALTER TABLE
    `drivers` ADD PRIMARY KEY `drivers_driverid_primary`(`DriverID`);
ALTER TABLE
    `drivers` ADD UNIQUE `drivers_licensenum_unique`(`LicenseNum`);
CREATE TABLE `guardians`(
    `GuardianSSN` INT NOT NULL,
    `Fname` VARCHAR(45) NOT NULL,
    `Mname` VARCHAR(45) NULL,
    `Lname` VARCHAR(45) NOT NULL,
    `Email` VARCHAR(45) NOT NULL,
    `Phone` BIGINT NOT NULL
);
ALTER TABLE
    `guardians` ADD PRIMARY KEY `guardians_guardianssn_primary`(`GuardianSSN`);
ALTER TABLE
    `guardians` ADD UNIQUE `guardians_email_unique`(`Email`);
ALTER TABLE
    `guardians` ADD UNIQUE `guardians_phone_unique`(`Phone`);
CREATE TABLE `medications`(
    `PrescriptionNum` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `ChildID` INT NOT NULL,
    `Dosage` VARCHAR(45) NULL,
    `Allergies` VARCHAR(45) NULL
);
ALTER TABLE
    `medications` ADD PRIMARY KEY `medications_prescriptionnum_primary`(`PrescriptionNum`);
ALTER TABLE
    `medications` ADD UNIQUE `medications_childid_unique`(`ChildID`);
CREATE TABLE `rooms`(
    `RoomNum` INT NOT NULL,
    `Name` VARCHAR(45) NULL,
    `Capacity` INT NOT NULL,
    `BuildingNum` INT NOT NULL
);
ALTER TABLE
    `rooms` ADD PRIMARY KEY `rooms_roomnum_primary`(`RoomNum`);
CREATE TABLE `staffs`(
    `StaffID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `Fname` VARCHAR(45) NOT NULL,
    `Mname` VARCHAR(45) NULL,
    `Lname` VARCHAR(45) NOT NULL,
    `Wage` VARCHAR(45) NOT NULL,
    `BGCheck` TINYINT NOT NULL,
    `RoomNum` INT NULL
);
ALTER TABLE
    `staffs` ADD PRIMARY KEY `staffs_staffid_primary`(`StaffID`);
CREATE TABLE `teachers`(
    `TeacherID` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `Classification` VARCHAR(45) NOT NULL,
    `RoomNum` VARCHAR(45) NOT NULL
);
ALTER TABLE
    `teachers` ADD PRIMARY KEY `teachers_teacherid_primary`(`TeacherID`);
CREATE TABLE `weeklyplans`(
    `WeeklyPlanNum` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `WeekNum` VARCHAR(45) NOT NULL,
    `Activities` VARCHAR(45) NULL,
    `PlanAuthor` VARCHAR(45) NOT NULL,
    `PlanAuthorID` INT NOT NULL,
    `RoomNum` INT NOT NULL
);
ALTER TABLE
    `weeklyplans` ADD PRIMARY KEY `weeklyplans_weeklyplannum_primary`(`WeeklyPlanNum`);
ALTER TABLE
    `rooms` ADD CONSTRAINT `rooms_buildingnum_foreign` FOREIGN KEY(`BuildingNum`) REFERENCES `buildings`(`BuildingNum`);
ALTER TABLE
    `buildings` ADD CONSTRAINT `buildings_buildingvehicleid_foreign` FOREIGN KEY(`BuildingVehicleID`) REFERENCES `busses`(`BusNum`);
ALTER TABLE
    `childs` ADD CONSTRAINT `childs_busnum_foreign` FOREIGN KEY(`BusNum`) REFERENCES `busses`(`BusNum`);
ALTER TABLE
    `medications` ADD CONSTRAINT `medications_childid_foreign` FOREIGN KEY(`ChildID`) REFERENCES `childs`(`ChildID`);
ALTER TABLE
    `childs` ADD CONSTRAINT `childs_guardianssn_foreign` FOREIGN KEY(`GuardianSSN`) REFERENCES `guardians`(`GuardianSSN`);
ALTER TABLE
    `childs` ADD CONSTRAINT `childs_roomnum_foreign` FOREIGN KEY(`RoomNum`) REFERENCES `rooms`(`RoomNum`);
ALTER TABLE
    `staffs` ADD CONSTRAINT `staffs_roomnum_foreign` FOREIGN KEY(`RoomNum`) REFERENCES `rooms`(`RoomNum`);
ALTER TABLE
    `weeklyplans` ADD CONSTRAINT `weeklyplans_roomnum_foreign` FOREIGN KEY(`RoomNum`) REFERENCES `rooms`(`RoomNum`);
