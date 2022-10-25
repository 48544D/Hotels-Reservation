function CheckboxesValidation() {
    var checkboxes = document.getElementsByName('rooms[]');
    var checked = false;
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checked = true;
            break;
        }
    }
    if (!checked) {
        alert('Select at least one option');
        return false;
    }
    return true;
}

function displaySelectedInput() {
    var StandardCheckBox = document.getElementById("standard_room");
    var DeluxeCheckBox = document.getElementById("deluxe_room");
    var VipCheckBox = document.getElementById("vip_room");

    var StandardInput = document.getElementsByName("standard_number");
    var DeluxeInput = document.getElementsByName("deluxe_number");
    var VipInput = document.getElementsByName("vip_number");


    if (StandardCheckBox.checked == true){
        for (let index = 0; index < StandardInput.length; index++)
            StandardInput[index].style.display = "block";
    } else {
        for (let index = 0; index < StandardInput.length; index++)
            StandardInput[index].style.display = "none";
    }

    if (DeluxeCheckBox.checked == true){
        for (let index = 0; index < DeluxeInput.length; index++)
            DeluxeInput[index].style.display = "block";
    } else {
        for (let index = 0; index < DeluxeInput.length; index++)
            DeluxeInput[index].style.display = "none";
    }

    if (VipCheckBox.checked == true){
        for (let index = 0; index < VipInput.length; index++)
            VipInput[index].style.display = "block";
    } else {
        for (let index = 0; index < VipInput.length; index++)
            VipInput[index].style.display = "none";
    }
}

onload = function() {
    displaySelectedInput();
}