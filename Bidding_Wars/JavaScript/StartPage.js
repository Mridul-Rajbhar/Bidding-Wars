function checkBoxSell() {
    if(document.getElementById("checkSell").checked == true)
    {
        document.getElementById("sellButton").disabled = false;
        document.getElementById("msg1").innerHTML = "";
    }
    else
    {
        document.getElementById("sellButton").disabled = true;
        document.getElementById("msg1").innerHTML = "Please click the check box";
    }
}
function checkBoxBuy() 
{
    if(document.getElementById("checkBuy").checked == true)
    {
        document.getElementById("buyButton").disabled = false;
        document.getElementById("msg2").innerHTML = "";
    }
    else
    {
        document.getElementById("buyButton").disabled = true;
        document.getElementById("msg2").innerHTML = "Please click the check box";
    }
}
function checkBoxBid() 
{
    if(document.getElementById("checkJoinBid").checked == true)
    {
        document.getElementById("bidButton").disabled = false;
        document.getElementById("msg3").innerHTML = "";
    }
    else
    {
        document.getElementById("bidButton").disabled = true;
        document.getElementById("msg3").innerHTML = "Please click the check box";
    }
}