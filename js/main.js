AOS.init();
function showRegisterWarning() {
  const form = document.querySelector(".register-form");
  if (!form) return;
  
  const inputs = form.querySelectorAll("select[required], input[required]");
  let allFilled = true;

  // Clear existing error messages and invalid classes
  form.querySelectorAll(".error-msg").forEach(msg => msg.remove());
  inputs.forEach(input => input.classList.remove("is-invalid"));

  inputs.forEach(input => {
    if (!input.value || input.value.trim() === "") {
      allFilled = false;
      input.classList.add("is-invalid");
      
      // Inline error message
      const error = document.createElement("p");
      error.className = "error-msg";
      error.innerText = "This field is required";
      error.style.display = "block";
      error.style.color = "#d9534f";
      error.style.fontSize = "12px";
      error.style.marginTop = "4px";
      error.style.marginBottom = "8px";
      error.style.fontWeight = "500";
      input.parentNode.insertBefore(error, input.nextSibling);
    }
  });

  if (!allFilled) return;

  // Check login status
  const isLoggedIn = localStorage.getItem("isLoggedIn") === "true";

  if (isLoggedIn) {
    window.location.href = 'searchprofiles.html';
  } else {
    // Show a polite but clear alert if not registered/logged in
    alert("Please Register First! Sign up or Login to view your matching profiles.");
    window.location.href = 'register.html';
  }
}

// Search From
function openAdvanced() {
  document.getElementById("advancedForm").style.display = "block";
  document.getElementById("userIdForm").style.display = "none";

  document
    .getElementById("advancedForm")
    .scrollIntoView({ behavior: "smooth" });
}

function openUserId() {
  document.getElementById("advancedForm").style.display = "none";
  document.getElementById("userIdForm").style.display = "block";

  document.getElementById("userIdForm").scrollIntoView({ behavior: "smooth" });
}

// about Us page our Story Section

const storySection = document.querySelector(".our-story-heading");

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add("show");
    }
  });
});

if (storySection) {
  observer.observe(storySection);
}

// About Us Page Counter Increse 
const counters = document.querySelectorAll(".counter");
let started = false;

function startCounter(){

counters.forEach(counter => {

let target = +counter.getAttribute("data-target");
let count = 0;

let increment = target / 100;

let updateCounter = () => {

count += increment;

if(count < target){
counter.innerText = Math.floor(count) + "+";
requestAnimationFrame(updateCounter);
}
else{
counter.innerText = target.toLocaleString() + "+";
}

};

updateCounter();

});

}

window.addEventListener("scroll", function(){

let section = document.querySelector(".about-stats-section");
let sectionTop = section.offsetTop - window.innerHeight + 100;

if(window.scrollY > sectionTop && !started){
startCounter();
started = true;
}

});

// Use For Payment Page button click retargert page 

// Enhanced Payment & Plan Rendering
function openPayment(plan, price) {
  const modal = document.getElementById("paymentModal");
  if (!modal) {
      // If modal doesn't exist (e.g. on profile page redirecting to payment.html)
      localStorage.setItem('selectedPlan', plan);
      localStorage.setItem('selectedPrice', price);
      window.location.href = 'payment.html';
      return;
  }

  modal.style.display = "flex";
  document.getElementById("payment-plan-name").innerText = plan;
  document.getElementById("payment-plan-price").innerText = price;
  
  // Highlight "Plan Suggestion" in rendering
  const summaryBox = document.querySelector('.payment-summary-box');
  if (summaryBox) {
      summaryBox.classList.add('highlight-suggestion');
      setTimeout(() => summaryBox.classList.remove('highlight-suggestion'), 1500);
  }
}

const paymentCloseBtn = document.querySelector(".payment-close");
if (paymentCloseBtn) {
  paymentCloseBtn.onclick = function () {
    const modal = document.getElementById("paymentModal");
    if (modal) modal.style.display = "none";
  };
}

