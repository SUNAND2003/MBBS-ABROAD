index.php 

<?php
// index.php
// Simple multi-step landing page.
// This is a single-entry PHP file (renders the HTML). All form sending is done by JS (fetch) to backend/save.php
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>MBBS Abroad Journey</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="container">
    <h1>Welcome to MBBS Abroad Journey!</h1>

    <div id="form-wizard" class="wizard">
<!-- Step 1: Choose Country -->
<div class="step active" data-step="1">
    <h2>Choose Your Preferred Country</h2>
    <div class="options grid country-grid" id="country-options">
        <!-- === ALL COUNTRY CARDS (same as before - corrected data-value) === -->
        <button class="country-card option" data-value="Georgia">
            <div class="country-img-wrap"><img src="assets/countries/georgia.png" class="country-big-img"></div>
            <div class="country-info">
                <img src="assets/flags/georgia-flag.webp" class="flag-icon">
                <span class="country-name">Georgia</span>
                <p class="country-subtext">10+ Universities</p>
            </div>
            <div class="tick"></div>
        </button>

        <button class="country-card option" data-value="Russia">
            <div class="country-img-wrap"><img src="assets/countries/russia.png" class="country-big-img"></div>
            <div class="country-info">
                <img src="assets/flags/russia-flag.webp" class="flag-icon">
                <span class="country-name">Russia</span>
                <p class="country-subtext">13+ Universities</p>
            </div>
            <div class="tick"></div>
        </button>

        <button class="country-card option" data-value="Uzbekistan">
            <div class="country-img-wrap"><img src="assets/countries/uzbekistan.png" class="country-big-img"></div>
            <div class="country-info">
                <img src="assets/flags/uzbekistan-flag.webp" class="flag-icon">
                <span class="country-name">Uzbekistan</span>
                <p class="country-subtext">3+ Universities</p>
            </div>
            <div class="tick"></div>
        </button>

        <button class="country-card option" data-value="Egypt">
            <div class="country-img-wrap"><img src="assets/countries/egypt.png" class="country-big-img"></div>
            <div class="country-info">
                <img src="assets/flags/egypt-flag.webp" class="flag-icon">
                <span class="country-name">Egypt</span>
                <p class="country-subtext">6+ Universities</p>
            </div>
            <div class="tick"></div>
        </button>

        <button class="country-card option" data-value="Bulgaria">
            <div class="country-img-wrap"><img src="assets/countries/bulgaria.png" class="country-big-img"></div>
            <div class="country-info">
                <img src="assets/flags/bulgaria-flag.webp" class="flag-icon">
                <span class="country-name">Bulgaria</span>
                <p class="country-subtext">5+ Universities</p>
            </div>
            <div class="tick"></div>
        </button>

        <button class="country-card option" data-value="Armenia">
            <div class="country-img-wrap"><img src="assets/countries/armenia.png" class="country-big-img"></div>
            <div class="country-info">
                <img src="assets/flags/armenia-flag.webp" class="flag-icon">
                <span class="country-name">Armenia</span>
                <p class="country-subtext">1+ University</p>
            </div>
            <div class="tick"></div>
        </button>

        <button class="country-card option" data-value="Hungary">
            <div class="country-img-wrap"><img src="assets/countries/hungary.png" class="country-big-img"></div>
            <div class="country-info">
                <img src="assets/flags/hungary-flag.jpg" class="flag-icon">
                <span class="country-name">Hungary</span>
                <p class="country-subtext">1+ University</p>
            </div>
            <div class="tick"></div>
        </button>

        <button class="country-card option" data-value="Moldova">
            <div class="country-img-wrap"><img src="assets/countries/moldova.png" class="country-big-img"></div>
            <div class="country-info">
                <img src="assets/flags/moldova-flag.webp" class="flag-icon">
                <span class="country-name">Moldova</span>
                <p class="country-subtext">1+ University</p>
            </div>
            <div class="tick"></div>
        </button>

        <button class="country-card option" data-value="Kazakhstan">
            <div class="country-img-wrap"><img src="assets/countries/kazakhstan.png" class="country-big-img"></div>
            <div class="country-info">
                <img src="assets/flags/kazakhstan-flag.webp" class="flag-icon">
                <span class="country-name">Kazakhstan</span>
                <p class="country-subtext">1+ University</p>
            </div>
            <div class="tick"></div>
        </button>

        <button class="country-card option" data-value="Kyrgyzstan">
            <div class="country-img-wrap"><img src="assets/countries/kyrgyzstan.png" class="country-big-img"></div>
            <div class="country-info">
                <img src="assets/flags/kyrgyzstan-flag.webp" class="flag-icon">
                <span class="country-name">Kyrgyzstan</span>
                <p class="country-subtext">3+ Universities</p>
            </div>
            <div class="tick"></div>
        </button>

        <button class="country-card option" data-value="Azerbaijan">
            <div class="country-img-wrap"><img src="assets/countries/azerbaijan.png" class="country-big-img"></div>
            <div class="country-info">
                <img src="assets/flags/azerbaijan-flag.webp" class="flag-icon">
                <span class="country-name">Azerbaijan</span>
                <p class="country-subtext">1+ University</p>
            </div>
            <div class="tick"></div>
        </button>
    </div>

    <!-- THIS WAS MISSING — ADD THIS BACK! -->
    <div class="nav">
        <button class="next-btn">Next</button>
    </div>
</div>

      <!-- Step 2: Intake -->
      <div class="step" data-step="2">
        <h2>Which intake are you planning for?</h2>
        <div class="options" id="intake-options">
          <button class="option" data-value="Mar 26">Mar '26</button>
          <button class="option" data-value="Sep 26">Sep '26</button>
          <button class="option" data-value="Mar 27">Mar '27</button>
          <button class="option" data-value="Sep 27">Sep '27</button>
        </div>
        <div class="nav">
          <button class="prev-btn">Prev</button>
          <button class="next-btn">Next</button>
        </div>
      </div>

      <!-- Step 3: Parent or Student -->
      <div class="step" data-step="3">
        <h2>Are you a parent or student?</h2>
        <div class="options" id="role-options">
          <button class="option" data-value="Parent">I'm a parent</button>
          <button class="option" data-value="Student">I'm a student</button>
        </div>
        <div class="nav">
          <button class="prev-btn">Prev</button>
          <button class="next-btn">Next</button>
        </div>
      </div>

<!-- Step 4: Ask Only Name (Friendly) -->
<div class="step" data-step="4">
    <h2>What name do you prefer to go by?</h2>
    <!-- <p style="color:#555; font-size:16px; margin:20px 0;">We'll use this to personalize your MBBS journey</p> -->
    
    <div class="form-group" style="max-width:400px; margin:0 auto;">
        <input type="text" id="name" placeholder="Enter your name" style="font-size:18px; padding:16px;" />
        <small class="error-msg" id="name-error"></small>
    </div>

    <div class="nav">
        <button class="prev-btn">Prev</button>
        <button class="next-btn">Continue</button>
    </div>
</div>

<!-- Step 4.5: Personalized Message + Phone + City -->
<div class="step" data-step="4.5">
    <h2 id="personalized-greeting">Hi there!</h2>
    <p style="font-size:18px; color:#333; margin:30px 0; line-height:1.6;">
        Share your contact details and our Expert Counsellors will guide you every step of the way!
    </p>

    <div class="form-group">
        <label>Your Phone <span class="required">*</span></label>
        <input type="text" id="phone" placeholder="Enter 10-digit mobile number" maxlength="10" inputmode="numeric" />
        <small class="error-msg" id="phone-error"></small>
    </div>
    
    <div class="form-group">
        <label>Your City <span class="required">*</span></label>
        <input type="text" id="place" placeholder="Enter your city" />
        <small class="error-msg" id="city-error"></small>
    </div>

    <div class="nav">
        <button class="prev-btn">Prev</button>
        <button class="next-btn">Next</button>
    </div>
</div>


      

<!-- UNIVERSAL ANIMATED PRELOADER (used for all buffering steps) -->
<!-- UNIVERSAL FULL-SCREEN CENTERED PRELOADER -->
<div class="step preloader-step" id="preloader">
  <div class="preloader-bg"></div>
  <div class="preloader-overlay"></div>
  <div class="preloader-content-centered">
    <div class="loader-circle">
      <svg class="spinner" width="90" height="90" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
        <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
      </svg>
    </div>
    <h2 id="preloader-title" class="preloader-title">Preparing your journey...</h2>
    <p id="preloader-text" class="preloader-text">Please wait a moment</p>
  </div>
