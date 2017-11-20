<?php
//form1.php

if (isset($_POST["FirstName"])) {
    //if data show
    $FirstName = $_POST["FirstName"];
    $LastName = $_POST["LastName"];
    $Email = $_POST["Email"];
    
    echo "
        <p>You got a message from $FirstName $LastName.</p>
        <p>$FirstName's email is $Email</p>
    ";
    
    /*
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    */
    
} else {
    //show form
    echo '
    <form action = "" method = "post">
        <lable>
            First Name:<br />
            <input 
            type = "text" 
            name = "FirstName" 
            placeholder = "Put First Name Here"
            required = "required"
            tabindex = "10"
            title = "First Name is required"
            />
        </lable>
        <br />
        
        <lable>
            Last Name:<br />
            <input 
            type = "text" 
            name = "LastName" 
            placeholder = "Put Last Name Here"
            required = "required"
            tabindex = "20"
            title = "Last Name is required"
            />
        </lable>
        <br />
        
        <lable>
            Email:<br />
            <input 
            type = "email" 
            name = "Email" 
            placeholder = "Put Email Address Here"
            required = "required"
            tabindex = "30"
            title = "Email is required"
            />
        </lable>
        <br />
        <input type = "submit" />

    </form>
    ';
}

?>