document.getElementById("add-item").addEventListener("click", () =>{

    const produtoSpecs = document.getElementById("produto-specs").cloneNode(true);
    const inputs = produtoSpecs.querySelectorAll("input");
    const selects = produtoSpecs.querySelectorAll("select");

    inputs.forEach(input => input.value = "" );
    selects.forEach(select => select.value = "" )

    document.getElementById("area-produto").appendChild(produtoSpecs);

});


