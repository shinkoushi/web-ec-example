let inputName = document.getElementById('name')
let inputClass = document.getElementById('class')
let inputMajor = document.getElementById('major')
let inputPhone = document.getElementById('phone')
let inputAddress = document.getElementById('address')
let inputReason = document.getElementById('reason')

function daftar() {
    let inputNameValue = inputName.value;
    let inputClassValue = inputClass.value;
    let inputMajorValue = inputMajor.value;
    let inputPhoneValue = inputPhone.value;
    let inputAddressValue = inputAddress.value;
    let inputReasonValue = inputReason.value;

    if(inputNameValue == ""){
        alert("write your Name !");
    }else if(inputClassValue == ""){
        alert("Choose your class!");
    }else if(inputMajorValue == ""){
        alert("Choose your major!");
    }else if(inputPhoneValue == ""){
        alert("write your phone!");
    }else if(inputAddressValue == ""){
        alert("write your address!");
    }else if(inputReasonValue == ""){
        alert("write your reason!");
    }else{
       
                Swal.fire({
                    title: 'Success!',
                    text: 'ini hanya web contoh bukan yang asli -develover sinta',
                    icon: 'success',
                    timer: 3000,
                    showConfirmButton: true
                }).then(() => {
 
        });
    }
}
