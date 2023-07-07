
const contact = document.querySelector(".form-contact-class");
const overlay = document.querySelector(".overlay");

const links = document.querySelectorAll("nav li");
const linksA = document.querySelectorAll("nav li a");

// nav

const nav = document.querySelector("nav");


icons.addEventListener("click", () => {
  nav.classList.toggle("active");
 
});

links.forEach((link) => {
  link.addEventListener("click", () => {
    nav.classList.remove("active");
  });
});



// modal
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

  