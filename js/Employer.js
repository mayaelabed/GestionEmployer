// Get the modal
var modal = document.querySelector(".modal");

// Get the button that opens the modal
var openModal = document.querySelector(".open-modal");

// Get the <span> element that closes the modal
var closeModal = document.querySelector(".close-modal");

// When the user clicks the button, open the modal 
openModal.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
closeModal.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
