const localStorageKey = 'tasks'

function ifTarefaRepetida(){
    let values = JSON.parse(localStorage.getItem(localStorageKey) || "[]")
    let inputValues = document.getElementById("input-add-item").value
    let existe = values.find(x => x.name == inputValues)
    return !existe ? false : true
}

function contCaracter() {
    const inputValues = document.getElementById("input-add-item").value;
    const trêsOuMaisCaracteres = inputValues.length >= 3;
    return trêsOuMaisCaracteres;
}

function alterarAlertError(msg){
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

function alterarAlertSucces(msg){
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

function novaTarefa(){
    let input = document.getElementById("input-add-item")
    input.style.border = ''

    function inputRed(){
        input.style.border = '2px solid red';
    }

    function inputGreen(){
        input.style.border = '2px solid green'
    }

    // Validações
    if (!input.value){
        alterarAlertError("Digite sua nova tarefa")
        inputRed()

    }else if(ifTarefaRepetida()){
        alterarAlertError("Já existe uma tarefa com este nome")
        inputRed()

    }else if(!contCaracter()){
        alterarAlertError("Sua tarefa precisa ter mais de 3 digitos.")
        inputRed()

    }else if(input.value.trim() == "" || input.value.includes("'") || input.value.includes('"')){
        alterarAlertError("Insira uma mensagem valida")
        inputRed()

    }else{
        // Salvar dados na variavel 'name'
        let values = JSON.parse(localStorage.getItem(localStorageKey) || "[]")
        values.push({
            name: input.value
        })
        // Atualizar o armazenamento local
        localStorage.setItem(localStorageKey, JSON.stringify(values))
        mostrarValores()

        alterarAlertSucces("Tarefa Adicionada com sucesso.")
        inputGreen()
    }input.value = ''
}

function mostrarValores(){
    let values = JSON.parse(localStorage.getItem(localStorageKey) || "[]")
    let list = document.getElementById('to-do-list')
    // adicionar conteudo em uma string vazia
    list.innerHTML = ''
    for(let i=0; i <values.length; i++){
        list.innerHTML += `<li>${values[i]['name']}
        <button id="btn-ok" onclick='removerItem("${values[i]['name']}")'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
      </svg></button></li>`
    }
}

function removerItem(data){
    let values = JSON.parse(localStorage.getItem(localStorageKey) || "[]")

    let index = values.findIndex(x => x.name == data)

    values.splice(index, 1)
     
    localStorage.setItem(localStorageKey,JSON.stringify(values))
    mostrarValores()

    alterarAlertSucces("Tarefa marcada como concluida")
    inputGreen()
}

mostrarValores()