</div>
      
      <!-- Step 7: Education -->
      <div class="step" data-step="7">
        <h2>Great! Let's move to your Education</h2>
        <div class="options" id="education-options">
          <button class="option" data-value="10th">10th</button>
          <button class="option" data-value="11th">11th</button>
          <button class="option" data-value="12th Pursuing">12th Pursuing</button>
          <button class="option" data-value="NEET Preparation">NEET Preparation</button>
        </div>
        <div class="nav">
          <button class="prev-btn">Prev</button>
          <button class="next-btn">Next</button>
        </div>
      </div>

<!-- Step 8: University list (depends on country) -->
<div class="step" data-step="8">
  <h2>Shortlisted Universities</h2>
  <!-- DYNAMIC SUBHEADING ADDED HERE -->
  <p id="university-step-subtitle" style="font-size:18px; color:#333; margin:20px auto; max-width:700px; line-height:1.6; font-weight:500;">
    Explore top medical universities in <strong id="dynamic-country">Georgia</strong> and begin your global medical career
  </p>
  <div id="university-list"></div>

  <!-- ONLY ONE WAY FORWARD: Big counselling button with validation -->
  <div class="nav" style="justify-content:center; margin-top:40px;">
    <button id="go-to-counselling" class="next-btn" 
            style="padding:18px 48px; font-size:16px; font-weight:700; border-radius:14px; background:#e50914; color:white; border:none; box-shadow:0 8px 25px rgba(229,9,20,0.3);">
      View University Details
    </button>
  </div>

  <!-- Only Prev button here — no regular Next button! -->
  <div class="nav" style="margin-top:30px; justify-content:center;">
    <button class="prev-btn" style="background:#f5f5f5; color:#333; padding:12px 32px; font-size:16px;">
      Prev 
    </button>
  </div>
</div>


<!-- NEW Step 8.5: University Details -->
<div class="step" data-step="8.5">
  <h2 id="uni-detail-title">University Details</h2>
  <div id="uni-detail-content" style="max-width:700px; margin:20px auto; text-align:left; font-size:16px; line-height:1.6; color:#333;">
    <!-- Dynamic content: image, name, description -->
  </div>
  <div class="nav">
    <button class="prev-btn">Prev</button>
    <button class="next-btn">Next</button>
  </div>
</div>


      <!-- Step 9: Financing -->
      <div class="step" data-step="9">
        <h2>How would you like to finance your MBBS Abroad Education?</h2>
        <div class="options" id="finance-options">
          <button class="option" data-value="Parents/Self Funded">Parents/Self Funded</button>
          <button class="option" data-value="Parents/Self Funded + Loan">Parents/Self Funded + Loan</button>
          <button class="option" data-value="Full Education Loan">Full Education Loan - Collateral/Non-Collateral</button>
          <button class="option" data-value="Partial Scholarship">Looking for partial scholarship</button>
        </div>
        <div class="nav">
          <button class="prev-btn">Prev</button>
          <button class="next-btn">Next</button>
        </div>
      </div>
    

      <!-- Step 10: Appointment (simple date/time selector) -->
      <div class="step" data-step="10">
        <h2>Schedule an Appointment (30 min)</h2>
        <p style="margin-bottom: 10px;">Meet our professionals and take the next step toward your goals</p>
        <label>Select a date: <input type="date" id="appt-date"></label>
        <label>Select a time:
          <select id="appt-time">
            <option value="">-- choose time --</option>
            <option>10:30 AM</option>
            <option>11:30 AM</option>
            <option>12:30 PM</option>
            <option>02:30 PM</option>
            <option>03:30 PM</option>
            <option>04:30 PM</option>
          </select>
        </label>
        <div class="nav">
          <button class="prev-btn">Prev</button>
          <button class="next-btn" id="submit-btn">Submit</button>
        </div>
      </div>

      <!-- Step 11: Thank You -->
      <div class="step" data-step="11">
        <h2>Thank you for Submitting Details!</h2>
        <p id="thanks-msg">We’ll be in touch shortly with you.</p>
        <div class="nav">
          <button id="restart">Start Again</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // small config used by script.js
    window.APP_CONFIG = {
      saveEndpoint: 'backend/save.php' // PHP endpoint to receive data and forward to Google Sheet
    };
  </script>
  <script src="assets/script.js"></script>
</body>
</html>


script.js 

/* script.js - FINAL 100% WORKING VERSION with animated preloader + original texts */

