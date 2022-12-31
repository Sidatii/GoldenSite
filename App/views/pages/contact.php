<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="testim">
  <div class="titre0">
    <h2>What our clients say about us</h2>
  </div>
</div>
<div>
  <div class="testim_cl">
    <img src="images/sidatt.jfif" alt="avatar">
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


<?php require APPROOT . '/views/inc/footer.php'; ?>