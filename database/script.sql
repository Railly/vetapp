CREATE TABLE IF NOT EXISTS `mydb`.`patient` (
  `id_patient` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`id_patient`))

-- -----------------------------------------------------
-- Table `mydb`.`pet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pet` (
  `id_pet` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `patient_id_patient` INT NOT NULL,
  PRIMARY KEY (`id_pet`),
  INDEX `fk_pet_patient_idx` (`patient_id_patient` ASC) VISIBLE,
  CONSTRAINT `fk_pet_patient`
    FOREIGN KEY (`patient_id_patient`)
    REFERENCES `mydb`.`patient` (`id_patient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)

-- -----------------------------------------------------
-- Table `mydb`.`vet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`vet` (
  `id_vet` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  PRIMARY KEY (`id_vet`))

-- -----------------------------------------------------
-- Table `mydb`.`consultation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`consultation` (
  `id_consultation` INT NOT NULL,
  `date` DATE NULL,
  `image` BLOB NULL,
  `blood_test` DECIMAL(2) NULL,
  `cost` DECIMAL(2) NULL,
  `medicines` VARCHAR(45) NULL,
  `vet_id_vet` INT NOT NULL,
  `pet_id_pet` INT NOT NULL,
  PRIMARY KEY (`id_consultation`),
  INDEX `fk_consultation_vet1_idx` (`vet_id_vet` ASC) VISIBLE,
  INDEX `fk_consultation_pet1_idx` (`pet_id_pet` ASC) VISIBLE,
  CONSTRAINT `fk_consultation_vet1`
    FOREIGN KEY (`vet_id_vet`)
    REFERENCES `mydb`.`vet` (`id_vet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_consultation_pet1`
    FOREIGN KEY (`pet_id_pet`)
    REFERENCES `mydb`.`pet` (`id_pet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)