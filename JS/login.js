const inputs = document.querySelectorAll(".input");
document.loginform.addEventListener( "submit", function(event){
var username=document.loginform.name.value;  
var password = document.getElementById("pass").value;  
if(username == ""){
    text1 = "Username Invalid";
    event.preventDefault();
}
else{
	text1= "";
}
	if(password == ""){
    text2 = "Password Invalid";
    event.preventDefault();
  }
else if(password.length < 8)
{
    text2 = "Password must be atleast 8 characters long";
    event.preventDefault();
}
else if(password != "" || password.length > 8 ){
	text2 = "";
}
  var invalid1 = document.getElementById("invalid1");
  var invalid2 = document.getElementById("invalid2");
  invalid1.innerHTML = text1;
  invalid1.style.color = '#DA1313';
  invalid1.style.fontSize = '1.2rem';
  invalid1.style.fontFamily = 'sans-serif';
  invalid2.innerHTML = text2;
  invalid2.style.color = '#DA1313';
  invalid2.style.fontSize = '1.2rem';
  invalid2.style.fontFamily = 'sans-serif';
})
function addcl(){
    let parent = this.parentNode.parentNode;
    parent.classList.add("focus");
}
function remcl(){
    let parent = this.parentNode.parentNode;
    if(this.value == ""){
        parent.classList.remove("focus");
    }
}
inputs.forEach(input => {
    input.addEventListener("focus", addcl);
    input.addEventListener("blur", remcl);
});