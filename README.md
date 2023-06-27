<h1>Interface Basica</h1>


<h2>Login</h2>

<p>Features desejadas</p>
<ul>
  <li>ter opção de criar conta</li>
  <li>servir para discente e docente</li>
  <li>sistema de permissão de administrador</li>
  <li>alertar usuário caso credenciais inválidas</li>
</ul>


<h2>Pagina de criação de conta</h2>

<p>Features desejadas</p>
<ul>
  <li>primeiro usuario adicionado ao bd tem permissão de administrador</li>
  <li>explicar para o usuário o uso de cada informação obtida</li>
  <li>opção de preencher email automaticamente formatado como (matricula)@ifba.edu.br</li>
  <li>fazer verificação de emails</li>
  <li>caixa "confirmar senha"</li>
  <li>verificar se as senhas são inseguras através da <a href="https://haveibeenpwned.com/API/v3#PwnedPasswords">API</a></li>
  <li>mostrar que a conta foi criada com sucesso</li>
  <li>redirecionar o usuario para a pagina apropriada no final</li>
</ul>

<p>Dados que devem ser armazenados</p>
<ul>
  <li>matricula / siape</li>
  <li>nome</li>
  <li>email institucional</li>
  <li>curso</li>
  <li>turma (opcional por causa dos admins)</li>
  <li>telefone</li>
  <li>senha</li>
</ul>


<h2>Pagina de usuario</h2>

<p>Features desejadas</p>
<ul>
  <li>mostrar os requerimentos feitos pelo usuario e o status</li>
  <li>ter botão de criar novo requerimento</li>
</ul>


<h2>Pagina de criar requerimento</h2>

<p>Features desejadas</p>
<ul>
  <li>explicar para o usuário o uso de cada informação obtida</li>
  <li>sistema para adicionar professores envolvidos nas faltas e a quantia de faltas em cada um deles</li>
  <li>mostrar que o requerimento foi enviado com sucesso</li>
  <li>apresentar lugar onde pdfs possam ser criados automaticamente</li>
  <li>esclarecer ao usuário que os documentos ainda devem ser entregues à CORES</li>
</ul>

<p>Dados que devem ser armazenados</p>
<ul>
  <li>No. de matrícula (automatico)</li>
  <li>objeto (justificativa ou segunda chamada)</li>
  <li>data de inicio e final das faltas a serem justificadas</li>
  <li>momento em que requerimento foi registrado</li>
  <li>anexo único com todos os documentos necessários</li>
  <li>observações/ informações extras sobre a falta</li>
</ul>


<h2>Pagina de admin</h2>

<p>Features desejadas</p>
<ul>
  <li>mostrar tabela com todos os requerimentos pendentes</li>
  <li>possibilidade de dar permissão de administrador à usuários</li>
  <li>filtrar requerimentos por: status, curso, decrescente e crescente</li>
  <li>tabela contendo todos os usuarios resgistrados no bd</li>
  <li>links de download de anexos na tabela de requerimentos</li>
  <li>links de para as informações dos registrados nos requerimentos</li>
  <li>habilidade de alterar status de requerimento</li>
  <li>forma de pesquisar os requerimentos e os usuários</li>
</ul>


<h2>Frontend</h2>

<p>Filosofia do projeto</p>
<ul>
  <li>menos é mais</li>
  <li>modularidade é importante</li>
  <li>deixar explícito se ações do usuário estão dando efeito (por exemplo, deixar claro quando um requerimento foi enviado com sucesso)</li>
</ul>

<p>Features desejadas</p>
<ul>
  <li>opção de tema escuro (?)</li>
  <li>seguir branding de ifba</li>
  <li>explicar melhor as descrições das abas</li>
</ul>

<h2>Backend</h2>

<p>Filosofia do projeto</p>
<ul>
  <li>deixar o código o mais legível possível</li>
  <li>Seguir DRY</li>
  <li>deixar o código o mais legível possível</li>
  <li>Quando avistar um erro, corriga todas as intâncias desse erro pelo código todo</li>
  <li>deixar o código o mais legível possível</li>
  <li>no caso de um código eventualmente <i>inspirado</i> mostrar fonte da inpiração. Isso inclui quando se pega código do Gabriel Pereira Torres</li>
</ul>

<p>Features desejadas</p>
<ul>
  <li>enviar email aos usuários e docentes envolvidos em determinado requerimento</li>
  <li>impedir usuários e administradores de acessar as páginas /usuario/ e /administrador/ caso eles não estejam logados através do uso de tokens de sessão</li>
</ul>


<h2>Roadmap</h2>

<ul>
  <li>versao 0.x - estruturar funções de comunicação com o banco</li>
  <li>versao 1.0 - banco de dados e funções basicas estruturadas junto com a interface</li>
  <li>versao 2.0 - css e interface completa</li>
</ul>