(function(){
  const steps = Array.from(document.querySelectorAll('.wizard .step'));
  let current = 0;
  const state = {
    country: '', intake: '', role: '', name: '', phone: '', place: '',
    education: '', university: '', finance: '', appt_date: '', appt_time: ''
  };

  // GLOBAL DB - Define once and reuse
  const UNIVERSITY_DB = {
    "Georgia": [
      {name: "Caucasus University", years: "6", tuition: "6000 USD", inr_slab: "English", image: "caucasus-university.webp", description: "Caucasus University, located in Tbilisi, offers a 6-year English-medium MD program recognized by WHO, ECFMG (USA), NMC India, and listed in World Directory of Medical Schools (WDOMS). The American-style curriculum prepares students for USMLE, PLAB, and FMGE with a passing rate above 60% in recent years. Modern simulation labs and affiliated multi-profile hospitals ensure strong clinical exposure from the 3rd year."},
      {name: "Tbilisi State Medical University (American Curriculum)", years: "6", tuition: "13500 USD", inr_slab: "English", image: "caucasus-university.webp", description: "The top-ranked and oldest medical university in Georgia (founded 1918). The 6-year US-modeled MD program is recognized worldwide (WHO, ECFMG, NMC, GMC-UK). Graduates are eligible for USMLE (Step 1 & 2 from 1st year), PLAB, FMGE (highest success rate in Georgia), and direct residency in the USA/Canada/Europe. Over 85% Indian students clear FMGE in first attempt."},
      {name: "Tbilisi State Medical University (European Curriculum)", years: "6", tuition: "8000 USD", inr_slab: "English", image: "caucasus-university.webp", description: "The same prestigious TSMU with a 6-year European-standard English-medium program. Fully compliant with EU directives; graduates can practice across Europe after licensing exams. Recognized by WHO, NMC India, ECFMG, and WDOMS. Excellent preparation for FMGE, PLAB, and European licensing exams."},
      {name: "International Black Sea University", years: "6", tuition: "4500+400 USD", inr_slab: "English", image: "caucasus-university.webp", description: "Offers an American-style 6-year English MD program recognized by WHO, NMC, ECFMG, and WDOMS. Multicultural campus and affordable fees with solid clinical training. Graduates can appear for USMLE, FMGE, and other licensing exams worldwide."},
      {name: "East European University", years: "6", tuition: "3900+400 USD", inr_slab: "English", image: "caucasus-university.webp", description: "One of the most budget-friendly yet quality-focused universities in Georgia. 6-year English-medium MD program recognized by WHO, NMC India, ECFMG, and WDOMS. Large Indian student community and excellent FMGE coaching support."},
      {name: "Tbilisi Medical Academy", years: "6", tuition: "7000 USD", inr_slab: "English", image: "caucasus-university.webp", description: "Founded by renowned physician Petre Shotadze, TMA offers a student-centric 6-year English MD program recognized by WHO, NMC India, ECFMG, and WDOMS. Early clinical exposure from year 2, modern simulation center, and strong FMGE results make it a favorite among Indian students."},
      {name: "University of Georgia", years: "6", tuition: "6500 USD", inr_slab: "English", image: "caucasus-university.webp", description: "One of the largest private universities in Georgia offering a British-style 6-year MD program in English. Recognized by WHO, NMC, ECFMG, GMC (UK), and WDOMS. Graduates are eligible for PLAB, USMLE, FMGE, and practice in India, UK, USA, Australia, and Middle East after respective licensing exams."},
      {name: "European University", years: "6", tuition: "5500 USD", inr_slab: "English", image: "caucasus-university.webp", description: "A rapidly growing institution in Tbilisi with a 6-year English-medium MD program recognized by WHO, NMC India, ECFMG, and WDOMS. Modern campus, affordable fees, and strong clinical rotations in leading hospitals. High FMGE success rate and increasing popularity among Indian students."},
      {name: "Georgian National University SEU", years: "6", tuition: "5900+400 USD", inr_slab: "English", image: "caucasus-university.webp", description: "One of the largest private universities in Georgia with a well-structured 6-year English-medium MD program. Fully recognized by WHO, NMC India, ECFMG, and WDOMS. Strong focus on research and clinical skills; graduates eligible for FMGE, USMLE, and global practice."},
      {name: "Alte University", years: "6", tuition: "5500 USD", inr_slab: "English", image: "caucasus-university.webp", description: "A modern private university offering a high-quality, affordable 6-year English MD program. Recognized by WHO, NMC, ECFMG, and WDOMS. New simulation labs and direct hospital partnerships provide excellent hands-on training. Eligible for FMGE, USMLE, PLAB."}
    ],
    "Uzbekistan": [
      {name: "Tashkent Medical Academy", years: "6", tuition: "3500 USD", inr_slab: "English", image: "caucasus-university.webp", description: "Tashkent Medical Academy (TMA), founded in 1920, is Uzbekistan's oldest government medical university and a top choice for international students pursuing a 6-year English-medium MBBS program. Ranked 13th in Uzbekistan and recognized by WHO, NMC (India), ECFMG, UNESCO, and WDOMS, its degree is valid globally, enabling graduates to sit for FMGE/NExT (India, with high passing rates), USMLE (USA), and PLAB (UK) for practice in India, USA, UK, Australia, and beyond. With modern labs, partnerships like Harvard Medical School, and clinical training in university hospitals, TMA emphasizes practical skills and research, making it ideal for Indian students seeking affordable, high-quality education."},
      {name: "Samarkand State Medical University", years: "6", tuition: "3850 USD", inr_slab: "English", image: "caucasus-university.webp", description: "Established in 1930 and restructured in 2022, Samarkand State Medical University (SamSMU) offers a 6-year English-medium MBBS program compliant with international standards, recognized by WHO, NMC (India), PMDC, and WDOMS. Graduates are eligible for FMGE/NExT (India, with strong success rates), USMLE, PLAB, and practice in India, Gulf countries, and worldwide. Ranked 3rd in Uzbekistan, it features modern labs, simulation-based learning, and clinical rotations in affiliated hospitals treating diverse cases, attracting over 1,000 Indian students annually for its multicultural environment and low-cost, high-exposure training."},
      {name: "Bukhara State Medical Institute", years: "6", tuition: "3200 USD", inr_slab: "English", image: "caucasus-university.webp", description: "Bukhara State Medical Institute (BSMI), founded in 1990 in the historic city of Bukhara, provides a 6-year English-medium MBBS program recognized by WHO, NMC (India), WDOMS, FAIMER, and ECFMG. Degrees are valid for FMGE/NExT (India, ~47% pass rate), USMLE (USA), PLAB (UK), AMC (Australia), and MCCQE (Canada), supporting global practice. With a curriculum aligned to NMC guidelines, modern infrastructure, and clinical exposure in university hospitals, BSMI is popular among Indian students for its holistic approach, research focus, and affordable fees, fostering skills for international medical careers."}
    ],
    "Russia": [
      {name: "Ivanovo State Medical Academy", years: "6", tuition: "285000 RUB", inr_slab: "English", image: "caucasus-university.webp", description: "Ivanovo State Medical Academy (ISMA), established in 1930 near Moscow, delivers a 6-year English-medium MD program recognized by WHO, NMC (India), ECFMG, AMC, GMC (UK), and FAIMER. Graduates qualify for FMGE/NExT (India), USMLE, PLAB, and global practice, with strong preparation via modern labs and hospital rotations. Ranked among Russia's top medical schools, ISMA emphasizes clinical skills from year 2, attracting Indian students for its affordable fees, experienced faculty, and 60%+ FMGE success rate."},
      {name: "Kemerovo State Medical University", years: "6", tuition: "295000 RUB", inr_slab: "English", image: "caucasus-university.webp", description: "Kemerovo State Medical University (KSMU), a leading Siberian institution, offers a 6-year English-medium MD program accredited by WHO, NMC (India), ECFMG, and Russia's Ministry of Health. Degrees enable FMGE/NExT (India), USMLE, PLAB, and worldwide practice, with IELTS/TOEFL for English proficiency. Ranked top 20 in Russia, KSMU provides extensive clinical training in 1,000+ bed hospitals, research focus, and multicultural support, ideal for Indian students seeking quality education in a safe, affordable environment."},
      {name: "Kemerovo State University", years: "6", tuition: "277000 RUB", inr_slab: "English", image: "caucasus-university.webp", description: "Kemerovo State University (KemSU), with a medical faculty since the 1950s, runs a 6-year English-medium MBBS program recognized by WHO, NMC (India), and Russia's Ministry of Education. Graduates are eligible for FMGE/NExT (India), USMLE, PLAB, and international licensure, with a curriculum meeting NMC guidelines. Ranked top 20 in Russia, KemSU excels in practical training via affiliated hospitals, low fees, and Indian student support, preparing over 8,000 alumni for global careers."},
      {name: "Ural State Medical University", years: "6", tuition: "300000 RUB", inr_slab: "English", image: "caucasus-university.webp", description: "Ural State Medical University (USMU), founded in 1930 in Yekaterinburg, provides a 6-year English-medium MD program approved by WHO, NMC (India), ECFMG, and Russia's Ministry of Health. Degrees support FMGE/NExT (23% pass rate in 2021), USMLE, PLAB, and global practice. Ranked 967th worldwide, USMU offers early clinical exposure, modern facilities, and NEET-qualified admissions, making it a preferred choice for Indian students aiming for international residency."},
      {name: "Yaroslavl State Medical University", years: "6", tuition: "350000 RUB", inr_slab: "English", image: "caucasus-university.webp", description: "Yaroslavl State Medical University (YSMU), established in 1944 near Moscow, features a 6-year English-medium MD program recognized by WHO, NMC (India), ECFMG, GMC (UK), and WDOMS. Graduates qualify for FMGE/NExT, USMLE, PLAB, and EU/UK practice without additional hurdles. Ranked highly in Russia, YSMU emphasizes simulation labs and 1,000+ bed hospital rotations, with 500+ faculty supporting Indian students for global licensing success."},
      {name: "Bashkir State Medical University", years: "6", tuition: "399120 RUB", inr_slab: "English", image: "caucasus-university.webp", description: "Bashkir State Medical University (BSMU), founded in 1932 in Ufa, offers a 6-year English-medium MD program accredited by WHO, NMC (India), ECFMG, and Russia's Ministry of Health. Degrees are valid for FMGE/NExT, USMLE, PLAB, and worldwide practice. Ranked 4th in Russia, BSMU provides advanced labs, university hospitals, and scholarships, hosting 8,000+ students including Indians for research-driven, affordable medical training."},
      {name: "North Ossetian State Medical Academy", years: "6", tuition: "310000 RUB", inr_slab: "English", image: "caucasus-university.webp", description: "North Ossetian State Medical Academy (NOSMA), established in 1939 in Vladikavkaz, delivers a 6-year English-medium MD program recognized by WHO, NMC (India), and Russia's Ministry of Health. Graduates are eligible for FMGE/NExT, USMLE, PLAB, and global practice. Ranked top in the Caucasus, NOSMA offers modern infrastructure, 52,000+ students from 101 countries, and clinical training in multi-profile hospitals, ideal for Indian aspirants seeking holistic education."},
      {name: "Far Eastern Federal University", years: "6", tuition: "495000 RUB", inr_slab: "English", image: "caucasus-university.webp", description: "Far Eastern Federal University (FEFU), founded in 1899 in Vladivostok, provides a 6-year English-medium MD program listed in WDOMS and recognized by WHO, NMC (India), and Russia's Ministry of Education. Degrees support FMGE/NExT, USMLE, PLAB, and international careers. Ranked top 5 in Russia, FEFU features state-of-the-art labs, 41,000+ students, and Pacific partnerships, attracting Indians for innovative, affordable medical studies."},
      {name: "Novosibirsk State University", years: "6", tuition: "539500 RUB", inr_slab: "English", image: "caucasus-university.webp", description: "Novosibirsk State University (NSU), established in 1959 in Siberia's science hub, offers a 6-year English-medium MBBS program recognized by WHO, NMC (India), and Russia's Ministry of Education. Graduates qualify for FMGE/NExT, USMLE, PLAB, and global practice. Ranked top 20 worldwide, NSU emphasizes research, clinical rotations in top hospitals, and TOEFL/IELTS admissions, preparing 8,000+ international students for innovative medical roles."},
      {name: "Crimea Federal University", years: "6", tuition: "330000 RUB", inr_slab: "English", image: "caucasus-university.webp", description: "Crimea Federal University (CFU), founded in 1918 in Simferopol, runs a 6-year English-medium MD program recognized by WHO, NMC (India), ECFMG, and Russia's Ministry of Health. Despite 2014 sanctions, ECFMG allows USMLE eligibility since 2016; valid for FMGE/NExT, PLAB, and global practice. Ranked top in Crimea, CFU offers massive clinical exposure in 2,000+ bed hospitals, low fees, and Indian support for international careers."},
      {name: "Lobachevsky State University", years: "6", tuition: "410000 RUB", inr_slab: "English", image: "caucasus-university.webp", description: "Lobachevsky State University (UNN), founded in 1916 in Nizhny Novgorod, provides a 6-year English-medium MD program accredited by WHO, NMC (India), ECFMG, and Russia's Ministry of Science. Degrees enable FMGE/NExT, USMLE, PLAB, and EU practice. Ranked top in Russia, UNN features advanced labs, 40,000+ students, and clinical partnerships, ideal for Indian students seeking research-focused, globally valid medical training."},
      {name: "Omsk State University", years: "6", tuition: "330000 RUB", inr_slab: "English", image: "caucasus-university.webp", description: "Omsk State University (OSMU), established in 1920, offers a 6-year English-medium MD program (first 3 years English, then bilingual) recognized by WHO, NMC (India), and Russia's Ministry of Health. Graduates qualify for FMGE/NExT, USMLE, PLAB, and worldwide practice. Ranked 210th in Russia, OSMU provides 2,000+ bed hospitals for rotations, affordable fees, and Indian mess, preparing students for global licensure."},
      {name: "Tver State Medical University", years: "6", tuition: "430000 RUB", inr_slab: "English", image: "caucasus-university.webp", description: "Tver State Medical University (TSMU), founded in 1902, delivers a 6-year English-medium MD program approved by WHO, NMC (India), ECFMG, FAIMER, and Russia's Ministry of Health. Degrees support FMGE/NExT (19.3% pass rate), USMLE, PLAB, and global practice. Ranked top in Russia, TSMU offers simulation centers, 1,000+ bed hospitals, and NEET admissions, with 24% FMGE success for Indian graduates."}
    ],
    "Egypt": [
      {name: "Cairo University", years: "7", tuition: "8000 USD", inr_slab: "English", image: "caucasus-university.webp", description: "Cairo University, Egypt's oldest (1908), offers a 7-year English-medium MBBS (5 years + 2-year internship) recognized by WHO, NMC (India), ECFMG, and Arab Board. Graduates qualify for FMGE/NExT, USMLE, PLAB, and worldwide practice, with massive clinical exposure in university hospitals serving millions. Ranked top in Egypt, it attracts 800+ Indian students for affordable fees and global validity."},
      {name: "Mansoura University", years: "7", tuition: "8000 USD", inr_slab: "English", image: "caucasus-university.webp", description: "Mansoura University, founded in 1972, provides a 7-year English-medium MBBS (5 years + 2-year internship) via its Mansoura-Manchester Program, recognized by WHO, NMC (India), and ECFMG. Degrees enable FMGE/NExT, USMLE, PLAB, and EU/UK practice. Ranked top 5 in Egypt, it features UK-aligned curriculum, advanced labs, and 900+ faculty, ideal for Indian students seeking high FMGE rates."},
      {name: "Ain Shams University", years: "7", tuition: "8000 USD", inr_slab: "English", image: "caucasus-university.webp", description: "Ain Shams University, established in 1950 in Cairo, runs a 7-year English-medium MBBS (5 years + 2-year internship) recognized by WHO, NMC (India), ECFMG, and Arab Board. Graduates are eligible for FMGE/NExT, USMLE, PLAB, and global practice. Ranked 3rd in Egypt, it offers modern facilities, research centers, and clinical training in top hospitals, with strong Indian student support."},
      {name: "Assiut University", years: "7", tuition: "8000 USD", inr_slab: "English", image: "caucasus-university.webp", description: "Assiut University, founded in 1957, delivers a 7-year English-medium MBBS (5 years + 2-year internship) accredited by WHO, NMC (India), NAQAAE, and WDOMS. Degrees support FMGE/NExT, USMLE, PLAB, and international careers. Ranked top in Upper Egypt, it provides hands-on training in government hospitals and NEET-qualified admissions for Indian students."},
      {name: "Alexandria University", years: "7", tuition: "8000 USD", inr_slab: "English", image: "caucasus-university.webp", description: "Alexandria University, established in 1942, offers a 7-year English-medium MBBS (5 years + 2-year internship) recognized by WHO, NMC (India), ECFMG, and Arab Board. Graduates qualify for FMGE/NExT, USMLE, PLAB, and global practice. Ranked 2nd in Egypt, it features coastal location, advanced labs, and 120,000+ students, attracting Indians for quality education and cultural exposure."},
      {name: "Nahda University", years: "7", tuition: "5000 USD", inr_slab: "English", image: "caucasus-university.webp", description: "Nahda University (NUB), founded in 2006 in Beni Suef, provides a 7-year English-medium MBBS (5 years + 2-year internship) recognized by WHO, NMC (India), and Egypt's Supreme Council. Degrees enable FMGE/NExT, USMLE, PLAB, and worldwide practice. With modern infrastructure, university hospitals, and Indian hostels, NUB is affordable and student-focused for international aspirants."}
    ],
    "Armenia": [
      {name: "University of Traditional Medicine", years: "6", tuition: "4500 USD", inr_slab: "English", image: "caucasus-university.webp", description: "University of Traditional Medicine (UTM), founded in 1991 in Yerevan, offers a 6-year English-medium MD program blending allopathic and traditional medicine, recognized by WHO, NMC (India), and WDOMS. Graduates qualify for FMGE/NExT, USMLE, PLAB, and global practice. With urban campus, research focus, and clinical rotations, UTM supports 1,000+ international students, including Indians, for holistic, affordable training."}
    ],
    "Bulgaria": [
      {name: "Varna Medical University", years: "6", tuition: "10000 Euro", inr_slab: "English", image: "caucasus-university.webp", description: "Varna Medical University (MU-Varna), established in 1961, provides a 6-year English-medium MD program compliant with EU Directive 2005/36/EC, recognized by WHO, NMC (India), ECFMG, GMC (UK), and WDOMS. Degrees allow direct EU/UK practice, plus FMGE/NExT, USMLE; valid worldwide. Ranked top in Bulgaria, it offers 50+ countries' students modern labs and 1,000+ bed hospitals."},
      {name: "Medical University of Plovdiv", years: "6", tuition: "10000 Euro", inr_slab: "English", image: "caucasus-university.webp", description: "Medical University of Plovdiv, founded in 1945, runs a 6-year English-medium MD program recognized by WHO, NMC (India), ECFMG, and EU bodies. Graduates qualify for FMGE/NExT, USMLE, PLAB, and EU practice. Ranked highly in Bulgaria, it features ECTS credits, clinical rotations in 2,000+ bed hospitals, and NEET admissions for 600+ international students."},
      {name: "Medical University of Sofia", years: "6", tuition: "10000 Euro", inr_slab: "English", image: "caucasus-university.webp", description: "Medical University of Sofia, established in 1917, offers a 6-year English-medium MD program accredited by WHO, NMC (India), ECFMG, and Bulgaria's NEAA. Degrees support FMGE/NExT, USMLE, PLAB, and EU/UK practice. Oldest in Bulgaria, it provides Erasmus+ exchanges, advanced facilities, and 4 faculties for global careers."},
      {name: "Pleven State Medical University", years: "6", tuition: "9000 Euro", inr_slab: "English", image: "caucasus-university.webp", description: "Pleven Medical University, founded in 1974, delivers a 6-year English-medium MD program recognized by WHO, NMC (India), ECFMG, and GMC (UK). Graduates are eligible for FMGE/NExT, USMLE, PLAB, and EU practice without extras. Ranked top in Bulgaria, it pioneered English programs, with 1,000+ bed hospitals and 6,000+ alumni worldwide."},
      {name: "Trakia University", years: "6", tuition: "8000 Euro", inr_slab: "English", image: "caucasus-university.webp", description: "Trakia University, established in 1995 in Stara Zagora, provides a 6-year English-medium MD program recognized by WHO, NMC (India), and EU standards. Degrees enable FMGE/NExT, USMLE, PLAB, and global practice. With 600+ medical students, modern clinics, and multicultural support, it's affordable for Indians seeking EU-valid training."}
    ],
    "Hungary": [
      {name: "University of Debrecen", years: "6", tuition: "16900 USD", inr_slab: "English", image: "caucasus-university.webp", description: "University of Debrecen, founded in 1538, offers a 6-year English-medium MD program recognized by WHO, ECFMG, GMC (UK), NMC (India), and WFME (valid to 2030). Graduates qualify for USMLE, PLAB (exempt for UK), FMGE/NExT, and direct EU/USA residency. Ranked 574th globally, it features integrated Kaplan coaching, research labs, and 22 departments for 4,000+ international students."}
    ],
    "Moldova": [
      {name: "Nicolae Testemitanu State University", years: "6", tuition: "6000 Euro", inr_slab: "English", image: "caucasus-university.webp", description: "Nicolae Testemitanu State University, founded in 1945, provides a 6-year English-medium MD program recognized by WHO, NMC (India), ECFMG, and EU countries. Degrees support FMGE/NExT, USMLE, PLAB, and regional practice. Moldova's top medical school, it offers low fees, clinical rotations, and 5 faculties for Indian students seeking Eastern European education."}
    ],
    "Kazakhstan": [
      {name: "Caspian International School of Medicine", years: "6", tuition: "4500 USD", inr_slab: "English", image: "caucasus-university.webp", description: "Caspian International School of Medicine (CISM), established in 1992 in Almaty, offers a 6-year English-medium MBBS program recognized by WHO, NMC (India), and WDOMS. Graduates qualify for FMGE/NExT (27.78% pass rate), USMLE, PLAB, and global practice. Ranked 48th in Kazakhstan, it provides FMGE coaching, modern labs, and 1,000+ Indian students for affordable, practical training."}
    ],
    "Kyrgyzstan": [
      {name: "Jalal-Abad International University", years: "6", tuition: "3200 USD", inr_slab: "English", image: "caucasus-university.webp", description: "Jalal-Abad International University (JAIU), founded in 1993, runs a 6-year English-medium MBBS program recognized by WHO, NMC (India), WDOMS, and FAIMER. Degrees enable FMGE/NExT, USMLE, PLAB, and worldwide practice. With 4,000+ international students, Indian mess, and hospital affiliations, JAIU is budget-friendly for Indians."},
      {name: "Jalal-Abad State University", years: "6", tuition: "4500 USD", inr_slab: "English", image: "caucasus-university.webp", description: "Jalal-Abad State University (JaSU), established in 1993, provides a 6-year English-medium MD program approved by WHO, NMC (India), and WDOMS. Graduates qualify for FMGE/NExT, USMLE, PLAB, and global careers. Ranked top in Kyrgyzstan, JaSU offers low fees, clinical rotations, and 4,300+ Indian students in a safe, multicultural setting."},
      {name: "Osh State Medical University", years: "6", tuition: "4000 USD", inr_slab: "English", image: "caucasus-university.webp", description: "Osh State Medical University (OSMU), founded in 1951, delivers a 6-year English-medium MBBS program recognized by WHO, NMC (India), FAIMER, and ECFMG. Degrees support FMGE/NExT, USMLE, PLAB, and international practice. Ranked top in Kyrgyzstan, OSMU features 20+ faculties, 1,000+ bed hospitals, and FMGE prep for 4,000+ Indian students."}
    ],
    "Azerbaijan": [
      {name: "Azerbaijan Medical University", years: "6", tuition: "6750 USD", inr_slab: "English", image: "caucasus-university.webp", description: "Azerbaijan Medical University (AMU), founded in 1930 in Baku, offers a 6-year English-medium MBBS program recognized by WHO, NMC (India), ECFMG, and global bodies. Graduates qualify for FMGE/NExT, USMLE, PLAB, and practice in 21+ countries. Ranked top in Azerbaijan, AMU hosts 1,200+ internationals from 21 countries, with modern labs and cultural support for Indian students."}
    ]
  };

// Check if already submitted on load
if (localStorage.getItem('mbbs_submitted') === 'true') {
  current = steps.findIndex(s => s.dataset.step === "11");
  showStep(current);

  const saved = localStorage.getItem('mbbs_form_data');
  let name = 'there';
  let country = 'your chosen destination';

  if (saved) {
    try {
      const data = JSON.parse(saved);
      name = data.name?.trim() || name;
      country = data.country || country;
    } catch(e) {}
  }

  document.getElementById('thanks-msg').innerHTML = `
    Thank you <strong>${name}</strong>!<br><br>
    Your details have been received.<br>
    We’ll contact you soon regarding your MBBS in <strong>${country}</strong>.
  `;

  document.getElementById('restart')?.style.setProperty('display', 'none');
  return;
}

  function showStep(idx){
    steps.forEach((s,i) => s.classList.toggle('active', i===idx));
    if(steps[idx].dataset.step === "8") renderUniversities();
    if(steps[idx].dataset.step === "8.5") renderUniversityDetails();
    window.scrollTo({top:0, behavior:'smooth'});
  }

  // REUSABLE ANIMATED PRELOADER (replaces 4.5, 7.5, 7.6, 8.5, 9.5)
  function showPreloader(title, text, delay, nextStepNum, bgClass = 'personalized') {
  document.getElementById('preloader-title').textContent = title;
  document.getElementById('preloader-text').innerHTML = text.replace(/\n/g, '<br>');

  const preloaderStep = document.querySelector('.preloader-step');
  const bgEl = document.querySelector('.preloader-bg');

  // Remove all background classes
  bgEl.classList.remove('personalized', 'universities', 'consultation', 'appointment');
  // Add the desired one
  bgEl.classList.add(bgClass);

  current = steps.indexOf(preloaderStep);
  showStep(current);

  setTimeout(() => {
    current = steps.findIndex(s => s.dataset.step === nextStepNum);
    showStep(current);
  }, 4000);
}

  function nextStep(){
    if(current < steps.length-1){ current++; showStep(current); }
  }

  // PREV BUTTON LOGIC (smart skip old buffer steps)
  function prevStep() {
    const currentStepNum = steps[current].dataset.step;
    const oldBuffers = ["4.5", "7.5", "7.6", "8.5", "9.5"];
    if (currentStepNum === "4.5") {
      current = steps.findIndex(s => s.dataset.step === "4");
      showStep(current);
      return;
    }
    if (oldBuffers.includes(currentStepNum)) {
      if (currentStepNum === "4.5") current = steps.findIndex(s => s.dataset.step === "4");
      else if (["7.5", "7.6"].includes(currentStepNum)) current = steps.findIndex(s => s.dataset.step === "7");
      else if (currentStepNum === "8.5") current = steps.findIndex(s => s.dataset.step === "8");
      else if (currentStepNum === "9.5") current = steps.findIndex(s => s.dataset.step === "9");
      showStep(current);
      return;
    }

    let targetStep;
    if (currentStepNum === "7") targetStep = "4";
    else if (currentStepNum === "8") targetStep = "7";
    else if (currentStepNum === "8.5") targetStep = "8";
    else if (currentStepNum === "9") targetStep = "8.5";
    else if (currentStepNum === "10") targetStep = "9";
    else if (currentStepNum === "11") targetStep = "10";

    if (targetStep) {
      current = steps.findIndex(s => s.dataset.step === targetStep);
      showStep(current);
      return;
    }

    if (current > 0) {
      current--;
      while (current > 0 && oldBuffers.includes(steps[current].dataset.step)) current--;
      showStep(current);
    }
  }

  // NEXT BUTTON HANDLER
  document.querySelectorAll('.next-btn').forEach(btn => btn.addEventListener('click', async (e) => {
    if (btn.id === 'submit-btn') {
      state.appt_date = document.getElementById('appt-date').value || '';
      state.appt_time = document.getElementById('appt-time').value || '';
      await submitData();
      current++;
      showStep(current);
      return;
    }

    const stepNum = steps[current].dataset.step;

    // Basic validation
    if (stepNum === "1" && !state.country) { alert('Please choose a country'); return; }
    if (stepNum === "2" && !state.intake) { alert('Please choose an intake'); return; }
    if (stepNum === "3" && !state.role) { alert('Please choose Parent or Student'); return; }

        // STEP 4 - Only Name (Friendly)
    if (stepNum === "4") {
      document.querySelectorAll('.error-msg').forEach(el => el.textContent = '');
      document.querySelectorAll('#name').forEach(input => input.classList.remove('error'));

      const nameVal = document.getElementById('name').value.trim();

      if (!nameVal) {
        document.getElementById('name-error').textContent = 'Please enter your name';
        document.getElementById('name').classList.add('error');
        return;
      }

      state.name = nameVal;

      // Update personalized greeting in next step
      document.getElementById('personalized-greeting').textContent = `Hi ${nameVal}!`;

      // Go to Step 4.5
      current = steps.findIndex(s => s.dataset.step === "4.5");
      showStep(current);
      return;
    }

    // STEP 4.5 - Phone + City (after name)
    if (stepNum === "4.5") {
      document.querySelectorAll('.error-msg').forEach(el => el.textContent = '');
      document.querySelectorAll('#phone, #place').forEach(input => input.classList.remove('error'));

      const phoneVal = document.getElementById('phone').value.trim();
      const cityVal = document.getElementById('place').value.trim();

      let hasError = false;

      if (!phoneVal) {
        document.getElementById('phone-error').textContent = 'Please enter your phone number';
        document.getElementById('phone').classList.add('error');
        hasError = true;
      } else if (!/^\d{10}$/.test(phoneVal)) {
        document.getElementById('phone-error').textContent = 'Please enter a valid 10-digit phone number';
        document.getElementById('phone').classList.add('error');
        hasError = true;
      }

      if (!cityVal) {
        document.getElementById('city-error').textContent = 'Please enter your city';
        document.getElementById('place').classList.add('error');
        hasError = true;
      }

      if (hasError) return;

      state.phone = phoneVal;
      state.place = cityVal;

      // Now show personalized preloader and go to Education
      showPreloader(
        `${state.name}, our expert counselors are getting things ready for you...`,
        "Please wait...",
        2200,
        "7",
        "personalized"
      );
      return;
    }


    // STEP 7 - Education
    if (stepNum === "7") {
      if (!state.education) { alert('Please select your education status'); return; }

      showPreloader(
  `Shortlisting top universities in ${state.country} just for you…`,
  "Get ready for the exciting experience of studying<br> <strong>MBBS Abroad</strong><br><strong>Here it is!</strong>",
  5000,
  "8",
  "universities"    // bg2.jpg - campus/university vibe
);
      return;
    }

    // STEP 8.5 - University Details (no validation, just proceed)
    if (stepNum === "8.5") {
      nextStep();
      return;
    }

    // STEP 9 - Finance
    if (stepNum === "9") {
      if (!state.finance) { alert('Please choose a financing option'); return; }

      showPreloader(
  "Great!!!",
  "You're almost there! Now just pick a convenient time for your <strong>free 30-min counselling call</strong> with our MBBS Abroad expert.<br>Loading your calendar…",
  4000,
  "10",
  "appointment"     // bg4.jpg - calendar/professional
);
      return;
    }

    nextStep();
  }));

  // GET FREE COUNSELLING BUTTON (Step 8) - Now goes to 8.5 details
  const counsellingBtn = document.getElementById('go-to-counselling');
  if (counsellingBtn) {
    counsellingBtn.addEventListener('click', function () {
      if (!state.university) {
        alert('Please select one university before proceeding');
        return;
      }

      // Direct to step 8.5 without preloader
      current = steps.findIndex(s => s.dataset.step === "8.5");
      showStep(current);
    });
  }

  // Option selection
  function attachOptionGroup(containerSelector, stateKey){
    const container = document.querySelector(containerSelector);
    if(!container) return;
    container.addEventListener('click', function(e){
      const btn = e.target.closest('.option');
      if(!btn) return;
      container.querySelectorAll('.option').forEach(o => o.classList.remove('selected'));
      btn.classList.add('selected');
      state[stateKey] = btn.dataset.value;
    });
  }
  attachOptionGroup('#country-options','country');
  attachOptionGroup('#intake-options','intake');
  attachOptionGroup('#role-options','role');
  attachOptionGroup('#education-options','education');
  attachOptionGroup('#finance-options','finance');

  // University rendering (your full DB - unchanged)
 function renderUniversities(){
    const el = document.getElementById('university-list');
    el.innerHTML = '';
    const country = state.country || 'Georgia';
    // Update dynamic subheading with selected country
document.getElementById('dynamic-country').textContent = country;
    const arr = UNIVERSITY_DB[country] || UNIVERSITY_DB["Georgia"];
    arr.forEach((u)=>{
      const card = document.createElement('div');
      card.className = 'university-card';
      card.innerHTML = `
        <img class="uni-img" src="assets/universities/${u.image || 'placeholder.jpg'}" alt="${u.name}">
        <div class="content">
          <div class="flag-row">
            <img class="flag" src="assets/flags/${country.toLowerCase()}-flag.webp" alt="${country} flag">
            <span class="country-name">${country}</span>
          </div>
          <h3 class="uni-name">${u.name}</h3>
          <div class="uni-details">
            <p><strong>Total Year:</strong> ${u.years}</p>
            <p><strong>Tuition Fee/Year:</strong> ${u.tuition}</p>
            <p><strong>Medium:</strong> ${u.inr_slab}</p>
          </div>
        </div>
        <div class="tick"></div>
      `;
      card.dataset.value = u.name;
      card.addEventListener('click', function(){
        // clear other selection visuals and set selected
        Array.from(el.querySelectorAll('.university-card')).forEach(o=>o.classList.remove('selected'));
        this.classList.add('selected');
        state.university = u.name;
      });
      el.appendChild(card);
    });
  }

  // NEW: Render University Details for Step 8.5
  function renderUniversityDetails() {
    const contentEl = document.getElementById('uni-detail-content');
    const titleEl = document.getElementById('uni-detail-title');
    const uniName = state.university;
    const country = state.country || 'Georgia';

    if (!uniName) {
      contentEl.innerHTML = '<p>Please select a university first.</p>';
      return;
    }

    const uniData = UNIVERSITY_DB[country]?.find(u => u.name === uniName);
    if (!uniData) {
      contentEl.innerHTML = '<p>University details not found.</p>';
      return;
    }

    titleEl.textContent = uniData.name;

    contentEl.innerHTML = `
      <img src="assets/universities/${uniData.image || 'placeholder.jpg'}" alt="${uniData.name}" style="width:100%; max-width:400px; height:250px; object-fit:cover; border-radius:12px; margin-bottom:20px;">
      <p style="white-space:pre-line;">${uniData.description}</p>
    `;
  }

  // Live input sync
  document.getElementById('name')?.addEventListener('input', e => state.name = e.target.value.trim());
  document.getElementById('phone')?.addEventListener('input', e => state.phone = e.target.value.trim());
  document.getElementById('place')?.addEventListener('input', e => state.place = e.target.value.trim());

  // Submit
async function submitData(){
  const payload = Object.assign({}, state);
  payload.submitted_at = new Date().toISOString();
  const submitBtn = document.getElementById('submit-btn');
  const origText = submitBtn.textContent;
  submitBtn.textContent = 'Submitting...'; 
  submitBtn.disabled = true;

  try {
    const res = await fetch(window.APP_CONFIG.saveEndpoint, {
      method:'POST',
      headers:{'Content-Type':'application/json'},
      body: JSON.stringify(payload)
    });
    const j = await res.json();

    // ONLY ON SUCCESS → Save everything + show name
    if (j.success) {
      const userName = state.name && state.name.trim() ? state.name.trim() : 'there';
      const userCountry = state.country || 'your chosen destination';

      document.getElementById('thanks-msg').innerHTML = `
        Thank you <strong>${userName}</strong>!<br><br>
        We’ll be in touch shortly with all the details about your MBBS journey in <strong>${userCountry}</strong>.
      `;

      // ONLY save when success
      localStorage.setItem('mbbs_submitted', 'true');
      localStorage.setItem('mbbs_form_data', JSON.stringify(state));

      submitBtn.textContent = 'Submitted Successfully';
      submitBtn.disabled = true;
    } else {
      alert('Submission failed: ' + (j.message || 'Please try again'));
      submitBtn.textContent = origText;
      submitBtn.disabled = false;
    }

  } catch(err) {
    console.error(err);
    alert('Network error. Please check your connection and try again.');
    submitBtn.textContent = origText;
    submitBtn.disabled = false;
  }
}

  // Restart
  // document.getElementById('restart')?.addEventListener('click', () => location.reload());

  // Prev buttons
  document.querySelectorAll('.prev-btn').forEach(btn => {
    btn.removeEventListener('click', prevStep);
    btn.addEventListener('click', prevStep);
  });

   // NEW: DYNAMIC DATE & TIME SLOT LOGIC (After 6:30 PM → tomorrow only)
  // ==================================================================
  const apptDateInput = document.getElementById('appt-date');
  const apptTimeSelect = document.getElementById('appt-time');

  if (apptDateInput && apptTimeSelect) {
    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);

    const formatDate = (d) => d.toISOString().split('T')[0];

    // Helper: Check if date is Sunday
    function isSunday(dateStr) {
      if (!dateStr) return false;
      const date = new Date(dateStr + 'T00:00:00'); // Normalize to start of day
      return date.getDay() === 0; // 0 = Sunday
    }

    // Set minimum allowed date
    const now = new Date();
    const isAfter630PM = now.getHours() > 18 || (now.getHours() === 18 && now.getMinutes() >= 30);

    let minDate = isAfter630PM ? new Date(tomorrow) : new Date(today);

    // Skip Sundays for min date
    while (isSunday(formatDate(minDate))) {
      const nextDay = new Date(minDate);
      nextDay.setDate(nextDay.getDate() + 1);
      minDate = nextDay;
    }

    apptDateInput.min = formatDate(minDate);

    // Set default value (skip Sunday)
    let defaultDate = new Date(minDate);
    if (isSunday(formatDate(defaultDate))) {
      const nextDay = new Date(defaultDate);
      nextDay.setDate(nextDay.getDate() + 1);
      defaultDate = nextDay;
    }
    apptDateInput.value = formatDate(defaultDate);

    // Optional: Max date (90 days from now)
    const maxDate = new Date();
    maxDate.setDate(maxDate.getDate() + 90);
    apptDateInput.max = formatDate(maxDate);

    // Updated times: Added 04:30 PM, removed 05:30 PM and 06:30 PM
    const allTimes = ['10:30 AM', '11:30 AM', '12:30 PM', '02:30 PM', '03:30 PM', '04:30 PM'];

    function updateAvailableTimes() {
      const selectedDate = apptDateInput.value;
      apptTimeSelect.innerHTML = '<option value="">-- choose time --</option>';

      if (!selectedDate) {
        apptTimeSelect.disabled = true;
        return;
      }

      // Block Sundays
      if (isSunday(selectedDate)) {
        apptDateInput.value = ''; // Clear invalid selection
        alert('Appointments are not available on Sundays. Please select another date.');
        apptTimeSelect.disabled = true;
        return;
      }

      const isToday = formatDate(new Date(selectedDate)) === formatDate(today);

      allTimes.forEach(time => {
        const option = document.createElement('option');
        option.value = time;
        option.textContent = time;

        if (isToday) {
          const [timePart, period] = time.split(' ');
          let [hours, minutes] = timePart.split(':').map(Number);
          if (period === 'PM' && hours !== 12) hours += 12;
          if (period === 'AM' && hours === 12) hours = 0;

          const slotTime = new Date();
          slotTime.setHours(hours, minutes, 0, 0);

          if (slotTime < now) {
            option.disabled = true;
            option.textContent += ' (Not Available)';
          }
        }
        apptTimeSelect.appendChild(option);
      });

      apptTimeSelect.disabled = false;
    }

    // Run on load and when date changes
    updateAvailableTimes();
    apptDateInput.addEventListener('change', updateAvailableTimes);
    window.addEventListener('focus', updateAvailableTimes); // refresh if tab was inactive
  }
  
  // Start
  showStep(current);
})();



