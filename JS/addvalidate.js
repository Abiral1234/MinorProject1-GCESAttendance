document.form1.addEventListener( "submit", function(event){
    var name = document.getElementById("name").value;
    var batch = document.getElementById("program").value;
    var roll = document.getElementById("roll").value;
    var reg = document.getElementById("reg").value;
    if(name == ""){
        text = "Invalid Name";
        event.preventDefault();
    }
    else if(batch == "1"){
        text = "Please Select Batch";
        event.preventDefault();
    }
    else if(isNaN(roll) || roll <= "0" || roll >= "49"){
        text = "Roll Number Invalid";
        event.preventDefault();
    }
    else if(isNaN(reg) || reg.length != 8){
        text = "Registration Number Invalid";
        event.preventDefault();
    }
    var invalid = document.getElementById("invalid");
    invalid.innerHTML = text;
    invalid.style.backgroundColor = '#FAB8B8';
    invalid.style.borderRadius = '5px';
    invalid.style.width = '20%'
    invalid.style.padding = '10px';
    invalid.style.color = '#DA1313';
    invalid.style.border = '2px solid #DA1313'
    invalid.style.fontSize = '1.2rem';
    invalid.style.fontFamily = 'sans-serif';
})
