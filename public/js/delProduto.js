function delProduto(id, name){
    var resp = confirm(`Deseja colocar o produto "${name}" como inativo?`);

    // se for true
    if(resp){
        window.location.href = `./apagar-produto.php?id=${id}`
    }
}