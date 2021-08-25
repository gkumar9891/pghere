var openEls = document.querySelectorAll("[data-open]");
var closeEls = document.querySelectorAll("[data-close]");
var isVisible = "is-visible";

for (var el of openEls) {
  el.addEventListener("click", function() {
    var modalId = this.dataset.open;
    document.getElementById(modalId).classList.add(isVisible);
  });
}

for (var el of closeEls) {
  el.addEventListener("click", function() {
    this.parentElement.parentElement.parentElement.classList.remove(isVisible);
  });
}

document.addEventListener("click", e => {
  if (e.target == document.querySelector(".modal.is-visible")) {
    document.querySelector(".modal.is-visible").classList.remove(isVisible);
  }
});

document.addEventListener("keyup", e => {
  // if we press the ESC
  if (e.key == "Escape" && document.querySelector(".modal.is-visible")) {
    document.querySelector(".modal.is-visible").classList.remove(isVisible);
  }
});


document.getElementById("add-service").addEventListener("click", () => {
  var input = document.createElement("input"); 
  var att = document.createAttribute("type");
  att.value = "text";  
    input.setAttributeNode(att); 

   document.querySelector(".add-services input[type='text']").after(input);

});