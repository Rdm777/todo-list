const localStorageKey = 'tasks'

function validarIfTarefaRepetida(){
    let values = JSON.parse(localStorage.getItem(localStorageKey) || "[]")
    let inputValues = document.getElementById("input-add-item").value
    let exists = values.find(x => x.name == inputValues)
    // Se não existe == false, caso contrario == true
    return !exists ? false : true
}

// Verificar se o input tem três ou mais caracteres
function verificarInput() {
    const inputValues = document.getElementById("input-add-item").value;
    const trêsOuMaisCaracteres = inputValues.length >= 3;
    return trêsOuMaisCaracteres;
}

function novaTarefa(){
    let input = document.getElementById("input-add-item")
    input.style.border = ''

    // Validações
    if (!input.value){
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
          Toast.fire({
            icon: "error",
            title: "Insira uma nova Tarefa",
            background: "#7a605b",
            color: "#fff"
        });
        input.style.border = '2px solid red'

    // Analisar se ja tem alguma tarefa com o mesmo nome
    }else if(validarIfTarefaRepetida()){
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
          Toast.fire({
            icon: "error",
            title: "Já existe uma tarefa com este nome",
            background: "#7a605b",
            color: "#fff"
        });
        input.style.border = '2px solid red'

    // Verificar se o input tem menos de três caracteres
    }else if(!verificarInput()){
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
          Toast.fire({
            icon: "error",
            title: "Sua tarefa precisa ter mais de 3 digitos.",
            background: "#7a605b",
            color: "#fff"
        });
        input.style.border = '2px solid red'
    }else{
        // Salvar dados na variavem 'name'
        let values = JSON.parse(localStorage.getItem(localStorageKey) || "[]")
        values.push({
            name: input.value
        })
        // Atualizar o armazenamento local
        localStorage.setItem(localStorageKey, JSON.stringify(values))
        mostrarValores()

        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
          Toast.fire({
            icon: "success",
            title: "Tarefa Adicionada com sucesso.",
            background: "#7a605b",
            color: "#fff"
        });
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
    // Pegar armazenamento Local
    let values = JSON.parse(localStorage.getItem(localStorageKey) || "[]")

    // Pegar dado ("name") que seja igual ao solicitado pela função ("data") e adicionar na variavel "index"
    let index = values.findIndex(x => x.name == data)

    // Excluir valor adicionados acima
    values.splice(index, 1)
     
    // Atualizar armazenamento local
    localStorage.setItem(localStorageKey,JSON.stringify(values))
    mostrarValores()

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });
      Toast.fire({
        icon: "success",
        title: "Tarefa marcada como concluida.",
        background: "#7a605b",
        color: "#fff"
    });
}

mostrarValores()
