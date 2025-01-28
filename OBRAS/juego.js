let score = 0;
let gameStarted = false;  // Variable para verificar si el juego ha comenzado
const bookContainer = document.getElementById('book-container');
const scoreDisplay = document.getElementById('score');
const startButton = document.getElementById('start-button');

// Función para crear y lanzar un libro
function createBook() {
  const book = document.createElement('img');
  book.classList.add('book');
  
  // Si tienes una imagen local en tu proyecto:
  // book.src = 'book_image.png'; 

  // O usa un enlace a una imagen:
  book.src = 'https://image.shutterstock.com/image-vector/book-icon-simple-line-illustration-260nw-1217257415.jpg'; // Cambia este enlace por el que quieras usar

  // Posición aleatoria en X
  book.style.left = `${Math.random() * (bookContainer.offsetWidth - 50)}px`; 

  // Empieza fuera de la pantalla
  book.style.top = '-70px'; 
  bookContainer.appendChild(book);

  // Animación para que el libro caiga hacia abajo
  let fallSpeed = Math.random() * 2 + 3;
  let fallInterval = setInterval(() => {
    let currentTop = parseFloat(book.style.top);
    if (currentTop >= bookContainer.offsetHeight) {
      // Si el libro toca el suelo
      clearInterval(fallInterval);
      book.remove(); // Elimina el libro
    } else {
      book.style.top = currentTop + fallSpeed + 'px';
    }
  }, 20);

  // Evento de clic sobre el libro
  book.addEventListener('click', () => {
    score += 10; // Aumenta puntos por atrapar el libro
    scoreDisplay.textContent = `Puntos: ${score}`;
    book.remove(); // Elimina el libro atrapado
  });
}

// Iniciar el juego al hacer clic en el botón
startButton.addEventListener('click', () => {
  if (!gameStarted) {
    gameStarted = true;
    startButton.style.display = 'none';  // Ocultar el botón después de hacer clic

    // Crear libros cada 1.5 segundos
    setInterval(createBook, 1500);
  }
});



