style.css 

:root{
  --primary: #e50914; /* Netflix red */
  --dark: #111; /* Jet black */
  --light: #ffffff; /* Pure white */
  --muted: #777; /* Soft grey */
  --border: #e5e5e5;
  --shadow: rgba(0,0,0,0.06);
}
*{
  box-sizing: border-box;
  font-family: "Tahoma", Sans-serif;
}
body{
  background: var(--light);
  margin: 0;
  padding: 20px;
  color: var(--dark);
}
.container{
  max-width: 900px;
  margin: 0 auto;
  background: var(--light);
  padding: 30px;
  border-radius: 14px;
  border: 1px solid var(--border);
  box-shadow: 0 6px 20px var(--shadow);
}
h1{
  color: var(--primary);
  text-align: center;
  font-weight: 700;
  margin-bottom: 25px;
  letter-spacing: -0.5px;
}
.wizard .step{
  display:none;
  padding: 12px;
}
.wizard .step.active{
  text-align: center;
  display:block;
}
h2{
  font-size: 22px;
  font-weight: 600;
  color: var(--dark);
  margin-bottom: 12px;
}
/* Option Buttons */
.options{
  margin: 16px 0;
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
}
.option{
  background: var(--light);
  border: 2px solid var(--border);
  padding: 14px 18px;
  border-radius: 12px;
  cursor: pointer;
  min-width: 180px;
  transition: all .25s ease;
  font-weight: 500;
  color: var(--dark);
  box-shadow: 0 3px 10px var(--shadow);
}
.option:hover{
  border-color: var(--primary);
  transform: translateY(-3px);
  box-shadow: 0 6px 18px rgba(229, 9, 20, 0.18);
}
.option.selected{
  border-color: var(--primary);
  background: var(--primary);
  color: var(--light);
  box-shadow: 0 8px 20px rgba(229, 9, 20, 0.2);
}
/* Grid Layout (Countries) */
.grid{
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 12px;
}
/* Inputs */
input[type="text"],
input[type="tel"],
input[type="date"],
select{
  width: 100%;
  padding: 12px;
  border-radius: 10px;
  border: 1px solid var(--border);
  font-size: 15px;
  margin-top: 12px;
  transition: border .25s ease, box-shadow .25s ease;
}
input:focus,
select:focus{
  border-color: var(--primary);
  box-shadow: 0 0 0 3px rgba(229, 9, 20, 0.15);
  outline: none;
}
/* Navigation Buttons */
.nav{
  display:flex;
  gap:12px;
  justify-content:flex-end;
  margin-top:20px;
}
.nav button{
  padding: 12px 22px;
  font-size: 15px;
  border-radius: 10px;
  border: 0;
  cursor: pointer;
  transition: all .25s ease;
  font-weight: 600;
}
/* Next Button */
.nav .next-btn{
  background: var(--primary);
  color: var(--light);
  box-shadow: 0 4px 12px rgba(229, 9, 20, 0.25);
}
.nav .next-btn:hover{
  background: #c20812;
}
/* Prev Button */
.nav .prev-btn{
  background:#eee;
  color:#333;
}
.nav .prev-btn:hover{
  background:#ddd;
}
/* Submit Special */
#submit-btn{
  background: #e50914;
  color: var(--light);
}
#submit-btn:hover{
  background: #000;
}
/* Restart */
#restart{
  display: none;
  background: var(--light);
  color: var(--primary);
  border: 2px solid var(--primary);
}
#restart:hover{
  background: var(--primary);
  color: var(--light);
}
/* Mobile Adjustments */
@media (max-width:600px){
  .container{padding:18px}
  .option{min-width:130px;font-size:14px}
}
/* Step 1 css */
.country-grid {
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
}
.country-card {
  padding: 0;
  background: #fff;
  border-radius: 18px;
  border: 2px solid transparent;
  overflow: hidden;
  position: relative;
  cursor: pointer;
  transition: all .25s ease;
  box-shadow: 0 5px 14px rgba(0,0,0,0.08);
  display: flex;
  flex-direction: column;
}
.country-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}
.country-card.selected {
  border-color: var(--primary);
  box-shadow: 0 8px 22px rgba(229, 9, 20, 0.25);
}
.country-img-wrap {
  width: 100%;
  height: 120px;
  overflow: hidden;
}
.country-big-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.country-info {
  padding: 12px 14px;
  text-align: left;
}
.flag-icon {
  display: none;
  width: 20px;
  height: 20px;
  object-fit: cover;
  border-radius: 4px;
  margin-right: 6px;
}
.country-name {
  font-size: 16px;
  font-weight: 600;
  color: #222;
}
.country-subtext {
  margin: 4px 0 0;
  font-size: 14px;
  color: #666;
  font-weight: 500;
}
/* Tick icon */
.country-card .tick {
  position: absolute;
  top: 10px;
  right: 10px;
  background: var(--primary);
  width: 22px;
  height: 22px;
  border-radius: 50%;
  display: none;
  justify-content: center;
  align-items: center;
  color: white;
  font-size: 14px;
  font-weight: 700;
}
.country-card.selected .tick {
  display: flex;
}
.country-card.selected .tick::after {
  content: "✓";
}
/* University section - Updated for 2-column grid, responsive */
#university-list {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
  margin: 20px 0;
}
@media (max-width: 768px) {
  #university-list {
    grid-template-columns: 1fr;
    gap: 15px;
  }
}
/* University Cards - Beautiful Box Style */
.university-card {
  background: white;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 6px 20px rgba(0,0,0,0.08);
  transition: all 0.3s ease;
  cursor: pointer;
  border: 2px solid transparent;
  display: flex;
  flex-direction: column;
  position: relative;
}
.university-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 12px 30px rgba(0,0,0,0.15);
}
.university-card.selected {
  border-color: var(--primary);
  box-shadow: 0 12px 30px rgba(229,9,20,0.2);
}
.uni-img {
  width: 100%;
  height: 160px;
  object-fit: cover;
}
.content {
  padding: 16px;
  flex: 1;
  display: flex;
  flex-direction: column;
}
.flag-row {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 10px;
}
.flag {
  width: 28px;
  height: 20px;
  object-fit: cover;
  border-radius: 4px;
}
.country-name {
  font-size: 14px;
  font-weight: 600;
  color: #000;
}
.uni-name {
  text-align: left;
  font-size: 18px;
  font-weight: 700;
  color: var(--dark);
  margin: 0 0 12px 0;
}
.uni-details {
  display: flex;
  flex-direction: column;
  font-size: 14px;
  text-align: left;
}
.detail-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid #f0f0f0;
  padding-bottom: 4px;
}
.detail-row:last-child {
  border-bottom: none;
  padding-bottom: 0;
}
.label {
  color: var(--dark);
  font-weight: 500;
}
.value {
  color: var(--muted);
  text-align: right;
  font-weight: 500;
}
/* Tick for university */
.university-card .tick {
  position: absolute;
  top: 10px;
  right: 10px;
  background: var(--primary);
  width: 22px;
  height: 22px;
  border-radius: 50%;
  display: none;
  justify-content: center;
  align-items: center;
  color: white;
  font-size: 14px;
  font-weight: 700;
}
.university-card.selected .tick {
  display: flex;
}
.university-card.selected .tick::after {
  content: "✓";
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
@keyframes pulse {
  0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(229, 9, 20, 0.7); }
  70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(229, 9, 20, 0); }
  100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(229, 9, 20, 0); }
} 

