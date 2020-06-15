# Integracao-Cielo-api
Integração com a Api da Cielo

###SQL

```
CREATE DATABASE `api_cielo` ;

CREATE TABLE `compra_cielo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `id_pagamento` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
```


### Alterar os dados de conexão:
https://github.com/bernardo1574/Integracao-Cielo-api/blob/master/lib/config/db_config.php
