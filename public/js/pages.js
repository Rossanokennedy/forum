function showForum()
{
    forumSpot = document.getElementById("forum_spot");
    if(forumSpot.style.visibility === "visible" )
    {
        forumSpot.style.visibility = "hidden";
    }
    else
    {
        forumSpot.style.visibility = "visible";
    }
}

function createForum()
{
    title = document.getElementById("forum_title").value;
    forumToken = document.querySelector("input[name = '_token']").value;
    forumSend = new XMLHttpRequest();

    forumSend.onload = function()
    {
        forumErr = [];
        forumErr = this.responseText.split("~ ");

        if(forumErr[0] != "noerr")
        {
            document.getElementById("forum_err").innerHTML = forumErr[0];
        }
        else
        {
            window.location.href = "/forum/" + forumErr[1];
        }
    }

    forumSend.open("POST", "/forum_check");
    forumSend.setRequestHeader("X-Request-With", "XMLHttpRequest");
    forumSend.setRequestHeader("X-CSRF-Token", forumToken);
    forumSend.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    forumSend.send("title=" + title);
}

/*view pages functions*/

function showDiscussion()
{
    viewDiscuss = document.getElementById("view_discuss");

    if(viewDiscuss.style.visibility === "visible")
    {
        viewDiscuss.style.visibility = "hidden";
    }
    else
    {
        viewDiscuss.style.visibility = "visible";
    }
}

function newDiscussion(fid)
{
    viewBody = document.getElementById("view_body").value;
    viewToken = document.querySelector("input[name = '_token']").value;
    viewSend = new XMLHttpRequest();

    viewSend.onload = function()
    {
        viewErr = [];
        viewErr = this.responseText.split("~ ");
        if(viewErr[0] != "noerr")
        {
            document.getElementById("view_err").innerHTML = viewErr[0];
        }
        else
        {
            window.location.href = "/forum/" + fid + "/" + viewErr[2];
        }
    }

    viewSend.open("POST", "/forum/" + fid + "/store");
    viewSend.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    viewSend.setRequestHeader("X-CSRF-Token", viewToken);
    viewSend.setRequestHeader("Content-type", "x-www-form-urlencoded");
    viewSend.send("viewBodey" + viewBody);
}

function sendReply(did)
{
    responseBody = document.getElementById("reply_body").value;
    responseToken = document.querySelector("input[name = '_token']").value;
    responseList = document.getElementById("discussion_list").innerHTML;
    responseSend = new XMLHttpRequest();

    responseSend.onload = function()
    {
        responseErr = [];
        responseErr - this.responseText.split("~ ");

        if(responseErr[0] != "noerr")
        {
           document.getElementById("reply_err").innerHTML = responseErr[0];
           document.getElementById("reply_success").innerHTML =  "";
        }
        else
        {
            document.getElementById("reply_err").innerHTML = "";
            document.getElementById("reply_success").innerHTML =  "Resposta postada";
            document.getElementById("discussion_list").innerHTML = responseList + responseErr[1];
            document.getElementById("reply_body").value = "";
        }
    }

    responseSend.open("POST", "/forum/" + did + "/create");
    responseSend.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    responseSend.setRequestHeader("X-CSRF-Token", responseToken);
    responseSend.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    responseSend.send("responseBody=" + responseBody);
}