
const contact = document.querySelector(".form-contact-class");
const overlay = document.querySelector(".overlay");

function openModal() {
    overlay.style.display = "block";
  }
  
  function closeModal(event) {
    if (event.target === overlay) {
      overlay.style.display = "none";
    }
  }

  overlay.addEventListener("click", (event)=>{
    closeModal(event);
  }) ;

  contact.addEventListener("click", (event) => {
    event.preventDefault();
    openModal();
  });