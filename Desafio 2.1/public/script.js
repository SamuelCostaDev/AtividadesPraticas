function convertNumber() {
    const number = document.getElementById('number').value;

    if (number.trim() === '') {
        alert('Por favor, insira um número.');
        return;
    }

    fetch('./api/converter.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ number: number })
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            document.getElementById('result').innerHTML = `<span style="color:red;">${data.error}</span>`;
        } else {
            document.getElementById('result').innerHTML = `<span>Resultado: ${data.result}</span>`;
        }
    })
    .catch(error => {
        console.error('Erro:', error);
        document.getElementById('result').innerHTML = `<span style="color:red;">Erro ao se comunicar com o servidor ou dados inválidos.</span>`;
    });
    
}