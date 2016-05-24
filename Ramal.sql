Drop Database Ramal;

Create Database Ramal;

Use Ramal;

Create Table Departamento (
ID_depto Tinyint,
Desc_depto Varchar(100) Not Null
);

Alter Table Departamento Add Constraint id_depto_PK Primary Key (ID_depto);
Alter Table Departamento Modify Column ID_depto Tinyint Auto_Increment;

Create Table Tipo_Acesso (
ID_tipo_acesso Tinyint,
Desc_tipo_acesso Varchar(40) Not Null,
T_insere Char(1) Not Null,
T_altera Char(1) Not Null,
T_exclui Char(1) Not Null,
T_pesquisa Char(1) Not Null
);

Alter Table Tipo_Acesso Add Constraint id_tipo_acesso_PK Primary Key (ID_tipo_acesso);
Alter Table Tipo_Acesso Add Constraint chk_t_insere Check (T_insere='A' or T_insere ='I');
Alter Table Tipo_Acesso Add Constraint chk_t_altera Check (T_altera='A' or T_altera ='I');
Alter Table Tipo_Acesso Add Constraint chk_t_exclui Check (T_exclui='A' or T_exclui ='I');
Alter Table Tipo_Acesso Add Constraint chk_t_pesquisa Check (T_pesquisa='A' or T_pesquisa ='I');
Alter Table Tipo_Acesso Modify Column ID_tipo_acesso Tinyint Auto_Increment;


Create Table Usuario (
ID_usuario Tinyint,
Nome_usuario Varchar(40) Not Null,
Andar_usuario Smallint Not Null,
Login_usu Varchar(60) Not Null,
Senha_usu Varchar(20) Not Null,
Status Char(1) Not Null,
Tipo_acesso Varchar(20) Not Null,
Desc_departamento Varchar(20) Not Null,
ID_depto Tinyint Not Null,
ID_tipo_acesso Tinyint Not Null
);

Alter Table Usuario Add Constraint id_usuario_PK Primary Key (ID_usuario);
Alter Table Usuario Add Constraint login_usu_UN Unique (Login_usu);
Alter Table Usuario Add Constraint chk_status Check (Status='A' or Status ='I');
Alter Table Usuario Add Constraint id_depto_FK Foreign Key (ID_depto) References Departamento (ID_depto);
Alter Table Usuario Add Constraint id_tipo_acesso_FK Foreign Key (ID_tipo_acesso) References Tipo_Acesso (ID_tipo_acesso);
Alter Table Usuario Modify Column ID_usuario Tinyint Auto_Increment;

Create Table Ramal (
ID_ramal Tinyint,
Nr_ramal Tinyint,
Descricao Varchar(300),
ID_usuario Tinyint Not Null
);

Alter Table Ramal Add Constraint id_ramal_PK Primary Key (ID_ramal);
Alter Table Ramal Add Constraint nr_ramal_UN Unique (Nr_ramal);
Alter Table Ramal Add Constraint id_usuario_FK Foreign Key (ID_usuario) References Usuario (ID_usuario);
Alter Table Ramal Modify Column ID_ramal Tinyint Auto_Increment;