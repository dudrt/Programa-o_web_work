var confirmar = true

function confirma() {
    if (confirmar) {
        alert('Você está prestes a excluir um produto!')
        document.getElementById("add_submit").innerHTML='<input type="submit" value="Excluir" style="cursor:pointer">'
        confirmar=false
    } else{
        document.getElementById("add_submit").innerHTML=''
        confirmar=true
    }

}