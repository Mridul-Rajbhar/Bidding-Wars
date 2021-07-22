function validateContactForm()
{
    var name;
    var email;
    var queries;
    name = document.forms["ContactForm"]["name"].value;
    email = document.forms["ContactForm"]["email"].value;
    queries = document.forms["ContactForm"]["queries"].value;

    if(name.length==0)
    {
     document.getElementById("name_info").innerHTML = "Enter Your Name";
     return false;
    }
    if(email.length==0)
    {
        document.getElementById("email_info").innerHTML = "Email Id can't be empty";
        return false;
    }
    if((queries.length==0)||(queries.length<=10))
    {
        document.getElementById("queries_info").innerHTML = "Please describe your problem in atleast 10 words.";
        return false;
    }  
    
}