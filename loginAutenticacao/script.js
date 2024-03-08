let inputs = document.getElementById("#email", "#senha");

function alertError(msg){
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });
        Toast.fire({
        icon: "error",
        title: msg,
        background: "#7a605b",
        color: "#fff"
    });
}

function alertSucces(msg){
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });
        Toast.fire({
        icon: "success",
        title: msg,
        background: "#7a605b",
        color: "#fff"
    });
}

function validacao(){
    if (!inputs.value){
        alterarAlertError("Digite sua nova tarefa")
    }
}