// Global modal background click close
window.onclick = function (event) {
  const paymentModal = document.getElementById("paymentModal");
  const profileModal = document.getElementById("fullProfileModal");

  if (event.target == paymentModal) {
    paymentModal.style.display = "none";
  }
  if (event.target == profileModal) {
    closeFullProfile();
  }
};

// -------------------------------------------------------------------------
// GLOBAL NAVIGATION & SESSION MANAGEMENT
// -------------------------------------------------------------------------

/**
 * Updates the navbar based on the user's login status.
 * Replaces the 'Login' button with a Profile dropdown if logged in.
 */
function updateNavbar() {
    const isLoggedIn = localStorage.getItem("isLoggedIn") === "true";
    const navContainer = document.querySelector(".navlinks");
    
    if (!navContainer) return;

    // Identify the Login trigger
    let loginElement = null;
    const targets = navContainer.querySelectorAll("button, a.btn, li a");
    
    targets.forEach(el => {
        if (el.innerText.trim().toLowerCase() === "login") {
            loginElement = el;
        }
    });

    if (isLoggedIn && loginElement) {
        // Construct the Profile Dropdown
        const profileLi = document.createElement("li");
        profileLi.className = "nav-item dropdown profile-dropdown";
        profileLi.innerHTML = `
            <a class="nav-link dropdown-toggle profile-nav-btn" href="javascript:void(0)" id="profileDropdownTrigger" role="button" aria-expanded="false">
                <i class="bi bi-person-circle me-1"></i> Profile
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="profileDropdownTrigger">
                <li>
                    <a class="dropdown-item py-2" href="profile.html">
                        <i class="bi bi-person-fill me-2 text-success"></i> My Profile
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item py-2 text-danger" href="javascript:void(0)" onclick="logoutUser()">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </a>
                </li>
            </ul>
        `;

        // Seamless replacement
        if (loginElement.tagName === "BUTTON") {
            loginElement.replaceWith(profileLi);
        } else if (loginElement.parentElement.tagName === "LI") {
            loginElement.parentElement.replaceWith(profileLi);
        } else {
            loginElement.replaceWith(profileLi);
        }

        // Robust Toggle Logic (Overrides Bootstrap conflicts)
        const trigger = profileLi.querySelector('.dropdown-toggle');
        const menu = profileLi.querySelector('.dropdown-menu');

        if (trigger && menu) {
            trigger.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                
                const isAlreadyOpen = menu.classList.contains('show');
                
                // Close any other open dropdowns globally
                document.querySelectorAll('.dropdown-menu.show').forEach(m => m.classList.remove('show'));

                if (!isAlreadyOpen) {
                    menu.classList.add('show');
                }
            });
        }
    }
}

/**
 * Logs out the user and redirects to home.
 */
function logoutUser() {
    localStorage.removeItem("isLoggedIn");
    window.location.href = 'index.html';
}

// Login Validation
function validateLogin(e) {
    e.preventDefault();
    const loginInput = document.getElementById('loginInput');
    const errorMsg = document.getElementById('loginError');
    const value = loginInput.value.trim();
    
    // Clear errors
    errorMsg.style.display = 'none';
    loginInput.classList.remove('is-invalid');

    // Simple pattern check: if only numbers, assume it's mobile
    const isOnlyNumbers = /^\d+$/.test(value);
    const isEmail = value.includes('@') && value.includes('.');

    if (isOnlyNumbers) {
        if (value.length !== 10) {
            errorMsg.innerText = "Please enter a valid 10-digit mobile number.";
            errorMsg.style.display = 'block';
            loginInput.classList.add('is-invalid');
            return false;
        }
    } else if (!isEmail) {
        errorMsg.innerText = "Please enter a valid email or 10-digit mobile number.";
        errorMsg.style.display = 'block';
        loginInput.classList.add('is-invalid');
        return false;
    }

    // Success
    localStorage.setItem('isLoggedIn', 'true');
    location.href = 'profile.html';
    return false;
}

/**
 * Global click listener to close dropdowns when clicking outside
 */
document.addEventListener('click', function (e) {
    if (!e.target.closest('.profile-dropdown')) {
        document.querySelectorAll('.profile-dropdown .dropdown-menu.show').forEach(m => {
            m.classList.remove('show');
        });
    }
});

