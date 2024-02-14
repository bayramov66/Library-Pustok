function Function() {
    event.preventDefault()
    const pass = document.getElementById('password').value;
    const rpass = document.getElementById('rpassword').value;
    if (pass.length == 0) {
        document.getElementById('err').innerHTML = "Password columns cannot be empty";
    }

    else if (rpass.length == 0) {
        document.getElementById('err').innerHTML = "Password columns cannot be empty";
    }

    else if(pass.length < 8) {
        document.getElementById('err').innerHTML = "Password lengths cannot be less than 8";
        
    }
    
    else if(!(/\d/.test(pass))) {
        document.getElementById('err').innerHTML = "Password should have atleast 1 number";

    }

    else if (pass != rpass) {
        document.getElementById('rpassword').classList.add('wpass');
        document.getElementById('err').innerHTML = "Password did not match";
    }

    else{
       const v1 = document.getElementById('v1');
       v1.innerHTML = "Your password has been updated! Now get back in the driver seat, racers are waiting for you"
       const btn = document.getElementById('bt')
    //    btn.classList.add('reset1')
       btn.innerHTML = "Join a race"
    }

}

document.getElementById('err').innerHTML = "";
