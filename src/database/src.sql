CREATE TABLE clientes(
	idCliente INTEGER PRIMARY KEY AUTOINCREMENT,
	nome VARCHAR(60),
	cpf VARCHAR(15),
	telefone VARCHAR(10),
	ativo BOOLEAN DEFAULT true
);

CREATE TABLE produtos(
	idProduto INTEGER PRIMARY KEY AUTOINCREMENT,
	nome VARCHAR(50),
	valor DECIMAL(7,2),
	quantidade INTEGER,
	ativo BOOLEAN DEFAULT true
);

CREATE TABLE vendas(
	idVenda INTEGER PRIMARY KEY AUTOINCREMENT,
	idCliente INTEGER,
	valorTotal DECIMAL(7,2),
	FOREIGN KEY (idCliente) REFERENCES clientes(idCliente)
);

CREATE TABLE itensVenda(
	idItensVenda INTEGER PRIMARY KEY AUTOINCREMENT,
	idVenda INTEGER,
	idProduto INTEGER,
	quantidade DECIMAL(7,2),
	valorUnitario DECIMAL(7,2),
	FOREIGN KEY (idVenda) REFERENCES vendas (idVenda),
	FOREIGN KEY (idProduto) REFERENCES produtos (idProduto)
);


CREATE TRIGGER setItemVenda
AFTER INSERT ON itensVenda
FOR EACH ROW
BEGIN

	UPDATE vendas SET valorTotal = valorTotal + (NEW.quantidade * NEW.valorUnitario) WHERE idVenda = NEW.idVenda;
	UPDATE produtos SET quantidade = quantidade - NEW.quantidade WHERE idProduto = NEW.idProduto;
	
END;

CREATE TRIGGER attItemVenda
AFTER UPDATE ON itensVenda
FOR EACH ROW
BEGIN

	UPDATE vendas SET valorTotal = valorTotal - ((OLD.quantidade * OLD.valorUnitario) * (NEW.quantidade * NEW.valorUnitario)) WHERE idVenda = NEW.idVenda;
	UPDATE produtos SET quantidade = quantidade + (OLD.quantidade - NEW.quantidade) WHERE idProduto = NEW.idProduto;
	
END;

CREATE TRIGGER delItemVenda
AFTER DELETE ON itensVenda
FOR EACH ROW
BEGIN

	UPDATE vendas SET valorTotal = valorTotal - (OLD.quantidade * OLD.valorUnitario) WHERE idVenda = OLD.idVenda;
	UPDATE produtos SET quantidade = quantidade + OLD.quantidade WHERE idProduto = OLD.idProduto;
	
END;

CREATE TRIGGER delVenda
AFTER DELETE ON vendas
FOR EACH ROW
BEGIN

	DELETE FROM itensVenda WHERE idVenda = OLD.idVenda;
	
END;















