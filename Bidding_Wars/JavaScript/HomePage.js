function validateForm()
{

    var name;
    var pwd;
    name = document.forms["homePageForm"]["uname"].value;
    pwd = document.forms["homePageForm"]["pwd"].value;
    //console.log(name);
    if(name.length==0)
    {
     document.getElementById("name_info").innerHTML = "Enter Username";
        return false;
    }
    if(pwd.length==0)
    {
        document.getElementById("pwd_info").innerHTML = "Enter Password";
        return false;
    }

}