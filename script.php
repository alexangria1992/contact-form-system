<?php
    include("include/header.php");
    if(isset($_POST['submit'])){
    $dcndb = mysqli_connect('localhost', 'root', '', 'contact_form_db');

    $name= mysqli_real_escape_string($dcndb, $_POST['name']);
    $email = mysqli_real_escape_string($dcndb, $_POST['email']);

    $query = "SELECT count(*) as total FROM subscribers WHERE email = '$email'";
    $result = mysqli_query($dcndb, $query);
    $data = mysqli_fetch_array($result);
    $total = $data['total'];
    
    if($total == 0)
    {
        $query = "INSERT INTO subscribers SET name='$name', email='$email'";
        mysqli_query($dcndb, $query);
        $to = $email;
        $subject = 'New Subscriber';
        $headers = 'From: noreply@domain.com';
        $ip = $_SERVER['REMOTE_ADDR'];
        $dte = date('Y-m-d');

        $msg = "
        --------------- 
        Form Data: 
        --------------- 
        Name: $name
        Email: $email 
        Server Information: 
        -------------------
        IP Address: $ip
        Date: $dte
        
        ";
        
        
        mail($to, $subject, $msg, $headers);
        echo '<div class="alert alert-success">Thank you</div>';

       
    }
    else 
    {
        echo '<div class="alert alert-danger">Sorry you are already a subscriber</div>';

   

    }
    
        include("include/footer.php");
 
    }

    // if($dcndb->connect_error){
    //     die("connection failed");
    // }
    // else {
    //     echo "connected";
    // }
?>