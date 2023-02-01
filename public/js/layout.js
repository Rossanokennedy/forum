function showHeader()
{
    var subhead = document.getElementById("subheader");

    if(subhead.style.visibility === "visible")
    {
        subhead.style.visibility = "hidden";
    }
    else
    {
        subhead.style.visibility = "visible";
    }
}