// Initialize on both DOMContentLoaded and Window Load for maximum reliability
window.addEventListener('load', updateNavbar);

// -------------------------------------------------------------------------
// SEARCH PROFILES LOGIC
// -------------------------------------------------------------------------
const idSearchBtn = document.getElementById("idSearchBtn");
const searchResultsSection = document.getElementById("searchResultsSection");
const profilesContainer = document.getElementById("profilesContainer");

// Mock Data for Profiles (with full registration details)
const mockProfiles = [
  {
    id: "HM10024",
    name: "Priya Darshini",
    age: 26,
    height: "5'5\"",
    education: "B.Tech IT",
    occupation: "Software Engineer",
    location: "Chennai, Tamil Nadu",
    imgIcon: "bi-person-heart",
    gender: "Female",
    dob: "15-06-1999",
    religion: "Hindu",
    caste: "AdiDravidar",
    motherTongue: "Tamil",
    annualIncome: "5 - 10 Lakhs",
    maritalStatus: "Unmarried",
    about: "I am a cheerful and ambitious person working as a Software Engineer in Chennai. I love reading, travelling, and cooking. Looking for a kind-hearted, well-educated life partner who values family and mutual respect.",
    raasi: "Meesham (Aries)",
    natchathiram: "Ashwini",
    thosam: "No Dosham",
    fatherName: "R. Senthil Kumar",
    fatherOccupation: "Government Employee",
    motherName: "S. Lakshmi",
    motherOccupation: "Homemaker",
    siblings: [
      { relation: "Elder Brother", maritalStatus: "Married" },
      { relation: "Younger Sister", maritalStatus: "Unmarried" }
    ]
  },
  {
    id: "HM10035",
    name: "Karthikeyan",
    age: 29,
    height: "5'10\"",
    education: "MBA",
    occupation: "Bank Manager",
    location: "Coimbatore, Tamil Nadu",
    imgIcon: "bi-person-badge",
    gender: "Male",
    dob: "22-03-1996",
    religion: "Hindu",
    caste: "AdiDravidar",
    motherTongue: "Tamil",
    annualIncome: "5 - 10 Lakhs",
    maritalStatus: "Unmarried",
    about: "I am a disciplined and goal-oriented professional working as a Bank Manager. I enjoy fitness, cricket, and spending quality time with family. Seeking a supportive, understanding, and well-educated partner.",
    raasi: "Rishabam (Taurus)",
    natchathiram: "Rohini",
    thosam: "Sevvai Dosham",
    fatherName: "M. Murugan",
    fatherOccupation: "Retired Teacher",
    motherName: "M. Kavitha",
    motherOccupation: "Homemaker",
    siblings: [
      { relation: "Elder Sister", maritalStatus: "Married" },
      { relation: "Elder Brother", maritalStatus: "Married" }
    ]
  },
  {
    id: "HM10048",
    name: "Shruthi",
    age: 25,
    height: "5'3\"",
    education: "B.Arch",
    occupation: "Architect",
    location: "Madurai, Tamil Nadu",
    imgIcon: "bi-person-arms-up",
    gender: "Female",
    dob: "10-11-2000",
    religion: "Hindu",
    caste: "AdiDravidar",
    motherTongue: "Tamil",
    annualIncome: "3 - 5 Lakhs",
    maritalStatus: "Unmarried",
    about: "Creative and passionate architect with a love for design and art. I enjoy painting, music, and exploring new places. Looking for someone who is caring, understanding, and shares a passion for creativity.",
    raasi: "Kadagam (Cancer)",
    natchathiram: "Poosam",
    thosam: "No Dosham",
    fatherName: "K. Rajan",
    fatherOccupation: "Business",
    motherName: "K. Meena",
    motherOccupation: "Teacher",
    siblings: [
      { relation: "Younger Brother", maritalStatus: "Unmarried" }
    ]
  },
  {
    id: "HM10052",
    name: "Arjun Kumar",
    age: 30,
    height: "6'0\"",
    education: "MCA",
    occupation: "IT Consultant",
    location: "Chennai, Tamil Nadu",
    imgIcon: "bi-person-video2",
    gender: "Male",
    dob: "05-08-1995",
    religion: "Hindu",
    caste: "AdiDravidar",
    motherTongue: "Tamil",
    annualIncome: "10 Lakhs and Above",
    maritalStatus: "Unmarried",
    about: "Experienced IT Consultant with a strong career focus. I value honesty, simplicity, and family bonds. I enjoy playing badminton, watching movies, and travelling. Looking for a homely and well-educated life partner.",
    raasi: "Simmam (Leo)",
    natchathiram: "Magam",
    thosam: "Rahu Dosham",
    fatherName: "P. Kumar",
    fatherOccupation: "Private Employee",
    motherName: "P. Selvi",
    motherOccupation: "Homemaker",
    siblings: [
      { relation: "Elder Sister", maritalStatus: "Married" },
      { relation: "Younger Brother", maritalStatus: "Unmarried" },
      { relation: "Younger Sister", maritalStatus: "Unmarried" }
    ]
  }
];

