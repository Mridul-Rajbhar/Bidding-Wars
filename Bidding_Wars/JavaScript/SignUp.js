function validateForm()
{

    var input;

    input = document.forms["SignUpForm"]["uname"].value;
    console.log(input);
    if(input.length>15)
    {
        console.log("1");
     document.getElementById("uname_info").innerHTML = "Username greater than 15";
        return false;
    }
    else if(input.length<=0)
    {
        console.log("2");
        document.getElementById("uname_info").innerHTML="Please Enter Username ";
        return false;
    }
    else if(input.length<5)
    {
        console.log("3");
        document.getElementById("uname_info").innerHTML="Username less than 5";
        return false;
    }
    else if((/\d/.test(input) && /[a-zA-Z]/.test(input))===false)
    {
        console.log("4");
        document.getElementById("uname_info").innerHTML="Name must have atleast one letter and digit";
        return false;
    }

    input = document.forms["SignUpForm"]["fname"].value;
    if((/[a-zA-Z]/.test(input)===false) || input=="")
    {
        console.log("5");
        document.getElementById("fname_info").innerHTML = "Please Enter First Name ";
        return false;
    }

    input = document.forms["SignUpForm"]["mname"].value;
    if((/[a-zA-Z]/.test(input)===false) || input=="")
    {
        console.log("6");
        document.getElementById("mname_info").innerHTML = "Please Enter Middle Name ";
        return false;
    }
    input = document.forms["SignUpForm"]["lname"].value;
    if((/[a-zA-Z]/.test(input)===false) || input=="")
    {
        console.log("7");
        document.getElementById("lname_info").innerHTML = "Please Enter Last Name ";
        return false;
    }

    input=document.forms["SignUpForm"]["dob"].value;
    if(input === "")
    {
        console.log("8");
        document.getElementById("dob_info").innerHTML = "Please Enter Date of Birth ";
        return false;
    }

    input = document.forms["SignUpForm"]["gender"].value;
    if(input === "select")
    {
        console.log("9");
        document.getElementById("gender_info").innerHTML = "Please select an option";
        return false;
    }
    
    input = document.forms["SignUpForm"]["room_no"].value;
    if(/[0-9A-Za-z]/.test(input)===false)
    {
        console.log("10");
        document.getElementById("room_no_info").innerHTML = "Please Enter Room No.";
        return false;
    }

    input = document.forms["SignUpForm"]["locality"].value;
    if(/[0-9A-Za-z _]/.test(input)===false)
    {
        console.log("11");
        document.getElementById("locality_info").innerHTML = "Please Enter your Locality";
        return false;
    }


    input = document.forms["SignUpForm"]["station"].value;
    if(/[A-Za-z _]/.test(input)===false)
    {
        console.log("12");
        document.getElementById("station_info").innerHTML = "Please Enter the Station";
        return false;
    }

    input = document.forms["SignUpForm"]["pincode"].value;
    if(/[0-9 ]/.test(input)===false)
    {
        console.log("13");
        document.getElementById("pincode_info").innerHTML = "Pincode Missing";
        return false;
    }

    input = document.forms["SignUpForm"]["state"].value;
    if(input==="select")
    {
        console.log("14");
        document.getElementById("state_info").innerHTML = "Select an option";
        return false;
    }

    input = document.forms["SignUpForm"]["phone"].value;
    if(/[0-9]/.test(input)===false)
    {
        console.log("15");
        document.getElementById("phone_info").innerHTML = "Only numericals allowed";
        return false;
    }

    input = document.forms["SignUpForm"]["email"].value;
    if(!input.includes("@") && !input.includes("."))
    {
        console.log("16");
        document.getElementById("email_info").innerHTML = "Invalid Format";
        return false;
    }	


    input = document.forms["SignUpForm"]["pwd"].value;
    console.log(input);
    if(input.length >= 15)
    {
        console.log("17");
     document.getElementById("pwd_info").innerHTML = "Password greater than 15";
        return false;
    }
    else if(input.length == 0)
    {
        console.log("18");
        document.getElementById("pwd_info").innerHTML="Please Enter Password";
        return false;
    }
    else if(input.length <= 7)
    {
        console.log("19");
        document.getElementById("pwd_info").innerHTML="Password less than 5";
        return false;
    }
    else if((/\d/.test(input) && /[a-zA-Z]/.test(input))===false)
    {
        console.log("20");
        document.getElementById("pwd_info").innerHTML="Password must have atleast one letter and digit";
        return false;
    }


return true;
}