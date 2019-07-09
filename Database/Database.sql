create database hospApoitment;
use hospApoitment;

/*
CREATE USER 'hospApoitment'@'localhost' IDENTIFIED BY 'hospApoitment';
GRANT ALL PRIVILEGES ON hospApoitment.* TO 'hospApoitment'@'localhost';
*/

create table accounts (
	accountId int(20) NOT NULL AUTO_INCREMENT,
	accountEmail varchar(20) NOT NULL,
	accountPassword varchar(50) NOT NULL,
    accountNome varchar(100) NOT NULL,
    accountCPF varchar(15) NOT NULL,
    accountTel varchar(15) NOT NULL,
    accountDate varchar(10) NOT NULL,
    accountRua varchar(10) NOT NULL,
    accountNumero varchar(8) NOT NULL,
    accountCidade varchar(121) NOT NULL,
    accountUF varchar(8) NOT NULL,
    accountCEP varchar(15) NOT NULL,
    accountComplemento varchar(20),    
    accountRole int(1) NOT NULL,
	primary key (accountId)
);

create table accountDoctor(
	accountId int(20) references account(accountId),
	doctorCRM int(8) NOT NULL,
    primary key (doctorCRM)
);

create table apointments(
	doctorCRM int(8) references accountDoctor(doctorCRM),
    accountId int(20) references account(accountId),
    apointmenStatus int(1) not null,
    apointmenDateTime Datetime not null,
    apointmentDetails varchar(140)
);