// Track liked profiles
const likedProfiles = new Set();

function renderProfiles(filters = {}) {
  if (!profilesContainer) return;

  profilesContainer.innerHTML = ""; // Clear existing

  // Filter profiles
  const filteredProfiles = mockProfiles.filter(profile => {
    let match = true;
    if (filters.education && profile.education !== filters.education) match = false;
    if (filters.occupation && profile.occupation !== filters.occupation) match = false;
    if (filters.location && !profile.location.includes(filters.location)) match = false;
    return match;
  });

  if (filteredProfiles.length === 0) {
    profilesContainer.innerHTML = "<div class='col-12 text-center'><p>No profiles found matching your criteria. Please try adjusting your search.</p></div>";
    return;
  }

  filteredProfiles.forEach((profile, index) => {
    // Creating the HTML structure for each card
    const cardHtml = `
      <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="${index * 100}">
        <div class="profile-card">
            <div class="profile-img-container">
                <i class="bi ${profile.imgIcon}"></i>
            </div>
            <div class="profile-info">
                <h3>${profile.name} <i class="bi bi-patch-check-fill text-success ms-1 fs-6"></i></h3>
                <span class="profile-id">ID: ${profile.id}</span>
                
                <ul class="profile-details">
                    <li><i class="bi bi-Person-fill"></i> ${profile.age} Yrs, ${profile.height}</li>
                    <li><i class="bi bi-mortarboard-fill"></i> ${profile.education}</li>
                    <li><i class="bi bi-briefcase-fill"></i> ${profile.occupation}</li>
                    <li><i class="bi bi-geo-alt-fill"></i> ${profile.location}</li>
                </ul>
                
                <button class="profile-action-btn" onclick="openFullProfile('${profile.id}')">View Full Profile</button>
            </div>
        </div>
      </div>
    `;

    profilesContainer.innerHTML += cardHtml;
  });
}

