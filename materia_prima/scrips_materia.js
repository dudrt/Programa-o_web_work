var confirmar = true

function confirma() {
    if (confirmar) {
        alert('Você está prestes a excluir um produto!')
        document.getElementById("add_submit").innerHTML='<input type="submit" value="Excluir" class="back"'
        confirmar=false
    } else{
        document.getElementById("add_submit").innerHTML=''
        confirmar=true
    }

}