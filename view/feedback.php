<div class = 'container-fluid'>
  <div class="d-flex justify-content-center">
  <form id="contactForm" method="post">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="fname" class="container-text">First name:</label>
                    <input type="text" name = "fname" class="form-control" id="fname" placeholder="Enter first name" oninput="validInput(0)" onblur="actual(0)">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="lname" class="container-text">Last name:</label>
                    <input type="text" name = "lname" class="form-control" id="lname" placeholder="Enter last name" oninput="validInput(1)" onblur="actual(1)">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="container-text">Email:</label>
            <input type="email" name = "email" class="form-control" id="email" placeholder="Enter Email" oninput="validInput(2)" onblur="actual(2)">
        </div>
        <div class="form-group">
            <label for="msg" class="container-text">Message:</label>
            <textarea class="form-control" name = "msg" rows="5" id="msg" oninput="validInput(4)" onblur="actual(4)" placeholder = "Enquiry or feedback"></textarea>
        </div>
        <div class="row">
            <div class="col-2"> <button type="submit" class="btn btn-primary">Submit</button></div>
        </div>
    </form>
  </div>
</div>
<script src = '../js/feedback.js'></script>