// Open Full Profile Modal
function openFullProfile(profileId) {
  const profile = mockProfiles.find(p => p.id === profileId);
  if (!profile) return;

  const modal = document.getElementById("fullProfileModal");
  const content = document.getElementById("fullProfileContent");

  // Build siblings HTML
  let siblingsHtml = '';
  if (profile.siblings && profile.siblings.length > 0) {
    profile.siblings.forEach((sib, i) => {
      siblingsHtml += `
        <div class="fp-field">
          <span class="fp-label">Sibling ${i + 1}</span>
          <span class="fp-value">${sib.relation} — ${sib.maritalStatus}</span>
        </div>
      `;
    });
  } else {
    siblingsHtml = `
      <div class="fp-field">
        <span class="fp-label">Siblings</span>
        <span class="fp-value">No Siblings</span>
      </div>
    `;
  }

  const isLiked = likedProfiles.has(profileId);

  content.innerHTML = `
    <!-- Profile Header -->
    <div class="fp-header">
      <div class="fp-avatar">
        <i class="bi ${profile.imgIcon}"></i>
      </div>
      <div class="fp-header-info">
        <h2>${profile.name} <i class="bi bi-patch-check-fill text-success fs-5"></i></h2>
        <span class="fp-id">Profile ID: ${profile.id}</span>
        <span class="fp-badge">${profile.maritalStatus}</span>
      </div>
    </div>

    <!-- About Section -->
    <div class="fp-section">
      <h4><i class="bi bi-chat-quote-fill"></i> About Me</h4>
      <p class="fp-about-text">${profile.about}</p>
    </div>

    <!-- Personal Details -->
    <div class="fp-section">
      <h4><i class="bi bi-person-fill"></i> Personal Details</h4>
      <div class="fp-grid">
        <div class="fp-field">
          <span class="fp-label">Full Name</span>
          <span class="fp-value">${profile.name}</span>
        </div>
        <div class="fp-field">
          <span class="fp-label">Gender</span>
          <span class="fp-value">${profile.gender}</span>
        </div>
        <div class="fp-field">
          <span class="fp-label">Date of Birth</span>
          <span class="fp-value">${profile.dob}</span>
        </div>
        <div class="fp-field">
          <span class="fp-label">Age</span>
          <span class="fp-value">${profile.age} Years</span>
        </div>
        <div class="fp-field">
          <span class="fp-label">Height</span>
          <span class="fp-value">${profile.height}</span>
        </div>
        <div class="fp-field">
          <span class="fp-label">Marital Status</span>
          <span class="fp-value">${profile.maritalStatus}</span>
        </div>
        <div class="fp-field">
          <span class="fp-label">Mother Tongue</span>
          <span class="fp-value">${profile.motherTongue}</span>
        </div>
        <div class="fp-field">
          <span class="fp-label">Location</span>
          <span class="fp-value">${profile.location}</span>
        </div>
      </div>
    </div>

    <!-- Religion & Community -->
    <div class="fp-section">
      <h4><i class="bi bi-flower1"></i> Religion & Community</h4>
      <div class="fp-grid">
        <div class="fp-field">
          <span class="fp-label">Religion</span>
          <span class="fp-value">${profile.religion}</span>
        </div>
        <div class="fp-field">
          <span class="fp-label">Caste</span>
          <span class="fp-value">${profile.caste}</span>
        </div>
      </div>
    </div>

    <!-- Horoscope Details -->
    <div class="fp-section">
      <h4><i class="bi bi-stars"></i> Horoscope Details</h4>
      <div class="fp-grid">
        <div class="fp-field">
          <span class="fp-label">Raasi</span>
          <span class="fp-value">${profile.raasi}</span>
        </div>
        <div class="fp-field">
          <span class="fp-label">Natchathiram</span>
          <span class="fp-value">${profile.natchathiram}</span>
        </div>
        <div class="fp-field">
          <span class="fp-label">Thosam</span>
          <span class="fp-value">${profile.thosam}</span>
        </div>
      </div>
    </div>

    <!-- Education & Career -->
    <div class="fp-section">
      <h4><i class="bi bi-mortarboard-fill"></i> Education & Career</h4>
      <div class="fp-grid">
        <div class="fp-field">
          <span class="fp-label">Highest Education</span>
          <span class="fp-value">${profile.education}</span>
        </div>
        <div class="fp-field">
          <span class="fp-label">Occupation</span>
          <span class="fp-value">${profile.occupation}</span>
        </div>
        <div class="fp-field">
          <span class="fp-label">Annual Income</span>
          <span class="fp-value">${profile.annualIncome}</span>
        </div>
      </div>
    </div>

    <!-- Family Details -->
    <div class="fp-section">
      <h4><i class="bi bi-people-fill"></i> Family Details</h4>
      <div class="fp-grid">
        <div class="fp-field">
          <span class="fp-label">Father's Name</span>
          <span class="fp-value">${profile.fatherName}</span>
        </div>
        <div class="fp-field">
          <span class="fp-label">Father's Occupation</span>
          <span class="fp-value">${profile.fatherOccupation}</span>
        </div>
        <div class="fp-field">
          <span class="fp-label">Mother's Name</span>
          <span class="fp-value">${profile.motherName}</span>
        </div>
        <div class="fp-field">
          <span class="fp-label">Mother's Occupation</span>
          <span class="fp-value">${profile.motherOccupation}</span>
        </div>
        <div class="fp-field">
          <span class="fp-label">No. of Siblings</span>
          <span class="fp-value">${profile.siblings.length} ${profile.siblings.length === 1 ? 'Sibling' : 'Siblings'}</span>
        </div>
      </div>
    </div>

    <!-- Siblings Details -->
    <div class="fp-section">
      <h4><i class="bi bi-person-lines-fill"></i> Siblings Details</h4>
      <div class="fp-grid">
        ${siblingsHtml}
      </div>
    </div>

    <!-- Like Button -->
    <div class="fp-like-section">
      <button class="fp-like-btn ${isLiked ? 'fp-liked' : ''}" id="fpLikeBtn" onclick="toggleLikeProfile('${profile.id}')">
        <i class="bi ${isLiked ? 'bi-heart-fill' : 'bi-heart'}"></i>
        <span>${isLiked ? 'Liked' : 'Like This Profile'}</span>
      </button>
    </div>
  `;

  modal.style.display = "flex";
  document.body.style.overflow = "hidden";
}

