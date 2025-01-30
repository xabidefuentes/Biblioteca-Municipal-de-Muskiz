let jugador = {
    x: 50,
    y: 50,
    velocidad:7
};

let objetivo = {
    x: Math.floor(Math.random() * 380) + 10,
    y: Math.floor(Math.random() * 380) + 10,
    tamaño: 20,
    velocidadX: 2,
    velocidadY: 2
};

let puntuacion = 0;

document.addEventListener("DOMContentLoaded", () => {
    let canvas = document.createElement("canvas");
    canvas.width = 400;
    canvas.height = 400;
    canvas.style.position = 'absolute';
    canvas.style.left = '37.5%';
    canvas.style.top = '125%';
    canvas.style.border = '5px solid black';
    document.body.appendChild(canvas);
    let ctx = canvas.getContext("2d");
    
    function dibujarJugador() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.strokeRect(0, 0, canvas.width, canvas.height);
        ctx.fillStyle = "blue";
        ctx.fillRect(jugador.x, jugador.y, 20, 20);
        ctx.fillStyle = "red";
        ctx.fillRect(objetivo.x, objetivo.y, objetivo.tamaño, objetivo.tamaño);
        ctx.fillStyle = "black";
        ctx.font = "20px Fuente";
        ctx.fillText(`Puntuación: ${puntuacion}`, 10, 20);
    }
    
    function moverJugador(event) {
        event.preventDefault(); // Evita el desplazamiento de la página con las flechas
        switch (event.key) {
            case "ArrowUp":
                if (jugador.y > 0) jugador.y -= jugador.velocidad;
                break;
            case "ArrowDown":
                if (jugador.y < canvas.height - 20) jugador.y += jugador.velocidad;
                break;
            case "ArrowLeft":
                if (jugador.x > 0) jugador.x -= jugador.velocidad;
                break;
            case "ArrowRight":
                if (jugador.x < canvas.width - 20) jugador.x += jugador.velocidad;
                break;
        }
        verificarColision();
        dibujarJugador();
    }

    function moverObjetivo() {
        objetivo.x += objetivo.velocidadX;
        objetivo.y += objetivo.velocidadY;
        
        if (objetivo.x <= 0 || objetivo.x >= canvas.width - objetivo.tamaño) {
            objetivo.velocidadX *= -1;
        }
        if (objetivo.y <= 0 || objetivo.y >= canvas.height - objetivo.tamaño) {
            objetivo.velocidadY *= -1;
        }
    }

    function verificarColision() {
        if (
            jugador.x < objetivo.x + objetivo.tamaño &&
            jugador.x + 20 > objetivo.x &&
            jugador.y < objetivo.y + objetivo.tamaño &&
            jugador.y + 20 > objetivo.y
        ) {
            puntuacion++;
            objetivo.x = Math.floor(Math.random() * 380) + 10;
            objetivo.y = Math.floor(Math.random() * 380) + 10;
        }
    }
    
    document.addEventListener("keydown", moverJugador);
    window.addEventListener("keydown", (event) => {
        if (["ArrowUp", "ArrowDown", "ArrowLeft", "ArrowRight"].includes(event.key)) {
            event.preventDefault();
        }
    });
    
    setInterval(() => {
        moverObjetivo();
        dibujarJugador();
    }, 50);
    
    dibujarJugador();
});
