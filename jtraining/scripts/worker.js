var input;
self.onmessage = function(e) {
    input = e.data[1];
    console.log("input = " + input);
    var code = e.data[0];
    try {
        var result = eval(code);
        postMessage(result);
    } catch (error) {
        postMessage({ error: error.message });
    }
};

function getInput() {
    return input;
}

/* TO DO LIST
- Salvataggio sandbox?
- Cicli? SetTimeout?
- Account Page? */