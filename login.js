document.getElementById("register").style.display = "none";
document.getElementById("forgot").style.display = "none";
document.getElementById("error").style.display = "none";
document.getElementById("recover").style.display = "none";

function MyPassword() {
    document.getElementById("forgot").style.display = "block";
    document.getElementById("login").style.display = "none";
    document.getElementById("register").style.display = "none";
}

function MyRegister() {
    document.getElementById("register").style.display = "block";
    document.getElementById("login").style.display = "none";
    document.getElementById("forgot").style.display = "none";
}

function MyLogin() {
    document.getElementById("register").style.display = "none";
    document.getElementById("forgot").style.display = "none";
    document.getElementById("login").style.display = "block";
}

function check() {
    if (document.getElementById('password').value ==
        document.getElementById('confirm_password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'matching';
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'not matching';
    }
}