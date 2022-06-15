<?php 
    include ('conexao.php');
    $id = $_GET['id'];
    $sql = 'SELECT * FROM fluxo_caixa where id ='. $id;
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <title>Fromulário de alteracao</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>

    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand">FLUXO-CAIXA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-item nav-link" href="../index.php">INÍCIO</a>
                <a class="nav-item nav-link" href="cadastro_fluxo_caixa.html">Cadastro</a>
                <a class="nav-item nav-link" href="listar_fluxo_caixa.php">Listagem</a>
                <a class="nav-item nav-link" href="consulta_fluxo_caixa.html">Consultar</a>
                </div>
            </div>
        </nav>

        <form method="post" action="altera_fluxo_caixa_exe.php">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Data</label>
              <div class="col-sm-10">
                <input type="date" name="data" value="<?php echo $row['data']?>" class="form-control" id="inputEmail3" placeholder="Data">
              </div>
            </div>
            <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label col-sm-2 pt-0">Tipo</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="opt" id="gridRadios1" value="Entrada" <?php if($row['tipo'] == "Entrada")  echo "checked";?>>
                      <label class="form-check-label" for="gridRadios1">
                        Entrada
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="opt" id="gridRadios2" value="Saida" <?php if($row['tipo'] == "Saida")  echo "checked";?>>
                      <label class="form-check-label" for="gridRadios2">
                        Saída
                      </label>
                    </div>
                  </div>
                </div>
              </fieldset>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Valor</label>
              <div class="col-sm-10">
                <input type="number" name="valor" class="form-control" id="inputPassword3" placeholder="Valor" value="<?php echo $row['valor']?>">
              </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Histórico</label>
                <div class="col-sm-10">
                  <input type="text" name="historico" class="form-control" id="inputPassword3" placeholder="Histórico" value="<?php echo $row['historico']?>">
                </div>
              </div>
            <div class="form-group row">
              <div class="col-sm-2">Cheque</div>
              <div class="col-sm-10">
                <div class="form-check">
                    <select class="form-control" name="cheque">
                        <option <?php if($row['cheque'] == "Sim")  echo "selected";?>>Sim</option>
                        <option <?php if($row['cheque'] == "Não")  echo "selected";?>>Não</option>
                    </select>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>

            <input name="id" type="hidden" value="<?php echo $row['id']?>">
          </form>
    </body>

</html>