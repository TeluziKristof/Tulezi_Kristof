CREATE DATABASE hirdetes_hasznaltautonyilvantartas
  CHARACTER SET utf8
  COLLATE utf8_hungarian_ci;

USE hirdetes_hasznaltautonyilvantartas;

CREATE TABLE hirdetes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    hirdetes_cim VARCHAR(50) NOT NULL,
    kep_url VARCHAR(255) NOT NULL,
    ar INT NOT NULL,
    leiras TEXT
);

CREATE TABLE hirdeto (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nev VARCHAR(30) NOT NULL,
    tel_szam VARCHAR(20) NOT NULL,
    email VARCHAR(40) NOT NULL
);

CREATE TABLE hirdeto_hirdetes_kapcsolat (
    hirdeto_id INT,
    hirdetes_id INT,
    PRIMARY KEY (hirdeto_id, hirdetes_id),
    FOREIGN KEY (hirdeto_id) REFERENCES hirdeto(id),
    FOREIGN KEY (hirdetes_id) REFERENCES hirdetes(id)
);

CREATE TABLE altalanos_adat (
    id INT PRIMARY KEY AUTO_INCREMENT,
    hirdetes_id INT,
    marka VARCHAR(10) NOT NULL,
    modell VARCHAR(10) NOT NULL,
    kivitel VARCHAR(10) NOT NULL,
    evjarat INT NOT NULL,
    FOREIGN KEY (hirdetes_id) REFERENCES hirdetes(id)
);

CREATE TABLE jarmu_adat (
    id INT PRIMARY KEY AUTO_INCREMENT,
    hirdetes_id INT,
    km_ora_allas INT NOT NULL,
    szallithato_szemely_szama INT NOT NULL,
    ajtok_szama INT NOT NULL,
    uzemanyag VARCHAR(20) NOT NULL,
    hengerurtartalom INT NOT NULL,
    teljesitmeny INT NOT NULL,
    FOREIGN KEY (hirdetes_id) REFERENCES hirdetes(id)
);
