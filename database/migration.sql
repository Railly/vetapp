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

INSERT INTO mydb.consultation (date, image, blood_test, cost, medicines, id_vet, id_pet, id_patient) VALUES ('2020-01-01', 'image1.jpg', '10', '10', 'medicines', 1, 1, 1);
INSERT INTO mydb.consultation (date, image, blood_test, cost, medicines, id_vet, id_pet, id_patient) VALUES ('2020-01-02', 'image2.jpg', '20', '20', 'medicines', 1, 2, 1);
INSERT INTO mydb.consultation (date, image, blood_test, cost, medicines, id_vet, id_pet, id_patient) VALUES ('2020-01-03', 'image3.jpg', '30', '30', 'medicines', 1, 6, 1);
INSERT INTO mydb.consultation (date, image, blood_test, cost, medicines, id_vet, id_pet, id_patient) VALUES ('2020-01-04', 'image4.jpg', '40', '40', 'medicines', 1, 6, 1);