.required {
  color: #e50914;
  font-weight: bold;
}

.form-group {
  margin-bottom: 20px;
  text-align: left;
}

.form-group label {
  display: block;
  margin-bottom: 8px;
  font-weight: 600;
  color: #333;
}

.form-group input {
  width: 100%;
  padding: 14px;
  border-radius: 12px;
  border: 2px solid #ddd;
  font-size: 16px;
  transition: all 0.3s ease;
}

.form-group input:focus {
  border-color: var(--primary);
  box-shadow: 0 0 0 4px rgba(229, 9, 20, 0.15);
  outline: none;
}

.form-group input.error {
  border-color: #e50914;
  background-color: #fff8f8;
}

.error-msg {
  color: #e50914;
  font-size: 13px;
  margin-top: 6px;
  display: block;
  min-height: 20px;
  font-weight: 500;
}

.uni-details > * {
    margin: 5px 0 !important;  /* or 0 */
}

/* FULL-SCREEN CENTERED PRELOADER - LOOKS PREMIUM */
.preloader-step {
  position: fixed !important;
  top: 0; left: 0; right: 0; bottom: 0;
  z-index: 99999;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(255, 255, 255, 0.97);
  backdrop-filter: blur(8px);
}
.preloader-overlay {
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
  opacity: 0.9;
}
.preloader-content-centered {
  position: relative;
  z-index: 2;
  text-align: center;
  padding: 40px;
  animation: fadeInUp 0.8s ease-out;
}
.loader-circle { 
    width: 110px; 
    height: 110px; 
    margin: 0 auto 40px; 
}
.spinner { 
    animation: spin 1.4s linear infinite; 
}
.path {
  stroke: #f6f6f6;
  stroke-dasharray: 187;
  stroke-dashoffset: 0;
  transform-origin: center;
  animation: dash 1.4s ease-in-out infinite;
}
.preloader-title {
  font-size: 34px;
  font-weight: 700;
  color: #ffffff;
  margin: 0 0 16px 0;
  line-height: 1.3;
}
.preloader-text {
  font-size: 19px;
  color: #ffffff;
  margin: 0 auto;
  line-height: 1.6;
  max-width: 700px;
}

