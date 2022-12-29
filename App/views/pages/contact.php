<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <img src="images/Dhayby_logo.svg" height="" alt="Logo">
            <span>
              Dhayby
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="gallery.php"> Gallery</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php"> Contact us</a>
                </li>
              </ul>

            </div>
          </div>
        </nav>
      </div>
    </header>
    <div class="testim">
      <div class="titre0"><h2>What our clients say about us</h2></div>
    </div>
    <div>
      <div class="testim_cl">
        <img src="images/sidatt.jfif" alt="avatar" >
        <p>DHAYBY is a special jewelorries store to me. whenever I need to buy jeweleries I do not need to think twice, because DHAYBY is always my first choice</p>
      </div>
    </div>
    <div class="reachout" style="text-align:center">
      <h2>Reach out to us</h2>
    </div>
  <div class="contenaire">
    
    <div class="contenaire1">
      <div class="contenaire2">
        <form>
          <div class="info">
            <label for="full_name">Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Your name...">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your email...">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" placeholder="Your address...">
          </div>
         
          <div class="message">
            <label for="message">Message</label> 
            <textarea id="message" name="message" placeholder="Write something.." rows="7" cols="40"></textarea>
           
          </div>
          <div class="btn">
            <input type="submit" value="SUBMIT">
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="title">
      <h5>On rush! <span>Reach out directly.</span></h5>
  </div>
  <div class="reach">
    <div class="contact_mean1">
      <img src="images/Address.png" width="35px" alt="">
      <h6>Address</h6>
    </div>
    <div class="contact_mean2">
      <img src="images/whatsapp.png" width="35px" alt="">
      <h6>Whatsapp</h6>
    </div>
    <div class="contact_mean3">
      <img src="images/phone_call.png" width="35px" alt="">
      <h6>Phone</h6>
    </div>
  </div>
  <div class="button"><a href="gallery.php">Gallery</a></div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
 

 