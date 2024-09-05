const mario = document.querySelector('.mario');
const pipe = document.querySelector('.pipe');
const scoreDisplay = document.getElementById('score');
let score = 0;

function jump() {
    console.log("Pulo detectado");  // Depuração

    // Verifica se Mario já está pulando
    if (!mario.classList.contains('jump')) {
        mario.classList.add('jump');

        setTimeout(() => {
            mario.classList.remove('jump');
        }, 500);
    }
}

const loop = setInterval(() => {
    const pipePosition = pipe.offsetLeft;
    const marioPosition = +window.getComputedStyle(mario).bottom.replace('px', '');

    // Verifica colisão
    if (pipePosition <= 120 && pipePosition > 0 && marioPosition < 100) {
        pipe.style.animation = 'none';
        pipe.style.left = `${pipePosition}px`;

        mario.style.animation = 'none';
        mario.style.bottom = `${marioPosition}px`;

        mario.src = './img/game-over.png';
        mario.style.width = '75px';
        mario.style.marginLeft = '50px';
        alert("Seu total de pontos foi " + score);

        clearInterval(loop);
    } else if (pipePosition <= 0) {
        score += 5; // Incrementa de 5 em 5
        scoreDisplay.textContent = score;
    }
}, 10);

// Captura o evento de tecla pressionada
document.addEventListener('keydown', (event) => {
    console.log(`Tecla pressionada: ${event.key}`);  // Depuração
    jump();
});