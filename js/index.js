function recordRegister() {
    let numI = document.querySelectorAll('input').length;
    for(let i=0; i<numI; i++) {
        document.getElementsByTagName('input')[i].readOnly = true;
    }

    document.querySelector("#record").setAttribute('disabled', 'disabled'); 
    document.querySelector("#edit").removeAttribute('disabled');  
    document.querySelector("#submit").removeAttribute('disabled');
}

function editRegister() {
    let numI = document.querySelectorAll('input').length;
    for(let i=0; i<numI; i++) {
        document.getElementsByTagName('input')[i].readOnly = false;
    }

    document.querySelector("#record").removeAttribute('disabled');
    document.querySelector("#edit").setAttribute('disabled', 'disabled'); 
    document.querySelector("#submit").setAttribute('disabled', 'disabled'); 
}