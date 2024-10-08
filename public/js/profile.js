// Get elements
const editModal = document.getElementById("editModal");
const previewImage = document.getElementById("previewImage");
const closeModal = document.querySelector(".close");
const profileImageInput = document.getElementById("profileImage");
const form = document.getElementById("editForm");

// Function to open modal
function openModal() {
    editModal.style.display = "block";
}

// Function to close modal
function closeModalHandler() {
    editModal.style.display = "none";
}

// Function to handle window click
function windowClickHandler(event) {
    if (event.target === editModal) {
        editModal.style.display = "none";
    }
}

// Function to preview profile image
function previewProfileImage() {
    const file = profileImageInput.files[0];
    const reader = new FileReader();
    reader.onload = function(event) {
        previewImage.src = event.target.result;
    };
    reader.readAsDataURL(file);
}

// Function to validate form
function validateForm(event) {
    const contactValue = parseInt(document.getElementById('contact').value);
    const nameValue = document.getElementById('name').value.trim();
    const addressValue = document.getElementById('address').value.trim();
    const genderValue = document.getElementById('gender').value;


    const errors = [];

    if (contactValue < 0) {
        errors.push("Please check your number");
    }

    if (nameValue === '') {
        errors.push("Please enter your name");
    }

    if (addressValue === '') {
        errors.push("Please enter your address");
    }

    if (genderValue === '') {
        errors.push("Please select your gender");
    }

  

    if (errors.length > 0) {
        alert(errors.join("\n"));
        event.preventDefault();
        return false;
    }
}

// Add event listeners
closeModal.addEventListener("click", closeModalHandler);
window.addEventListener("click", windowClickHandler);
profileImageInput.addEventListener("change", previewProfileImage);
form.addEventListener("submit", validateForm);