// Close Full Profile Modal
function closeFullProfile() {
  const modal = document.getElementById("fullProfileModal");
  modal.style.display = "none";
  document.body.style.overflow = "auto";
}

// Toggle Like Profile
function toggleLikeProfile(profileId) {
  const btn = document.getElementById("fpLikeBtn");
  if (likedProfiles.has(profileId)) {
    likedProfiles.delete(profileId);
    btn.classList.remove("fp-liked");
    btn.innerHTML = '<i class="bi bi-heart"></i> <span>Like This Profile</span>';
  } else {
    likedProfiles.add(profileId);
    btn.classList.add("fp-liked");
    btn.innerHTML = '<i class="bi bi-heart-fill"></i> <span>Liked</span>';
  }
}

// Search & Interest rendering
function handleSearchClick(e) {
  e.preventDefault();
  
  if (searchResultsSection) {
    const filters = {};
    const eduSelect = document.getElementById("searchEducation");
    const occSelect = document.getElementById("searchOccupation");
    const locInput = document.getElementById("searchCityInput"); // Updated to Input

    if (eduSelect && eduSelect.value) filters.education = eduSelect.value;
    if (occSelect && occSelect.value) filters.occupation = occSelect.value;
    if (locInput && locInput.value) filters.location = locInput.value;

    const advancedForm = document.getElementById("advancedForm");
    const userIdForm = document.getElementById("userIdForm");
    if (advancedForm) advancedForm.style.display = "none";
    if (userIdForm) userIdForm.style.display = "none";
    
    searchResultsSection.style.display = "block";
    renderProfiles(filters);
    searchResultsSection.scrollIntoView({ behavior: "smooth", block: "start" });
  }
}

if (advancedSearchBtn) {
  advancedSearchBtn.addEventListener("click", handleSearchClick);
}

if (idSearchBtn) {
  idSearchBtn.addEventListener("click", handleSearchClick);
}
// City Autocomplete Logic
const internalCities = ['Chennai', 'Coimbatore', 'Madurai', 'Tiruchirappalli', 'Salem', 'Tirunelveli', 'Tiruppur', 'Erode', 'Vellore', 'Thoothukudi', 'Nagercoil', 'Thanjavur', 'Dindigul', 'Hosur', 'Sivakasi', 'Kanchipuram', 'Karur', 'Ooty', 'Karaikudi', 'Kumbakonam', 'Pollachi', 'Rajapalayam', 'Pudukkottai', 'Nagapattinam', 'Cuddalore', 'Tiruvannamalai', 'Kovilpatti', 'Ambur', 'Theni', 'Udhagamandalam', 'Viluppuram', 'Paramakudi', 'Sankarankovil', 'Tenkasi', 'Palani', 'Ariyalur', 'Chengalpattu', 'Dharmapuri', 'Krishnagiri', 'Namakkal', 'Perambalur', 'Ramanathapuram', 'Sivagangai', 'Thiruvallur', 'Thiruvarur', 'Tirupathur', 'Trichy', 'Mayiladuthurai', 'Ranipet'];

