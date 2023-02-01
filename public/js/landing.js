/*singup code*/

function singup(){
    fullname = document.getElementById("singup_name").value;
    socialname = document.getElementById("singup_socialname").value;
    cpf = document.getElementById("singup_cpf").value;
    birthdate = document.getElementById("singup_birthdate").value;
    state = document.getElementById("singup_state").value;
    city = document.getElementById("singup_city").value;
    password = document.getElementById("singup_password").value;
    conf = document.getElementById("conf_password").value;
    usertype = 'estudante';
    singupToken = document.querySelector("input[name = '_token']").value;
    const singupSend = new XMLHttpRequest();

    singupSend.onload = function() {
        singupErr = [];
        singupErr = this.responseText.split("~ ");
        if(singupErr[0] != "noerr") 
        {
            if(singupErr[0] != "") 
            {
                document.getElementById("name_err").innerHTML = singupErr[0];
            }
            else
            {
                document.getElementById("name_err").innerHTML = "";
            }
            
            if(singupErr[1] != "") 
            {
                document.getElementById("socialname_err").innerHTML = singupErr[1];
            }
            else
            {
                document.getElementById("socialname_err").innerHTML = "";
            }

            if(singupErr[2] != "")
            {
                document.getElementById("cpf_err").innerHTML = singupErr[2];
            }

            else
            {
                document.getElementById("cpf_err").innerHTML = "";
            }

            if(singupErr[3] != "")
            {
                document.getElementById("birthdate_err").innerHTML = singupErr[3];
            }

            else
            {
                document.getElementById("birthdate_err").innerHTML = "";
            }

            if(singupErr[4] != "") 
            {
                document.getElementById("state_err").innerHTML = singupErr[4];
            }
            else
            {
                document.getElementById("state_err").innerHTML = "";
            }

            if(singupErr[5] != "") 
            {
                document.getElementById("city_err").innerHTML = singupErr[5];
            }
            else
            {
                document.getElementById("city_err").innerHTML = "";
            }

            if(singupErr[6] != "") 
            {
                document.getElementById("password_err").innerHTML = singupErr[6];
            }
            else
            {
                document.getElementById("password_err").innerHTML = "";
            }

            if(singupErr[7] != "") 
            {
                document.getElementById("conf_err").innerHTML = singupErr[7];
            }
            else
            {
                document.getElementById("conf_err").innerHTML = "";
            }
        }
        else
        {
            window.location.href = "/dashboard/" + singupErr[1];
        }
    } 

    singupSend.open("POST", "/singup_check");
    singupSend.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    singupSend.setRequestHeader("X-CSRF-Token", singupToken);
    singupSend.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    singupSend.send("name=" + fullname + "&social_name=" + socialname + "&cpf=" + cpf + "&birth_date=" + birthdate + "&state=" + state + "&city=" + city + "&user_type=" + usertype + "&password=" + password + "&conf=" + conf);
}

/*singin code*/

function singin()
{
    cpf = document.getElementById("singin_cpf").value;
    password = document.getElementById("singin_password").value;
    singinToken = document.querySelector("input[name = '_token']").value;
    const singinSend = new XMLHttpRequest();

    singinSend.onload = function()
    {
        singinErr = [];
        singinErr = this.responseText.split("~ ");

        if(singinErr[0] != "noerr")
        {
            if(singinErr[0] != "")
            {
                document.getElementById("cpf_err").innerHTML = singinErr[0];
            }
            else
            {
                document.getElementById("cpf_err").innerHTML = "";
            }
            if(singinErr[1] != "")
            {
                document.getElementById("pass_err").innerHTML = singinErr[1];
            }
            else
            {
                document.getElementById("pass_err").innerHTML = "";
            }
        }
        else
        {
            window.location.href = "/dashboard/" + singinErr[1];
        }
    }

    singinSend.open("POST", "/singin_check");
    singinSend.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    singinSend.setRequestHeader("X-CSRF-Token", singinToken);
    singinSend.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    singinSend.send("cpf=" + cpf + "&password=" + password);
}