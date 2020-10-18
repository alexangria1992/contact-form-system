<?php
 
    
        include("include/header.php");
 
    

    // if($dcndb->connect_error){
    //     die("connection failed");
    // }
    // else {
    //     echo "connected";
    // }
?>
  <body>

<div class="container">
  <div class="row">
      <div class="col-md-4">
          <div class="card">
              <div class="card-heading">
                  <h3 class="card-title">Subscribe to Newsletter</h3>
              </div>
              <div class="card-body">
                  <p>dfsdgdsgsdgsdgsdggggggggggggggggggg</p>
                  <p><b>afdsafsdfdfdf</b></p>
                  <hr>
                  <form action="script.php" method="POST" id="subscribe-form" role="search" class="form-inline">
                      <div class="form-group">
                          <input type="text" name="name" id="name" class="form-control" placeholder="Eneter your Name" data-validation="required">
                      </div>
                      <div class="form-group">
                          <input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email" data-validation="email">
                      </div><br><br>
                      <button class="btn btn-primary" type="submit" name="submit">Subscribe</button>

                  </form>
                  <div id="form-result"></div>
              </div>
          </div>
      </div>
  </div>
  </div>
 
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <?php include("include/footer.php") ?>
    <script>
        $.validate({
            form: '#subscribe-form',
            onSuccess : function($form)
            {
                $.post("script.php",
                {
                    name: $("name").val(),
                    email: $("#email").val()
                },
                function(data, status){
                    $("#form-result").html(data);
                });
            }
        });
    </script>




  </body>
</html>