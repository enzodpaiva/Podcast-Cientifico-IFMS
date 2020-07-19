<?php
$URL_rodape = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if($URL_rodape == 'localhost/podcast/Admin/ListPodcast.php' || $URL_rodape == 'localhost/podcast/Admin/CadPodcast.php' 
|| $URL_rodape == 'localhost/podcast/Admin/ListConvidados.php' || $URL_rodape == 'localhost/podcast/Admin/CadConvidado.php'
|| $URL_rodape == 'localhost/podcast/Admin/ListTemas.php' || $URL_rodape == 'localhost/podcast/Admin/CadTema.php'
|| $URL_rodape == 'localhost/podcast/Admin/updateConvidado.php' || $URL_rodape == 'localhost/podcast/Admin/UpdateTema.php'
|| $URL_rodape == 'localhost/podcast/Admin/UpdatePodcast.php' || $URL_rodape == 'localhost/podcast/Admin/Adm.php') {
  echo "<div id='rodape'>
  <div id='div3'>
    <h4>Sobre</h4>
    <a href='../Page_About.php'>Quem somos?</a> <br>
    <a href='../FaleConosco.php'>Fale conosco</a> <br>
  </div>
  <div id='div3'>
    <h4>Redes Sociais</h4>
    <a href='https://www.facebook.com/ScienceTalkPodcastIF/' target='_blank'>Facebook - Science Talk</a> <br>
    <a href='https://twitter.com/ScienceTalkIF' target='_blank'>Twitter - Science Talk</a>

  </div>
</div>";
}elseif ($URL_rodape = 'localhost/podcast/Index.php'){
  echo "<div id='rodape'>
  <div id='div3'>
    <h4>Sobre</h4>
    <a href='Page_About.php'>Quem somos?</a> <br>
    <a href='FaleConosco.php'>Fale conosco</a> <br>
  </div>
  <div id='div3'>
    <h4>Redes Sociais</h4>
    <a href='https://www.facebook.com/ScienceTalkPodcastIF/' target='_blank'>Facebook - Science Talk</a> <br>
    <a href='https://twitter.com/ScienceTalkIF' target='_blank'>Twitter - Science Talk</a>

  </div>
</div>";
}
?>