/* Animations */
@keyframes spin { to { transform: rotate(360deg); } }
@keyframes dash {
  0% { stroke-dasharray: 1, 200; stroke-dashoffset: 0; }
  50% { stroke-dasharray: 90, 200; stroke-dashoffset: -35px; }
  100% { stroke-dashoffset: -125px; }
}
@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}

.date-label{
  text-align: left;
}

/* DYNAMIC PRELOADER BACKGROUNDS */
.preloader-bg {
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  opacity: 0.40;
  transition: background-image 0.8s ease-in-out;
  z-index: 1;
}

/* Specific backgrounds */
.preloader-bg.personalized    { background-image: url('../assets/preloaders/preloader-img.jpg'); }
.preloader-bg.universities    { background-image: url('../assets/preloaders/2.webp'); }
.preloader-bg.consultation    { background-image: url('../assets/preloaders/bg2.jpg'); }
.preloader-bg.appointment     { background-image: url('../assets/preloaders/bg-3.jpg'); }

/* Optional: Darker overlay for readability */
.preloader-overlay {
  background: rgb(9, 5, 5); 
  opacity: 5.4;
  backdrop-filter: blur(30px);
}


save.php 

<?php
// save.php
// Receives JSON POST from frontend → saves locally + forwards to Google Sheets
header('Content-Type: application/json');

