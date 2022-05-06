# app-concessionaria
App construído com Docker/Docker-compose, CakePHP4 e Git/GitHub. 
Tecnologias usadas: PHP, MySql, JavaScript, CSS, HTML e AJAX.

### Introdução ao sistema
- O sistema utilizará as ferramentas e tecnologias apontadas, seu escopo deve ser desenvolvido para web focado em dispositivos Desktop com responsividade.
- Deverá apresentar informações de automóveis e seus valores, onde o usuário poderá selecionar qual carro deseja obter mais informações.
- Deverá possibilitar a inserção de um valor de entrada para o usuário, e com isso, calcular o valor restante do veículo em parcelas iguais e sem juros.

------------------

O sistema conta com boas práticas na criação de sua Model, as regras de negócio ficam apenas no contexto das Controllers.
As configurações gerais serão encontradas como padrão na AppController.
Todos os arquivos e códigos referentes às Views se encontram devidamente nas pastas webroot e templates, seguindo suas regras de escopo.

------------------

### Inicializando Docker para desenvolvimento local:
- cd ~/app-concessionaria
- docker-compose build
- docker-compose run -p 80:80 apache
    - É necessário rodar o DB no banco de dados para que a aplicação rode corretamente
    - Você irá encontrar o dump do DB na raiz do sistema.
    - Em caso de problema para acessar, tente usar outra porta HTTP em seu localhost.

### Imagens Docker:
- php:7.4-apache
  - localhost:80
- mysql:5.7
  - localhost:3306

------------------
### Nomenclaturas sugeridas:
- Para os repositórios, usaremos:
  - bugfix/{repo-name} - Para correções de bugs na lógica
  - feature/{repo-name} - Para novas funções
  - hotfix/{repo-name} - Para correções visuais e bugs menos urgentes
  - improvement/{repo-name} - Para melhorias básicas e ébitos técnicos
 
- Para as branches, usaremos:
  - feat: Novas funcionalidades
  - fix: Correções de bugs
  - docs: Alterações em documentação ou comentários
  - style: Alteraçoes no CSS
  - refactor: Para qualquer melhoria não urgente
  - perf: Alterações e otimizações de performance
  - test: Alterações referentes aos testes
  - chore: Relacionados a build, configs e afins.

------------------
### Próximos passos:
- [x] Criação das imagens e contêineres com Docker e Docker-compose
- [x] Configuração do repositório para versionamento
- [x] Projeção e modelagem do banco de dados em MySql
- [x] Configuração e instalação inicial do CakePHP a partir do DB MySql
- [x] Criação das controllers e configuração das diretivas de segurança do CakePHP
- [x] Desenvolvimento das regras de negócio da Controller Carros.
- [x] Desenvolvimento da View Orçamento na Controller Carros, onde serão apresentadas as informações referentes aos carros, seus valores e as parcelas de acordo com as informações inseridas pelo usuário.
- [ ] Alteração da responsividade de breakpoints para layout em flex-box.
- [ ] Alteração da view de HTML/CSS para VueJs


