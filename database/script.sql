-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`patient`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`patient` (
  `id_patient` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(200) NULL,
  PRIMARY KEY (`id_patient`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`species`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`species` (
  `id_species` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id_species`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pet` (
  `id_pet` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `age` VARCHAR(45) NULL,
  `weight` VARCHAR(45) NULL,
  `id_patient` INT NOT NULL,
  `id_species` INT NOT NULL,
  PRIMARY KEY (`id_pet`),
  INDEX `fk_pet_patient_idx` (`id_patient` ASC),
  INDEX `fk_pet_species1_idx` (`id_species` ASC),
  CONSTRAINT `fk_pet_patient`
    FOREIGN KEY (`id_patient`)
    REFERENCES `mydb`.`patient` (`id_patient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pet_species1`
    FOREIGN KEY (`id_species`)
    REFERENCES `mydb`.`species` (`id_species`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`vet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`vet` (
  `id_vet` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(200) NULL,
  PRIMARY KEY (`id_vet`))

-- -----------------------------------------------------
-- Table `mydb`.`consultation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`consultation` (
  `id_consultation` INT NOT NULL AUTO_INCREMENT,
  `date` DATE NULL,
  `image` VARCHAR(255) NULL,
  `blood_test` DECIMAL(5,2) NULL,
  `cost` DECIMAL(5,2) NULL,
  `medicines` VARCHAR(255) NULL,
  `status` ENUM('to attend', 'attended') NULL DEFAULT 'to attend',
  `diagnosis` VARCHAR(255) NULL,
  `id_vet` INT NOT NULL,
  `id_pet` INT NOT NULL,
  `id_patient` INT NOT NULL,
  PRIMARY KEY (`id_consultation`),
  INDEX `fk_consultation_vet1_idx` (`id_vet` ASC),
  INDEX `fk_consultation_pet1_idx` (`id_pet` ASC),
  INDEX `fk_consultation_patient1_idx` (`id_patient` ASC),
  CONSTRAINT `fk_consultation_vet1`
    FOREIGN KEY (`id_vet`)
    REFERENCES `mydb`.`vet` (`id_vet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_consultation_pet1`
    FOREIGN KEY (`id_pet`)
    REFERENCES `mydb`.`pet` (`id_pet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_consultation_patient1`
    FOREIGN KEY (`id_patient`)
    REFERENCES `mydb`.`patient` (`id_patient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

-- -----------------------------------------------------
-- Table `mydb`.`species`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`species` (
  `id_species` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id_species`))

-- -----------------------------------------------------
-- Table `mydb`.`debt`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`debt` (
  `id_debt` INT NOT NULL AUTO_INCREMENT,
  `amount` DECIMAL(5,2) NULL,
  `status` ENUM('no paid', 'paid') NULL DEFAULT 'no paid',
  `id_consultation` INT NOT NULL,
  `id_pet` INT NOT NULL,
  PRIMARY KEY (`id_debt`),
  INDEX `fk_debt_consultation1_idx` (`id_consultation` ASC),
  INDEX `fk_debt_pet1_idx` (`id_pet` ASC),
  CONSTRAINT `fk_debt_consultation1`
    FOREIGN KEY (`id_consultation`)
    REFERENCES `mydb`.`consultation` (`id_consultation`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_debt_pet1`
    FOREIGN KEY (`id_pet`)
    REFERENCES `mydb`.`pet` (`id_pet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)


INSERT INTO mydb.patient(name, email, password) VALUES ('Railly Hugo', 'raillyhugo@gmail.com', '$2y$10$aaFnmJokhf8eKe/4JiAbROdTFqgapY6zYupB5EY18tXr4l0Un3gsi');

INSERT INTO mydb.species(name) VALUES ('Dog');
INSERT INTO mydb.species(name) VALUES ('Cat');
INSERT INTO mydb.species(name) VALUES ('Bird');
INSERT INTO mydb.species(name) VALUES ('Rabbit');
INSERT INTO mydb.species(name) VALUES ('Snake');
INSERT INTO mydb.species(name) VALUES ('Fish');
INSERT INTO mydb.species(name) VALUES ('Hamster');

INSERT INTO mydb.pet (name, id_patient, id_species, age, weight) VALUES ('Bobby', 1, 1, 2, 50);
INSERT INTO mydb.pet (name, id_patient, id_species, age, weight) VALUES ('Coco', 1, 2, 1, 30);
INSERT INTO mydb.pet (name, id_patient, id_species, age, weight) VALUES ('Lola', 1, 2, 2, 30);
INSERT INTO mydb.pet (name, id_patient, id_species, age, weight) VALUES ('Mimi', 1, 2, 3, 30);
INSERT INTO mydb.pet (name, id_patient, id_species, age, weight) VALUES ('Alfredo', 1, 2, 4, 30);
INSERT INTO mydb.pet (name, id_patient, id_species, age, weight) VALUES ('Firulais', 1, 1, 5, 30);
INSERT INTO mydb.pet (name, id_patient, id_species, age, weight) VALUES ('Dolly', 1, 2, 5, 30);
INSERT INTO mydb.pet (name, id_patient, id_species, age, weight) VALUES ('Fido', 1, 1, 1, 30);
INSERT INTO mydb.pet (name, id_patient, id_species, age, weight) VALUES ('Bella', 1, 1, 2, 30);
INSERT INTO mydb.pet (name, id_patient, id_species, age, weight) VALUES ('Luna', 1, 1, 3, 30);
INSERT INTO mydb.pet (name, id_patient, id_species, age, weight) VALUES ('Mia', 1, 1, 4, 30);


INSERT INTO mydb.vet (name, email, password) VALUES ('Dr. Smith', 'smith@gmail.com', '$2y$10$aaFnmJokhf8eKe/4JiAbROdTFqgapY6zYupB5EY18tXr4l0Un3gsi');
INSERT INTO mydb.vet (name, email, password) VALUES ('Dr. Jones', 'jones@gmail.com', '$2y$10$aaFnmJokhf8eKe/4JiAbROdTFqgapY6zYupB5EY18tXr4l0Un3gsi');

INSERT INTO mydb.consultation (date, image, status, medicines, blood_test, cost, id_vet, id_pet, id_patient) VALUES ('2020-01-01','x-raydog.jpg', 'attended', "Ibuprofeno, Parcetamol, Cetirizina", 10, 30, 1, 1, 1);
INSERT INTO mydb.consultation (date, image, status, medicines, blood_test, cost, id_vet, id_pet, id_patient) VALUES ('2020-01-02','x-raycat.jpg', 'attended', "Ibuprofeno, Parcetamol, Cetirizina", 10, 50, 1, 2, 1);
INSERT INTO mydb.consultation (date, image, status, medicines, blood_test, cost, id_vet, id_pet, id_patient) VALUES ('2020-01-03','x-raycat2.jpg', 'attended', "Ibuprofeno, Parcetamol, Cetirizina", 10, 70, 1, 2, 1);
INSERT INTO mydb.consultation (date, id_vet, id_pet, id_patient) VALUES ('2020-01-02', 1, 2, 1);
INSERT INTO mydb.consultation (date, id_vet, id_pet, id_patient) VALUES ('2020-01-03', 1, 6, 1);
INSERT INTO mydb.consultation (date, id_vet, id_pet, id_patient) VALUES ('2020-01-04', 1, 6, 1);


INSERT INTO mydb.debt (id_consultation, id_pet, amount, status) VALUES (1, 1, 30, 'paid');  
INSERT INTO mydb.debt (id_consultation, id_pet, amount, status) VALUES (2, 2, 50, 'paid');
INSERT INTO mydb.debt (id_consultation, id_pet, amount) VALUES (3, 2, 70);


-- Select the dog that has the most debt, show the total debt 
SELECT pet.name, SUM(debt.amount) AS total_debt
FROM mydb.pet
JOIN mydb.debt ON pet.id_pet = debt.id_pet
GROUP BY pet.id_pet
ORDER BY total_debt DESC
LIMIT 1;