// === CONFIG: UPDATE THIS WITH YOUR REAL GOOGLE APPS SCRIPT URL ===
$GOOGLE_APPS_SCRIPT_URL = 'https://script.google.com/macros/s/AKfycbxD_CDF4daX1BlUJZ-Bknm0k0DO9VPBJRPpBdGscO05ms-mxL-oWYIDmgfIJ_OU_rSO/exec';
// Replace the above URL if you redeploy the script!

// Read incoming JSON
$inputJSON = file_get_contents('php://input');
if (!$inputJSON) {
    echo json_encode(['success' => false, 'message' => 'No data received']);
    exit;
}

$data = json_decode($inputJSON, true);
if (!$data) {
    echo json_encode(['success' => false, 'message' => 'Invalid JSON']);
    exit;
}

// Simple sanitize function
function s($v) {
    return trim(preg_replace('/[\r\n\t]+/', ' ', strip_tags($v ?? '')));
}

// Build clean record
$record = [
    'submitted_at' => s($data['submitted_at'] ?? date('c')),
    'country'      => s($data['country'] ?? ''),
    'intake'       => s($data['intake'] ?? ''),
    'role'         => s($data['role'] ?? ''),
    'name'         => s($data['name'] ?? ''),
    'phone'        => s($data['phone'] ?? ''),
    'place'        => s($data['place'] ?? ''),
    'education'    => s($data['education'] ?? ''),
    'university'   => s($data['university'] ?? ''),
    'finance'      => s($data['finance'] ?? ''),
    'appt_date'    => s($data['appt_date'] ?? ''),
    'appt_time'    => s($data['appt_time'] ?? '')
];

