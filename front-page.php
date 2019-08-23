<?php get_header(); ?>
<?php
$start_date = carbon_get_theme_option( 'crb_event_start' );
$slides = carbon_get_post_meta( get_the_ID(), 'crb_slides' );
$partners = carbon_get_post_meta( get_the_ID(), 'crb_partners');
$founders = carbon_get_post_meta( get_the_ID(), 'crb_founders');
?>
<?php if($slides): ?>

<div id="front-carousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php for($i=0; $i<count($slides); $i++): ?>
      <li data-target="front-carousel" data-slide-to="<?php echo $i; ?>" <?php if($i === 0) echo 'class="active"'; ?>></li>
    <?php endfor; ?>
  </ol>

  <div class="carousel-inner">
    <?php for($j=0; $j<count($slides); $j++): ?>
      <div class="carousel-item <?php if($j === 0) echo 'active'; ?>">
        <img class="mx-auto d-block" src="<?php echo wp_get_attachment_image_src( $slides[$j]['image'], 'full' )[0]; ?>" />
        <div class="container">
          <div class="carousel-caption text-left animated fadeIn">
            <h1><?php echo $slides[$j]['title']; ?></h1>
            <p><?php echo $slides[$j]['content']; ?></p>
            <?php if(isset($slides[$j]['button_url']) && isset($slides[$j]['button_text'])): ?>
              <p><a class="btn btn-lg btn-primary" href="<?php echo $slides[$j]['button_url']; ?>" role="button"><?php echo $slides[$j]['button_text']; ?></a></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endfor; ?>
  </div>
  
  <a class="carousel-control-prev" href="#front-carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#front-carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php endif; ?>

<?php if($start_date): ?>
<section class="text-light bg-dark">
  <h1 class="text-center pt-2"><?php echo date("l, F jS, Y", strtotime($start_date)); ?></h1>

  <div id="countdown">
    <div class="countdown-container animated fadeIn"><span id="countdown-days"></span><br>Days</div>
    <div class="countdown-container animated fadeIn"><span id="countdown-hours"></span><br>Hours</div>
    <div class="countdown-container animated fadeIn"><span id="countdown-minutes"></span><br>Minutes</div>
    <div class="countdown-container animated fadeIn"><span id="countdown-seconds"></span><br>Seconds</div>
  </div>
</section>
<script>
// Set the date we're counting down to
var countDownDate = new Date(<?php echo strtotime($start_date) * 1000; ?>).getTime();

// Update the count down every 1 second
var x = setInterval(function() {
  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result
  document.getElementById('countdown-days').innerHTML = days;
  document.getElementById('countdown-hours').innerHTML = hours;
  document.getElementById('countdown-minutes').innerHTML = minutes;
  document.getElementById('countdown-seconds').innerHTML = seconds;

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown").innerHTML = "COUNTDOWN COMPLETE";
  }
}, 1000);
</script>
<?php endif; ?>

<?php if($partners): ?>
<section class="partners mt-3">
  <div class="container">
    <h2 class="text-center">Partners</h2>
    <div class="row">
      <?php foreach($partners as $partner): ?>
        <div class="col-sm-6 col-md-4 col-lg-3 mt-3 text-center d-flex align-items-center justify-content-center">
          <a href="<?php echo $partner['url'] ?>" target="_blank">
            <?php if(empty($partner['image'])): ?>
              <?php echo $partner['name']; ?>
            <?php else: ?>
              <img class="img-fluid" src="<?php echo wp_get_attachment_image_src( $partner['image'], 'medium' )[0]; ?>" alt="<?php echo $partner['name']; ?>" />
            <?php endif; ?>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if($founders): ?>
<section class="founders mt-5">
  <div class="container">
    <h2 class="text-center">Founder Badges</h2>
    <div class="row">
      <?php foreach($founders as $founder): ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 mt-3 text-center">
          <?php echo $founder['name']; ?>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="row mt-5 mb-3">
      <div class="col text-center">
        <p>Become a Founder now!<br>Limited quantity and special perks only available for this year.</p>
        <a class="btn btn-primary" href="/registration/attendee" target="_blank">Register Now!</a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<section id="content" role="main">
  <?php
  if (have_posts()):
    while (have_posts()):
      the_post();?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section class="entry-content">
          <?php the_content(); ?>
        </section>
      </article>
    <?php endwhile; ?>
  <?php endif; ?>
</section>


<?php get_footer(); ?>