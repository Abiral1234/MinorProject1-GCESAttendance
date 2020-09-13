document.form1.addEventListener( "submit", function(event){
    var name = document.getElementById("name").value;
    var user = document.getElementById("username").value;
    var pwd = document.getElementById("pword").value;
    if(name == "" || user == "" || pwd == "" || pwd.length<6){
        text = "Invalid Name, Username or Password";
        event.preventDefault();
    }
    var invalid = document.getElementById("invalid");
    invalid.innerHTML = text;
    invalid.style.backgroundColor = '#FAB8B8';
    invalid.style.borderRadius = '5px';
    invalid.style.width = '40%'
    invalid.style.padding = '10px';
    invalid.style.color = '#DA1313';
    invalid.style.border = '2px solid #DA1313'
    invalid.style.fontSize = '1.2rem';
    invalid.style.fontFamily = 'sans-serif';
})