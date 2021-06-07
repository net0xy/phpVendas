function delVenda(id){
    var resp = confirm(`Deseja apagar a venda de id "${id}"?`);

    // se for true
    if(resp){
        window.location.href = `./apagar-venda.php?id=${id}`
    }
}