
//Setting date and date after three days
var date = new Date(new Date().setHours(0, 0, 0,0)).toLocaleDateString('fr-CA');
var dateAfterThreeDays = new Date(+new Date().setHours(0, 0, 0,0)+ 4*86400000).toLocaleDateString('fr-CA');
$("#dateID").attr({min:date,max:dateAfterThreeDays}); //setting max and min date
//Validatin
function validateForm()
{

    var input;
    input = document.forms["sellForm"]["name_product"].value;
    console.log(input);
    if(input=="")
    {
        console.log("1");
     document.getElementById("name_product_info").innerHTML = "Please Enter the name of Product";  
     return false;
    }
    else
    {
        document.getElementById("name_product_info").innerHTML="";
    }
    input = document.forms["sellForm"]["info_product"].value;
    console.log(input);
    if(input=="")
    {
        console.log("2");
        document.getElementById("info_product_info").innerHTML="Please enter the information ";
        return false;
    }
    else
    {
        document.getElementById("info_product_info").innerHTML="";
    }
    input = document.forms["sellForm"]["type_product"].value;
    console.log(input);
    if(input=="select")
    {
        console.log("3");
        document.getElementById("type_product_info").innerHTML="Please select an option";
        return false;
    }
    else
    {
        document.getElementById("type_product_info").innerHTML="";
    }
    input = document.getElementById("upload_product");
    if('files' in input)
    {
        if(input.files.length == 0)
        {
            document.getElementById("upload_product_info").innerHTML="Please upload an image ";
            return false;
        }
        else if(input.files.length > 5)
        {
            document.getElementById("cannot upload more than 5 photos");
            return false;
        }
    }
    else
    {
        document.getElementById("upload_product_info").innerHTML="Please upload an image";
    }

    input = document.forms["sellForm"]["date"].value;
    if(input=="")
    {
        console.log("5");
        document.getElementById("date_info").innerHTML = " Plase select date";
        return false;
    }

    input = document.forms["sellForm"]["time_slot"].value;
    console.log(input);
    if(input=="select")
    {
        console.log("6");
        document.getElementById("time_slot_info").innerHTML="Please select an option";
        return false;
    }
    else
    {
        document.getElementById("time_slot_info").innerHTML="";
    }

    const result = Math.random().toString(36).substring(2,12);
    document.getElementById("product_id").value=result;
}
