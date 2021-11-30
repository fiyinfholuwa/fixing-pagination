<?php include 'includes/meta.php'; ?>

  <?php include 'includes/header.php'; ?>

  <section  class="contact-us" id="contact">
   <section class="apply-now" id="apply">
    <div class="container">
      <div class="row">
        <h1 style="color: white;  text-align: center; font-weight: bold; padding: 30px;">Latest Updates</h1>
        <div class="col-lg-12 align-self-center">
          <div class="row">
            <?php 
              $news = new Updates();
              $getNews = $news->getAllUpdates();
              if ($getNews) {
                while ($result= $getNews->fetch_assoc()) { ?>
               
            <div class="col-lg-6">
              <div class="item">
                <h3><?php echo $result['update_title']; ?></h3>
                <p><?php echo $result['update_text']; ?></p>
                <div class="main-button-red">
                  <div class="scroll-to-section"><a href="#contact">Apply Now</a></div>
              </div>
              </div>
            </div>
            <?php } } ?>

          </div>
        </div>
        
      </div>
    </div>
  </section>

    
  </section>

<?php include 'includes/footer.php'; ?>
