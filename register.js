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
        $.ajax({
            type: 'POST',
            url: 'data.php',
            data: {
                nama: inputNameValue,
                class: inputClassValue,
                major: inputMajorValue,
                phone: inputPhoneValue,
                alamat: inputAddressValue,
                reason: inputReasonValue
            },
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Jangan lupa masuk grup wa nya ya ^^ ',
                    icon: 'success',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = 'join.html';
                });
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
}