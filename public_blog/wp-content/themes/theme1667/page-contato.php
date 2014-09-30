<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>

<style type="text/css">
.footermapa {
background-image: url('/facebook/img/mapa.png');
background-size: 850px;
width: 100%;
margin: auto;
border-radius: 10px;
height: 370px;
padding: 20px;
margin-bottom: 30px;
}
.footermapacontent {
width: 99%;
background-color: #FFFFFF;
border-radius: 5px;
padding: 5px;
opacity: 0.7;
filter: alpha(opacity=70);
}
.footertitlemap {
color: #692913;
font-weight: 600;
margin-bottom: 15px;
}
.linkmaps {
text-align: right;
font-weight: 300;
}
</style>

<div class="clearfix">
  <div class="grid_12">



  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>

          <div id="my_postwidget-3" class="widget-home-top" style="padding-bottom: 0px; background: url('/'); color: #190c06;">                              
            <ul class="latestpost">
              <li class="clearfix"  style="width: 100%;">
                <div class="text-box">
                  <h4><a href="#" rel="bookmark" title="Horário de atendimento"><?php the_title(); ?></a></h4>
                </div>
              </li>
            </ul>
          </div>
  <?php endwhile; ?>
            




<div style="float: left; width: 470px;">
    <div class="footermapa">
      <div class="footermapacontent">
        <div class="footertitlemap">
          
          <div class="footertitlemap">Localização</div>

        </div>
        <div>R. Haddock Lobo, 351 - Vila Bastos, Santo André - SP</div>
        <div class="linkmaps"><a target="_blank" href="https://www.google.com.br/maps/place/R.+Haddock+Lobo,+351+-+Vila+Bastos,+Santo+Andr%C3%A9+-+SP/@-23.6588358,-46.5375112,17z/data=!4m2!3m1!1s0x94ce42f3af358829:0xfefb6eeadd0c80f4">Ver no Google Maps</a></div>

      </div>
    </div>
</div>


<div style="float: left; width: 400px; margin-left: 70px;">
  <div id="my_postwidget-3" class="widget-home-top"  style="padding-bottom: 0px; background: url('/');">                              
    <ul class="latestpost">
      <li class="clearfix"  style="width: 100%;">
        <div class="text-box">
          <h4><a href="#" rel="bookmark" title="Horário de atendimento" style="font-size: 20px;">Horário de atendimento</a></h4>
            
            <div class="excerpt">
              <p>Terça, Quarta, Quinta e Domingo:<br>
              das 18h as 23h</p>
              <p>Sexta e Sábado:<br>
              das 18h as 01h</p>
            </div>
        </div>
      </li>

      <li class="clearfix"  style="width: 100%;">
        <div class="text-box">
          <h4><a href="#" rel="bookmark" title="Reservas e Eventos" style="font-size: 20px;">Reservas e Eventos</a></h4>
            
            <div class="excerpt">
              <p>Ligue nos horários de funcionamento<br>
              no telefone: (11)2324-8055 <br>
              ou pelo email: <a href="mailto:contato@3burger.com.br">contato@3burger.com.br</a></p>
            </div>
        </div>
      </li>
    </ul>
  </div>   
</div>

</div>

  </div>
</div>
<div class="clearfix">
  <?php if ( ! dynamic_sidebar( 'After Content Area' ) ) : ?>
    <!--Widgetized 'After Content Area' for the home page-->
    <?php endif ?>
</div>

<?php get_footer(); ?>