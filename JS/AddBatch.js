document.form1.addEventListener( "submit", function(event){
    var year = document.getElementById("year").value;
    if(year.length < 4 ){
        text = "Invalid Input";
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