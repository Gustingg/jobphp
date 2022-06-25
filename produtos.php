<?php 
  session_start();
  $_SESSION['pageTitle'] = 'Produtos';
  include './shared/header.php';
  require_once "./shared/conn.php";
  header('Content-Type: text/html; charset=utf-8');
  $dbh = DBConnection::get();
  $stmt = $dbh->prepare("SELECT * FROM produto;");
  $stmt->execute();
  $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
  echo '
  <a class="btn btn-success" href="produtoForm.php">Adicionar novo produto <i class="bi bi-plus"></i></a>
    <section>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Qtd</th>
          <th scope="col">Preco</th>
          <th scope="col">Icon</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>';

          if (!empty($dados)){
            foreach ($dados as $registro) {
              echo '<tr>';
                echo '<th scope="col">'.$registro['id'].'</th>';
                echo '<td>'.$registro['nome'].'</td>';
                echo '<td>'.$registro['qtd'].'</td>';
                echo '<td>'.$registro['preco'].'</td>';
                echo '<td><img src="'.$registro['img'].'" style="width:100px;height:100px"></td>';
                echo '<td>
                          <a class="btn btn-warning" href="produtoForm.php?acao=editar&id='.$registro['id'].'"><i class="bi bi-pencil-square"></i></a>
                          <a class="btn btn-danger" onclick="confirmDelete('.$registro['id'].')""><i class="bi bi-trash"></i></a>
                      </td>';
              echo '</tr>';
            }
          }
          else{
            echo "<tr><td colspan='9'><p style='text-align-last: center;'>Ops... Parece que não temos nenhum produto cadastrado ainda.</p></td></tr>";
          }
          echo '</tbody>
      </table>
    </section>';

    echo'
    <script>
        function confirmDelete(id){
            if (confirm("Você realmente deseja excluir o produto de número: " + id + " ?")) {
                window.location.href="./actions/deletarproduto.php?id="+id;
            }
        }
    </script>';

include './shared/footer.php' ?>