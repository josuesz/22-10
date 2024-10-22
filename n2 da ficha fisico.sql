create database josueba;
use josueba;

CREATE TABLE Departamento (
    Numero INT PRIMARY KEY,
    Setor VARCHAR(100) NOT NULL
);

CREATE TABLE Funcionario (
    Numero INT PRIMARY KEY,
    Salario DECIMAL(10, 2) NOT NULL,
    Telefone VARCHAR(15) NOT NULL,
    Departamento_ID INT,
    FOREIGN KEY (Departamento_ID) REFERENCES Departamento(Numero)
);

CREATE TABLE Projeto (
    Numero INT PRIMARY KEY,
    Orçamento DECIMAL(15, 2) NOT NULL
);

CREATE TABLE Fornecedor (
    Numero INT PRIMARY KEY,
    Endereco VARCHAR(255) NOT NULL
);

CREATE TABLE Peca (
    Numero INT PRIMARY KEY,
    Peso DECIMAL(10, 2) NOT NULL,
    Cor VARCHAR(50) NOT NULL
);

CREATE TABLE Deposito (
    Numero INT PRIMARY KEY,
    Endereco VARCHAR(255) NOT NULL
);

CREATE TABLE Funcionario_Projeto (
    Funcionario_Numero INT,
    Projeto_Numero INT,
    Data_Inicio DATE,
    Horas_Trabalhadas INT,
    PRIMARY KEY (Funcionario_Numero, Projeto_Numero),
    FOREIGN KEY (Funcionario_Numero) REFERENCES Funcionario(Numero),
    FOREIGN KEY (Projeto_Numero) REFERENCES Projeto(Numero)
);

CREATE TABLE Projeto_Fornecedor (
    Projeto_Numero INT,
    Fornecedor_Numero INT,
    PRIMARY KEY (Projeto_Numero, Fornecedor_Numero),
    FOREIGN KEY (Projeto_Numero) REFERENCES Projeto(Numero),
    FOREIGN KEY (Fornecedor_Numero) REFERENCES Fornecedor(Numero)
);

CREATE TABLE Projeto_Peca (
    Projeto_Numero INT,
    Peca_Numero INT,
    PRIMARY KEY (Projeto_Numero, Peca_Numero),
    FOREIGN KEY (Projeto_Numero) REFERENCES Projeto(Numero),
    FOREIGN KEY (Peca_Numero) REFERENCES Peca(Numero)
);
CREATE USER 'root2'@'localhost' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES ON *.* TO 'root2'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;

