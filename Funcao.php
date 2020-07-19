<?php
function obterConexao(){
  $conexao = mysqli_connect("localhost", "id10754545_root", "senha123", "id10754545_podcast");
  mysqli_set_charset($conexao,'utf8');
  if(!$conexao){
    echo "nao foi possivel conectar ao banco de dados";
  }
  return $conexao;
}

function obterPodcast(){
    $pod = array();
    $conexao = obterConexao();
    $sql = "SELECT * FROM `podcast` order by id desc ";
    if($result = mysqli_query($conexao, $sql)){
      $pod = $result->fetch_all(MYSQLI_ASSOC);
      mysqli_free_result($result);
    }
    $conexao->close();
    return $pod;
  }

  function obterPodcastPorID($id){
      $pod = array();
      $conexao = obterConexao();
      $sql = "SELECT * FROM `podcast` where id= $id ";
      if($result = mysqli_query($conexao, $sql)){
        $pod = $result->fetch_assoc();
        mysqli_free_result($result);
      }
      $conexao->close();
      return $pod;
    }

    function obterConvidadoPorID($id){
        $pod = array();
        $conexao = obterConexao();
        $sql = "SELECT * FROM `convidado` where id= $id ";
        var_dump($sql);
        if($result = mysqli_query($conexao, $sql)){
          $pod = $result->fetch_assoc();
          mysqli_free_result($result);
        }
        $conexao->close();
        return $pod;
      }

    function obterConvidadoPodcast($id){
      //select * from convidado where id in (select convidado_id from podcast_convidado where pod_id = $id)
        $convidados = array();
        $conexao = obterConexao();
        $sql = "select * from convidado where id in (select convidado_id from podcast_convidado where podcast_id = $id) ";
        if($result = mysqli_query($conexao, $sql)){
          $convidados = $result->fetch_all(MYSQLI_ASSOC);
          mysqli_free_result($result);
        }
        $conexao->close();
        return $convidados;
      }

      function obterResultadoPesquisa($pesquisar){
        $pod = array();
        $conexao = obterConexao();
        $sql = "select * from podcast where titulo like '%$pesquisar%' or descricao like '%$pesquisar%'";
        if($result = mysqli_query($conexao, $sql)){
          $pod = $result->fetch_all(MYSQLI_ASSOC);
          mysqli_free_result($result);
        }
        $conexao->close();
        return $pod;
      }

      function obterResultado($convidado, $tema) {
        $pod = array();
        $conexao = obterConexao();
        if($convidado == 0){
          $sql = "select p.id, p.link_img from podcast p, podcast_tema pt where pt.podcast_id = p.id and pt.tema_id = $tema";
        }else if($tema == 0){
          $sql = "select p.id, p.link_img from podcast p, podcast_convidado pc where pc.podcast_id = p.id and pc.convidado_id = $convidado";
        }else{
          $sql = "select p.id, p.link_img from podcast p, podcast_tema pt, podcast_convidado pc where p.id = pc.podcast_id and pc.convidado_id = $convidado and pt.podcast_id = p.id and pt.tema_id = $tema";
        }

        if($result = mysqli_query($conexao, $sql)){
          $pod = $result->fetch_all(MYSQLI_ASSOC);
          mysqli_free_result($result);
        }
        $conexao->close();
        return $pod;

      }

      function obterTema(){
        $temas = array();
        $conexao = obterConexao();
        $sql = "SELECT * FROM `tema` order by descricao ";
        if($result = mysqli_query($conexao, $sql)){
          $temas = $result->fetch_all(MYSQLI_ASSOC);
          mysqli_free_result($result);
        }
        $conexao->close();
        return $temas;
      }

      function obterConvidados() {
        $convidados = array();
        $conexao = obterConexao();
        $sql = "SELECT * FROM `convidado` order by nome ";
        if($result = mysqli_query($conexao, $sql)){
          $convidados = $result->fetch_all(MYSQLI_ASSOC);
          mysqli_free_result($result);
        }
        $conexao->close();
        return $convidados;
      }

      function sanitizeString($str) {
        $str = preg_replace('/[áàãâä]/ui', 'a', $str);
        $str = preg_replace('/[éèêë]/ui', 'e', $str);
        $str = preg_replace('/[íìîï]/ui', 'i', $str);
        $str = preg_replace('/[óòõôö]/ui', 'o', $str);
        $str = preg_replace('/[úùûü]/ui', 'u', $str);
        $str = preg_replace('/[ç]/ui', 'c', $str);
        // $str = preg_replace('/[,(),;:|!"#$%&/=?~^><ªº-]/', '_', $str);
        $str = preg_replace('/[^a-z0-9]/i', '_', $str);
        $str = preg_replace('/_+/', '_', $str); // ideia do Bacco :)
        return $str;
    }
    //SELECT podcast.id, podcast.titulo, tema.id, tema.descricao FROM tema INNER JOIN podcast order by titulo asc
    //SELECT * FROM `podcast_tema`
    //SELECT * FROM podcast_tema pt INNER JOIN podcast p on pt.podcast_id = p.id INNER JOIN tema t on pt.tema_id = t.id ASC
    function obterTema_Podcast(){
      $temapod = array();
        $conexao = obterConexao();
        $sql = "SELECT * FROM podcast_tema pt INNER JOIN podcast p on pt.podcast_id = p.id INNER JOIN tema t on pt.tema_id = t.id";
        if($result = mysqli_query($conexao, $sql)){
          $temapod = $result->fetch_all(MYSQLI_ASSOC);
          mysqli_free_result($result);
        }
        $conexao->close();
        return $temapod;
    }

    function obterTema_PodcastbyId($id){
      $temapod = array();
        $conexao = obterConexao();
        $sql = "SELECT * FROM podcast_tema pt WHERE id_podcast_tema = $id";
        if($result = mysqli_query($conexao, $sql)){
          $temapod = $result->fetch_assoc();
          mysqli_free_result($result);
        }
        $conexao->close();
        return $temapod;
    }

    function obterConvidado_PodcastbyId($id){
      $temapod = array();
        $conexao = obterConexao();
        $sql = "SELECT * FROM podcast_convidado pc WHERE id_podcast_conv = $id";
        if($result = mysqli_query($conexao, $sql)){
          $temapod = $result->fetch_assoc();
          mysqli_free_result($result);
        }
        $conexao->close();
        return $temapod;
    }

    function obterConvidado_Podcast(){
      $convpod = array();
        $conexao = obterConexao();
        $sql = "SELECT * FROM podcast_convidado pc INNER JOIN podcast p on pc.podcast_id = p.id INNER JOIN convidado c on pc.convidado_id = c.id";
        if($result = mysqli_query($conexao, $sql)){
          $convpod = $result->fetch_all(MYSQLI_ASSOC);
          mysqli_free_result($result);
        }
        $conexao->close();
        return $convpod;
    }

    function obterTemaNaoCadastrados($id){
      $temas = array();
      $conexao = obterConexao();
      $sql = "SELECT * from tema where id not in (select tema_id from podcast_tema where podcast_id in (select podcast_id from podcast_tema where id_podcast_tema = $id) )";
      if($result = mysqli_query($conexao, $sql)){
        $temas = $result->fetch_all(MYSQLI_ASSOC);
        mysqli_free_result($result);
      }
      $conexao->close();
      return $temas;
    }

    function obterConvidadoNaoCadastrados($id){
      $temas = array();
      $conexao = obterConexao();
      $sql = "SELECT * from convidado where id not in (select convidado_id from podcast_convidado where podcast_id in (select podcast_id from podcast_convidado where id_podcast_conv = $id) )";
      if($result = mysqli_query($conexao, $sql)){
        $temas = $result->fetch_all(MYSQLI_ASSOC);
        mysqli_free_result($result);
      }
      $conexao->close();
      return $temas;
    }




?>
