let tabuleiro = [
    ['', '', ''],
    ['', '', ''],
    ['', '', '']
];

let jogador = 'X';
let fimJogo = false;

function mostrarTabuleiro() {
    for (let i = 0; i < 3; i++) {
        for (let j = 0; j < 3; j++) {
            document.getElementsByClassName('quadrados')[i * 3 + j].innerText = tabuleiro[i][j];
        }
    }
}

function CheckVencedor() {
    for (let i = 0; i < 3; i++) {
        if (tabuleiro[i][0] !== '' && tabuleiro[i][0] === tabuleiro[i][1] && tabuleiro[i][0] === tabuleiro[i][2]) {
            return true;
        }
    }

    for (let i = 0; i < 3; i++) {
        if (tabuleiro[0][i] !== '' && tabuleiro[0][i] === tabuleiro[1][i] && tabuleiro[0][i] === tabuleiro[2][i]) {
            return true;
        }
    }

    if (tabuleiro[0][0] !== '' && tabuleiro[0][0] === tabuleiro[1][1] && tabuleiro[0][0] === tabuleiro[2][2]) {
        return true;
    }
    if (tabuleiro[0][2] !== '' && tabuleiro[0][2] === tabuleiro[1][1] && tabuleiro[0][2] === tabuleiro[2][0]) {
        return true;
    }

    return false;
}

function play(linha, col) {
    if (!fimJogo && tabuleiro[linha][col] === '') {
        tabuleiro[linha][col] = jogador;
        mostrarTabuleiro();
        if (CheckVencedor()) {
            document.getElementById('status').innerText = 'Parabéns! O jogador ' + jogador + ' venceu!';
            fimJogo = true;
            return;
        }
        jogador = jogador === 'X' ? 'O' : 'X';
    } else if (!fimJogo) {
        document.getElementById('status').innerText = 'Posição ocupada. Tente novamente.';
    }
}