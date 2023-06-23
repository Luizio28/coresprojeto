<h1>Interface Basica</h1>
<p>Login</p>
<ul>
  <li>ter opção de criar conta</li>
  <li>servir para discente e docente</li>
</ul>

<p>Pagina de criação de conta de usuario</p>
<ul>
  <li>pagina pra criar apenas conta de aluno:
    <pre>
nome
email institucional
curso
turma
matricula
telefone
usuario
senha
    </pre>
  </li>
</ul>


<p>Pagina de usuario</p>
<ul>
  <li>mostrar os requerimentos feitos pelo usuario e o status</li>
  <li>ter botão de criar novo requerimento</li>
</ul>

<p>Pagina de criar requerimento</p>
<ul>
  <li>deve conter essas informações para preencher do lado do usuario:
    <pre>
objeto (justificativa ou segunda chamada)
nome (automatico)
email
anexo
observação
    </pre></li>
  <li>o sistema deve gerar automaticamente a data de registro, e data inicial (eu acho)</li>
</ul>

<p>Pagina de admin/coordenador/cores</p>
<ul>
  <li>admin: gerir usuarios e ter habilidade de criar adm</li>
  <li>coordenador: ter um inbox contendo requerimentos e habilidade de deferir ou não</li>
  <li>cores: ter um inbox para vizualizar os requerimentos</li>
</ul>

<p>Pagina de adicionar admin/coordenador/cores</p>
<ul>
  <li>disponivel ao admin no inicio, adicionar usuarios usando informações deles:
  <pre>
nome
siape
email
coordenação
usuario
senha
  </pre>
  </li>
</ul>

<p>Gestao de requerimento</p>
<ul>
  <li>>disponivel ao coordenador e cores, accessado pelo inbox a interface para ler o deferimento por completo e gerir ele</li>
</ul>

<h1>Backend</h1>
<ul>
  <li>comunicação entre cliente e banco ...</li>
  <li>Seguir DRY e KISS</li>
</ul>

<h1>Estilização</h1>
<ul>
  <li>seguir esquema de cores 60-30-10</li>
  <li>usar formato familiar com inbox de email</li>
  <li>deixar css modular (sem um styles.css gigante por favor)</li>
</ul>

<h1>Roadmap</h1>
<pre>
versao 0.x - esttruturar funções de comunicação com o banco
versao 1.0 - banco de dados e funções basicas estruturadas junto com a interface
versao 2.0 - css e interface completa
</pre>
