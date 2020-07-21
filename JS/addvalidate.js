document.form1.addEventListener( "submit", function(event){
    var name = document.getElementById("name").value;
    var year = document.getElementById("year").value;
    if(name == "" || year == "" || isNaN(year)){
        text = "Invalid Name or Year";
        event.preventDefault();
    }
    else if(year.length != 4){
        text = "Year Invalid";
        event.preventDefault();
    }
    var invalid = document.getElementById("invalid");
    invalid.innerHTML = text;
    invalid.style.backgroundColor = '#FAB8B8';
    invalid.style.borderRadius = '5px';
    invalid.style.width = '25%'
    invalid.style.padding = '10px';
    invalid.style.color = '#DA1313';
    invalid.style.border = '2px solid #DA1313'
    invalid.style.fontSize = '1.2rem';
    invalid.style.fontFamily = 'sans-serif';
})
