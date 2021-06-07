function delCliente(id, name){
    var resp = confirm(`Deseja colocar o cliente "${name}" como inativo?`);

    // se for true
    if(resp){
        window.location.href = `./apagar-cliente.php?id=${id}`
    }
}