drop database hospApoitment;

create database hospApoitment;
use hospApoitment;

/*
CREATE USER 'hospApoitment'@'localhost' IDENTIFIED BY 'hospApoitment';
GRANT ALL PRIVILEGES ON hospApoitment.* TO 'hospApoitment'@'localhost';
*/
create table role (
	accountRole int(1) NOT NULL,
    roleName Varchar(14) NOT NULL,
    primary key (accountRole)
);

INSERT INTO role VALUES 
    (1,"Adminstrador"),
    (2,"Atendimento"),
    (3,"Medico"),
    (4,"Usuario");

create table accounts (
	accountId int(20) NOT NULL AUTO_INCREMENT,
	accountEmail varchar(70) NOT NULL,
	accountPassword varchar(50) NOT NULL,
    accountNome varchar(140) NOT NULL,
    accountCPF varchar(15) NOT NULL,
    accountTel varchar(15) NOT NULL,
    accountDate varchar(10) NOT NULL,
    accountRua varchar(30) NOT NULL,
    accountBairro varchar(30) NOT NULL,
    accountNumero varchar(8) NOT NULL,
    accountCidade varchar(121) NOT NULL,
    accountUF varchar(8) NOT NULL,
    accountCEP varchar(15) NOT NULL,
    accountComplemento varchar(20),    
    accountRole int(1) references role(accountRole),
	primary key (accountId)
);

create table doctor(
	accountId int(20) references account(accountId),
	doctorCRM int(8) NOT NULL,
    primary key (doctorCRM)
);

create table specialty(
	specialtyId int(3) NOT NULL,
	specialtyNome varchar(100) NOT NULL,
    primary key (specialtyId)
);

create table specialtyDoctor(
	doctorCRM int(8) references accountDoctor(accountId),
	specialtyId int(8) references specialty(specialtyId),
    primary key (doctorCRM)
);

create table apointments(
	doctorCRM int(8) references specialtyDoctor(doctorCRM),
    specialtyId int(8) references specialtyDoctor(specialtyId),
    accountId int(20) references account(accountId),
    apointmenStatus int(1) not null,
    apointmenDateTime Datetime not null,
    apointmentDetails varchar(140)
);