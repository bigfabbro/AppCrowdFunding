function wait() 
    {
        var name =  document.getElementById("name").value
        var surname =  document.getElementById("surname").value
        var data =  document.getElementById("data").value
        var city =  document.getElementById("city").value
        var street =  document.getElementById("street").value
        var number =  document.getElementById("number").value
        var zipcode =  document.getElementById("zipcode").value
        var country =  document.getElementById("country").value
        var email =  document.getElementById("email").value
        var username =  document.getElementById("username").value
        var password1 =  document.getElementById("password1").value
        var password2 =  document.getElementById("password2").value
        if(name!="" && surname!="" && data!="" && city!="" && street!="" && number!=="" && zipcode!="" && country!="" && email!="" && username!="" && password1!="" && password2!="")
        {
        document.getElementById("modalwait").style.visibility = "visible"
        }   
    
    }