// 1. Always save to local CSV (backup)
$csvFile = __DIR__ . '/submissions.csv';
$fp = fopen($csvFile, 'a');
if (!file_exists($csvFile) || filesize($csvFile) == 0) {
    fputcsv($fp, array_keys($record)); // Write header if file is new/empty
}
fputcsv($fp, array_values($record));
fclose($fp);

// 2. Forward to Google Apps Script (only if URL looks valid)
if (
    filter_var($GOOGLE_APPS_SCRIPT_URL, FILTER_VALIDATE_URL) &&
    strpos($GOOGLE_APPS_SCRIPT_URL, 'script.google.com') !== false
) {
    $ch = curl_init($GOOGLE_APPS_SCRIPT_URL);
    curl_setopt_array($ch, [
        CURLOPT_POST           => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
        CURLOPT_POSTFIELDS     => json_encode($record),
        CURLOPT_TIMEOUT        => 15,
        CURLOPT_SSL_VERIFYPEER => true
    ]);

    $response = curl_exec($ch);
    $curlError = curl_error($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($curlError || $httpCode >= 400) {
        // Google failed → still success for frontend (CSV saved), but log it
        error_log("Google Sheets forward failed: $curlError | HTTP $httpCode");
        echo json_encode([
            'success' => true,
            'message' => 'Saved locally (Google Sheets temporarily unavailable)'
        ]);
    } else {
        $googleResult = json_decode($response, true);
        if (isset($googleResult['success']) && $googleResult['success']) {
            echo json_encode(['success' => true, 'message' => 'Submitted successfully!']);
        } else {
            echo json_encode(['success' => true, 'message' => 'Saved locally (Google sync issue)']);
        }
    }
} else {
    // Google URL not set or invalid → still accept submission (CSV works!)
    // This is the CRITICAL FIX: we return success=true so the form proceeds and name shows!
    echo json_encode([
        'success' => true,
        'message' => 'Saved locally only (configure Google Apps Script URL for full sync)'
    ]);
}

exit;


Here now only university name, image , description is showing on Step 8.5: University Details, next want to add Total Year, Tuition Fee/Year, Medium of the selected university in that university details section(in a  single horizontal line)

