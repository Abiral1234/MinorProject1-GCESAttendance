const inputs = document.querySelectorAll(".u_input");
document.myform.addEventListener( "submit", function(event){
  var username=document.myform.name.value;  
  var password = document.getElementById("pass").value;  
  if(username == ""){
    text = "Username Invalid";
    event.preventDefault();
  }
  else if(password == ""){
    text = "Password Invalid";
    event.preventDefault();
  }
  else if(password.length < 8)
  {
    text = "Password must be atleast 8 characters long";
    event.preventDefault();
  }
  var invalid = document.getElementById("invalid");
  invalid.innerHTML = text;
  invalid.style.backgroundColor = '#FAB8B8';
  invalid.style.borderRadius = '5px';
  invalid.style.padding = '10px';
  invalid.style.color = '#DA1313';
  invalid.style.border = '2px solid #DA1313'
  invalid.style.fontSize = '1.2rem';
  invalid.style.fontFamily = 'sans-serif';
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