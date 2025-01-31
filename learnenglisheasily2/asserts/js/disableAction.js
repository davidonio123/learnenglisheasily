
//raggira completamente il contextmenu tramite tasto destro
document.addEventListener('contextmenu', (event) => {
    event.preventDefault();
  });

//elimina qualsiasi shortcut per accedere alle varie azioni del browser
  document.addEventListener('keydown', (event) => {
  const key = event.key.toLowerCase();

  if (
    key === 'f12' || 
    (event.ctrlKey && event.shiftKey && ['i', 'c', 'j', 's'].includes(key)) ||
    (event.ctrlKey && ['u', 'p'].includes(key)) 
  ) {
    event.preventDefault();
  }
});