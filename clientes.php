<?php 
  session_start();
  $_SESSION['pageTitle'] = 'Clientes';
  include './shared/header.php';
  require_once "./shared/conn.php";
  header('Content-Type: text/html; charset=utf-8');
  $dbh = DBConnection::get();
  $stmt = $dbh->prepare("SELECT * FROM cliente as cli INNER JOIN endereco as ende ON cli.cpf = ende.fk_cpfCliente WHERE cli.cpf = :cpf;");
  $stmt->bindParam(':cpf', $_SESSION['cpf']);
  $stmt->execute();
  $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo '

    <section>
    <table class="table">
    <thead>
      <tr>
        <th scope="col">CPF</th>
        <th scope="col">Nome</th>
        <th scope="col">Telefone</th>
        <th scope="col">Email</th>
        <th scope="col">CEP</th>
        <th scope="col">Endereço</th>
        <th scope="col">Complemento</th>
        <th scope="col">Numero</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>';

        if (!empty($dados)){
          foreach ($dados as $registro) {
            echo '<tr>';
              echo '<th scope="col">'.$registro['cpf'].'</th>';
              echo '<td>'.$registro['nome'].'</td>';
              echo '<td>'.$registro['telefone'].'</td>';
              echo '<td>'.$registro['email'].'</td>';
              echo '<td>'.$registro['cep'].'</td>';
              echo '<td>'.$registro['endereco'].'</td>';
              echo '<td>'.$registro['complemento'].'</td>';
              echo '<td>'.$registro['numero'].'</td>';
              echo '<td>
                        <a class="btn btn-warning" href="clienteForm.php?acao=editar&cpf='.$registro['cpf'].'"><i class="bi bi-pencil-square"></i></a>
                        <a class="btn btn-danger" onclick="confirmDelete('.$registro['cpf'].')""><i class="bi bi-trash"></i></a>
                    </td>';
            echo '</tr>';
          }
        }
        else{
          echo "<tr><td colspan='5'><p style='text-align-last: center;'>Ops... Parece que não temos nenhum cliente cadastrado ainda.</p></td></tr>";
        }
        echo '</tbody>
      </table>
    </section>';

    echo'
    <script>
        function confirmDelete(cpf){
            if (confirm("Você realmente deseja excluir o cadastro do CPF: " + cpf + " ?")) {
                window.location.href="./actions/deletarcliente.php?cpf="+cpf;
            }
        }
    </script>';

include './shared/footer.php' ?>