function initCityAutocomplete(inputId, suggestionId) {
    const input = document.getElementById(inputId);
    const suggestionBox = document.getElementById(suggestionId);
    if (!input || !suggestionBox) return;

    input.addEventListener('input', function() {
        const value = this.value.toLowerCase();
        suggestionBox.innerHTML = '';
        if (!value) { suggestionBox.style.display = 'none'; return; }

        const filtered = internalCities.filter(city => city.toLowerCase().startsWith(value)).slice(0, 10);
        if (filtered.length > 0) {
            filtered.forEach(city => {
                const div = document.createElement('div');
                div.className = 'autocomplete-suggestion';
                div.innerText = city;
                div.onclick = function() {
                    input.value = city;
                    suggestionBox.style.display = 'none';
                    // Trigger custom event for rendering updates if needed
                    input.dispatchEvent(new Event('change'));
                };
                suggestionBox.appendChild(div);
            });
            suggestionBox.style.display = 'block';
        } else { suggestionBox.style.display = 'none'; }
    });

    document.addEventListener('click', function(e) {
        if (e.target !== input && e.target !== suggestionBox) suggestionBox.style.display = 'none';
    });
}

// Login Validation
function validateLogin(e) {
    e.preventDefault();
    const loginInput = document.getElementById('loginInput');
    const errorMsg = document.getElementById('loginError');
    const value = loginInput.value.trim();
    
    // Clear errors
    errorMsg.style.display = 'none';
    loginInput.classList.remove('is-invalid');

    // Simple pattern check: if only numbers, assume it's mobile
    const isOnlyNumbers = /^\d+$/.test(value);
    const isEmail = value.includes('@') && value.includes('.');

    if (isOnlyNumbers) {
        if (value.length !== 10) {
            errorMsg.innerText = "Please enter a valid 10-digit mobile number.";
            errorMsg.style.display = 'block';
            loginInput.classList.add('is-invalid');
            return false;
        }
    } else if (!isEmail) {
        errorMsg.innerText = "Please enter a valid email or 10-digit mobile number.";
        errorMsg.style.display = 'block';
        loginInput.classList.add('is-invalid');
        return false;
    }

    // Success
    localStorage.setItem('isLoggedIn', 'true');
    location.href = 'profile.html';
    return false;
}

// Enhanced Payment & Plan Rendering
function openPayment(plan, price) {
  const modal = document.getElementById("paymentModal");
  if (!modal) {
      // If modal doesn't exist (e.g. on profile page redirecting to payment.html)
      localStorage.setItem('selectedPlan', plan);
      localStorage.setItem('selectedPrice', price);
      window.location.href = 'payment.html';
      return;
  }

  modal.style.display = "flex";
  document.getElementById("payment-plan-name").innerText = plan;
  document.getElementById("payment-plan-price").innerText = price;
}

document.addEventListener('DOMContentLoaded', function() {
    // Nav & General
    updateNavbar();
    
    // Autocompletes
    initCityAutocomplete('cityInput', 'citySuggestions');
    initCityAutocomplete('registerCityInput', 'registerCitySuggestions');
    initCityAutocomplete('profileCityInput', 'profileCitySuggestions');
    initCityAutocomplete('searchCityInput', 'searchCitySuggestions');

    // Payment auto-fill from localStorage if on payment.html
    if (window.location.pathname.includes('payment.html')) {
        const plan = localStorage.getItem('selectedPlan');
        const price = localStorage.getItem('selectedPrice');
        if (plan && price) {
            // Wait a moment for UI or just open
            setTimeout(() => openPayment(plan, price), 500);
            localStorage.removeItem('selectedPlan');
            localStorage.removeItem('selectedPrice');
        }
    }
});
