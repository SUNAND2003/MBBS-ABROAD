(function(){
  const steps = Array.from(document.querySelectorAll('.wizard .step'));
  let current = 0;
  const state = {
    country: '', intake: '', role: '', name: '', phone: '', place: '',
    education: '', university: '', finance: '', appt_date: '', appt_time: ''
  };

  // UNIVERSITY DATABASE
  const UNIVERSITY_DB = {
    "Georgia": [
      {name: "Caucasus University", years: "6", tuition: "6000 USD", inr_slab: "English", image: "caucasus.webp", description: "Caucasus University, located in Tbilisi, offers a 6-year English-medium MD program recognized by WHO, ECFMG (USA), NMC India, and listed in World Directory of Medical Schools (WDOMS). The American-style curriculum prepares students for USMLE, PLAB, and FMGE with a passing rate above 60% in recent years. Modern simulation labs and affiliated multi-profile hospitals ensure strong clinical exposure from the 3rd year."},
      {name: "Tbilisi State Medical University (American Curriculum)", years: "6", tuition: "13500 USD", inr_slab: "English", image: "tbilisi.webp", description: "The top-ranked and oldest medical university in Georgia (founded 1918). The 6-year US-modeled MD program is recognized worldwide (WHO, ECFMG, NMC, GMC-UK). Graduates are eligible for USMLE (Step 1 & 2 from 1st year), PLAB, FMGE (highest success rate in Georgia), and direct residency in the USA/Canada/Europe. Over 85% Indian students clear FMGE in first attempt."},
      {name: "Tbilisi State Medical University (European Curriculum)", years: "6", tuition: "8000 USD", inr_slab: "English", image: "tbilisi-state.webp", description: "The same prestigious TSMU with a 6-year European-standard English-medium program. Fully compliant with EU directives; graduates can practice across Europe after licensing exams. Recognized by WHO, NMC India, ECFMG, and WDOMS. Excellent preparation for FMGE, PLAB, and European licensing exams."},
      {name: "International Black Sea University", years: "6", tuition: "4500+400 USD", inr_slab: "English", image: "black-sea.webp", description: "Offers an American-style 6-year English MD program recognized by WHO, NMC, ECFMG, and WDOMS. Multicultural campus and affordable fees with solid clinical training. Graduates can appear for USMLE, FMGE, and other licensing exams worldwide."},
      {name: "East European University", years: "6", tuition: "3900+400 USD", inr_slab: "English", image: "european-university.webp", description: "One of the most budget-friendly yet quality-focused universities in Georgia. 6-year English-medium MD program recognized by WHO, NMC India, ECFMG, and WDOMS. Large Indian student community and excellent FMGE coaching support."},
      {name: "Tbilisi Medical Academy", years: "6", tuition: "7000 USD", inr_slab: "English", image: "tbilisi-medical.jpg", description: "Founded by renowned physician Petre Shotadze, TMA offers a student-centric 6-year English MD program recognized by WHO, NMC India, ECFMG, and WDOMS. Early clinical exposure from year 2, modern simulation center, and strong FMGE results make it a favorite among Indian students."},
      {name: "University of Georgia", years: "6", tuition: "6500 USD", inr_slab: "English", image: "university-of-georgia.webp", description: "One of the largest private universities in Georgia offering a British-style 6-year MD program in English. Recognized by WHO, NMC, ECFMG, GMC (UK), and WDOMS. Graduates are eligible for PLAB, USMLE, FMGE, and practice in India, UK, USA, Australia, and Middle East after respective licensing exams."},
      {name: "European University", years: "6", tuition: "5500 USD", inr_slab: "English", image: "european-university-georgia.webp", description: "A rapidly growing institution in Tbilisi with a 6-year English-medium MD program recognized by WHO, NMC India, ECFMG, and WDOMS. Modern campus, affordable fees, and strong clinical rotations in leading hospitals. High FMGE success rate and increasing popularity among Indian students."},
      {name: "Georgian National University SEU", years: "6", tuition: "5900+400 USD", inr_slab: "English", image: "seu.webp", description: "One of the largest private universities in Georgia with a well-structured 6-year English-medium MD program. Fully recognized by WHO, NMC India, ECFMG, and WDOMS. Strong focus on research and clinical skills; graduates eligible for FMGE, USMLE, and global practice."},
      {name: "Alte University", years: "6", tuition: "5500 USD", inr_slab: "English", image: "alte.jpg", description: "A modern private university offering a high-quality, affordable 6-year English MD program. Recognized by WHO, NMC, ECFMG, and WDOMS. New simulation labs and direct hospital partnerships provide excellent hands-on training. Eligible for FMGE, USMLE, PLAB."}
    ],
    "Russia": [
      {name: "Ivanovo State Medical Academy", years: "6", tuition: "285000 RUB", inr_slab: "English", image: "ivanovo.webp", description: "Ivanovo State Medical Academy (ISMA), established in 1930 near Moscow, delivers a 6-year English-medium MD program recognized by WHO, NMC (India), ECFMG, AMC, GMC (UK), and FAIMER."}
    ],
    "Uzbekistan": [
      {name: "Tashkent Medical Academy", years: "6", tuition: "3500 USD", inr_slab: "English", image: "tashkent.webp", description: "Tashkent Medical Academy (TMA), founded in 1920, is Uzbekistan's oldest government medical university."}
    ],
    "Egypt": [
      {name: "Cairo University", years: "7", tuition: "8000 USD", inr_slab: "English", image: "cairouniversity.webp", description: "Cairo University, Egypt's oldest (1908), offers a 7-year English-medium MBBS."}
    ],
    "Bulgaria": [
      {name: "Varna Medical University", years: "6", tuition: "10000 Euro", inr_slab: "English", image: "varna-university.webp", description: "Varna Medical University (MU-Varna), established in 1961, provides a 6-year English-medium MD program."}
    ],
    "Armenia": [
      {name: "University of Traditional Medicine", years: "6", tuition: "4500 USD", inr_slab: "English", image: "university-of-traditional.webp", description: "University of Traditional Medicine (UTM), founded in 1991 in Yerevan, offers a 6-year English-medium MD program."}
    ],
    "Hungary": [
      {name: "University of Debrecen", years: "6", tuition: "16900 USD", inr_slab: "English", image: "debrecan.webp", description: "University of Debrecen, founded in 1538, offers a 6-year English-medium MD program."}
    ],
    "Moldova": [
      {name: "Nicolae Testemitanu State University", years: "6", tuition: "6000 Euro", inr_slab: "English", image: "nicoale.webp", description: "Nicolae Testemitanu State University, founded in 1945, provides a 6-year English-medium MD program."}
    ],
    "Kazakhstan": [
      {name: "Caspian International School of Medicine", years: "6", tuition: "4500 USD", inr_slab: "English", image: "caspian.webp", description: "Caspian International School of Medicine (CISM), established in 1992 in Almaty."}
    ],
    "Kyrgyzstan": [
      {name: "Jalal-Abad International University", years: "6", tuition: "3200 USD", inr_slab: "English", image: "jalal-abad.webp", description: "Jalal-Abad International University (JAIU), founded in 1993."}
    ],
    "Azerbaijan": [
      {name: "Azerbaijan Medical University", years: "6", tuition: "6750 USD", inr_slab: "English", image: "azerbaijan-medicaluniversity.webp", description: "Azerbaijan Medical University (AMU), founded in 1930 in Baku."}
    ]
  };

  function showStep(idx){
    steps.forEach((s,i) => s.classList.toggle('active', i===idx));
    if(steps[idx].dataset.step === "8") renderUniversities();
    if(steps[idx].dataset.step === "9") renderUniversityDetails();
    if(steps[idx].dataset.step === "12") {
      const restartBtn = document.getElementById('restart');
      if (restartBtn) restartBtn.style.display = 'block';
      
      // Update thank you message with user's name
      const userName = state.name && state.name.trim() ? state.name.trim() : 'there';
      document.getElementById('thanks-msg').innerHTML =` We'll be in touch shortly with you <strong>${userName}</strong>`;
    }
    window.scrollTo({top:0, behavior:'smooth'});
  }

  // Preloader function
  function showPreloader(title, text, delay, nextStepNum, bgClass = 'personalized') {
    document.getElementById('preloader-title').textContent = title;
    document.getElementById('preloader-text').innerHTML = text.replace(/\n/g, '<br>');
    const preloaderStep = document.querySelector('[data-step="6"]');
    const bgEl = document.querySelector('.preloader-bg');
    bgEl.classList.remove('personalized', 'universities', 'consultation', 'appointment');
    bgEl.classList.add(bgClass);
    current = steps.indexOf(preloaderStep);
    showStep(current);
    setTimeout(() => {
      current = steps.findIndex(s => s.dataset.step === nextStepNum);
      showStep(current);
    }, delay);
  }

  function nextStep(){
    if(current < steps.length-1){ current++; showStep(current); }
  }

  function prevStep() {
    const currentStepNum = steps[current].dataset.step;
    
    // Direct mapping of prev navigation
    const prevMap = {
      "2": "1",
      "3": "2",
      "4": "3",
      "5": "4",
      "7": "5",
      "8": "7",
      "9": "8",
      "10": "9",
      "11": "10",
      "12": "1"  // Thank you page goes back to Country (Step 1)
    };

    if (prevMap[currentStepNum]) {
      current = steps.findIndex(s => s.dataset.step === prevMap[currentStepNum]);
      showStep(current);
      
      // If going back to Step 1, clear all data for fresh start
      if (currentStepNum === "12" && prevMap[currentStepNum] === "1") {
        state.country = '';
        state.intake = '';
        state.role = '';
        state.name = '';
        state.phone = '';
        state.place = '';
        state.education = '';
        state.university = '';
        state.finance = '';
        state.appt_date = '';
        state.appt_time = '';
        // Clear all selections
        document.querySelectorAll('.option.selected').forEach(opt => opt.classList.remove('selected'));
        document.querySelectorAll('input[type="text"]').forEach(inp => inp.value = '');
        if (document.getElementById('appt-date')) document.getElementById('appt-date').value = '';
        if (document.getElementById('appt-time')) document.getElementById('appt-time').value = '';
      }
    } else if (current > 0) {
      current--;
      showStep(current);
    }
  }

  // Next button handler
  document.querySelectorAll('.next-btn').forEach(btn => btn.addEventListener('click', async (e) => {
    if (btn.id === 'submit-btn') {
      state.appt_date = document.getElementById('appt-date').value || '';
      state.appt_time = document.getElementById('appt-time').value || '';
      await submitData();
      current = steps.findIndex(s => s.dataset.step === "12");
      showStep(current);
      localStorage.setItem("wizardCompleted", "true");
      return;
    }

    const stepNum = steps[current].dataset.step;
    
    // Step 1: Country validation
    if (stepNum === "1") {
      if (!state.country) { 
        alert('Please choose a country'); 
        return; 
      }
      current = steps.findIndex(s => s.dataset.step === "2");
      showStep(current);
      return;
    }

    // Step 2: Intake validation
    if (stepNum === "2") {
      if (!state.intake) { 
        alert('Please choose an intake'); 
        return; 
      }
      current = steps.findIndex(s => s.dataset.step === "3");
      showStep(current);
      return;
    }

    // Step 3: Role validation
    if (stepNum === "3") {
      if (!state.role) { 
        alert('Please choose Parent or Student'); 
        return; 
      }
      current = steps.findIndex(s => s.dataset.step === "4");
      showStep(current);
      return;
    }

    // Step 4: Name validation
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
      document.getElementById('personalized-greeting').textContent = `${nameVal},`;
      current = steps.findIndex(s => s.dataset.step === "5");
      showStep(current);
      return;
    }

    // Step 5: Phone + City validation
    if (stepNum === "5") {
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
      
      showPreloader(
        `${state.name}, our expert counselors are getting things ready for you...`,
        "Please wait...",
        2200,
        "7",
        "personalized"
      );
      return;
    }

    // Step 7: Education validation
    if (stepNum === "7") {
      if (!state.education) { 
        alert('Please select your education status'); 
        return; 
      }
      showPreloader(
        `Shortlisting top universities in ${state.country} just for you…`,
        "Get ready for the exciting experience of studying<br> <strong>MBBS Abroad</strong><br><strong>Here it is!</strong>",
        4000,
        "8",
        "universities"
      );
      return;
    }

    // Step 9: University Details - just proceed
    if (stepNum === "9") {
      current = steps.findIndex(s => s.dataset.step === "10");
      showStep(current);
      return;
    }

    // Step 10: Finance validation
    if (stepNum === "10") {
      if (!state.finance) { 
        alert('Please choose a financing option'); 
        return; 
      }
      showPreloader(
        "Great!!!",
        "You're almost there! Now just pick a convenient time for your <strong>free 30-min counselling call</strong> with our MBBS Abroad expert.<br>Loading your calendar…",
        4000,
        "11",
        "appointment"
      );
      return;
    }

    // Default: next step
    nextStep();
  }));

  // Counselling button (Step 8 to Step 9)
  const counsellingBtn = document.getElementById('go-to-counselling');
  if (counsellingBtn) {
    counsellingBtn.addEventListener('click', function () {
      if (!state.university) {
        alert('Please select one university before proceeding');
        return;
      }
      current = steps.findIndex(s => s.dataset.step === "9");
      showStep(current);
    });
  }

  // Option selection helper
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

  // Render universities
  function renderUniversities(){
    const el = document.getElementById('university-list');
    el.innerHTML = '';
    const country = state.country || 'Georgia';
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
        Array.from(el.querySelectorAll('.university-card')).forEach(o=>o.classList.remove('selected'));
        this.classList.add('selected');
        state.university = u.name;
      });
      el.appendChild(card);
    });
  }

  // Render university details
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
      <div class="uni-details-row">
        <div class="detail-item">
          <strong>Total Year:</strong> ${uniData.years}
        </div>
        <div class="detail-item">
          <strong>Tuition Fee/Year:</strong> ${uniData.tuition}
        </div>
        <div class="detail-item">
          <strong>Medium:</strong> ${uniData.inr_slab}
        </div>
      </div>
      <p style="white-space:pre-line;">${uniData.description}</p>
    `;
  }

  // Input sync
  document.getElementById('name')?.addEventListener('input', e => state.name = e.target.value.trim());
  document.getElementById('phone')?.addEventListener('input', e => state.phone = e.target.value.trim());
  document.getElementById('place')?.addEventListener('input', e => state.place = e.target.value.trim());

  // Submit function
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
      
      if (j.success) {
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

  // Restart button
  document.getElementById('restart')?.addEventListener('click', () => location.reload());

  // Prev buttons
  document.querySelectorAll('.prev-btn').forEach(btn => {
    btn.removeEventListener('click', prevStep);
    btn.addEventListener('click', prevStep);
  });

  // Date & Time logic
  const apptDateInput = document.getElementById('appt-date');
  const apptTimeSelect = document.getElementById('appt-time');
  
  if (apptDateInput && apptTimeSelect) {
    const today = new Date();
    const formatDate = (d) => d.toISOString().split('T')[0];
    
    function isSunday(dateStr) {
      if (!dateStr) return false;
      const date = new Date(dateStr + 'T00:00:00');
      return date.getDay() === 0;
    }
    
    const now = new Date();
    const isAfter630PM = now.getHours() > 18 || (now.getHours() === 18 && now.getMinutes() >= 30);
    let minDate = isAfter630PM ? new Date(now.setDate(now.getDate() + 1)) : new Date(today);
    
    while (isSunday(formatDate(minDate))) {
      minDate.setDate(minDate.getDate() + 1);
    }
    
    apptDateInput.min = formatDate(minDate);
    apptDateInput.value = formatDate(minDate);
    
    const maxDate = new Date();
    maxDate.setDate(maxDate.getDate() + 90);
    apptDateInput.max = formatDate(maxDate);
    
    const allTimes = ['10:30 AM', '11:30 AM', '12:30 PM', '02:30 PM', '03:30 PM', '04:30 PM'];
    
    function updateAvailableTimes() {
      const selectedDate = apptDateInput.value;
      apptTimeSelect.innerHTML = '<option value="">-- choose time --</option>';
      
      if (!selectedDate) {
        apptTimeSelect.disabled = true;
        return;
      }
      
      if (isSunday(selectedDate)) {
        apptDateInput.value = '';
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
      updateSelectedDisplay();
    }
    
    function updateSelectedDisplay() {
      const date = apptDateInput.value;
      const time = apptTimeSelect.value;
      const displayEl = document.getElementById('selected-appointment');
      const dateTimeEl = document.getElementById('selected-date-time');
      
      if (date && time) {
        const dateObj = new Date(date + 'T00:00:00');
        const day = dateObj.toLocaleDateString('en-GB', { day: '2-digit' });
        const month = dateObj.toLocaleDateString('en-GB', { month: 'short' });
        const weekday = dateObj.toLocaleDateString('en-US', { weekday: 'short' });
        const formattedDate = `${day} ${month} - ${weekday}`;
        dateTimeEl.textContent = `${formattedDate} ${time}`;
        displayEl.style.display = 'block';
      } else {
        displayEl.style.display = 'none';
      }
    }
    
    updateAvailableTimes();
    apptDateInput.addEventListener('change', () => {
      updateAvailableTimes();
      updateSelectedDisplay();
    });
    apptTimeSelect.addEventListener('change', updateSelectedDisplay);
    window.addEventListener('focus', updateAvailableTimes);
  }

  // Auto reset after completion
  window.addEventListener("load", () => {
    if (localStorage.getItem("wizardCompleted") === "true") {
      localStorage.removeItem("wizardCompleted");
      current = 0;
      showStep(current);
    }
  });

  // Initialize
  showStep(0);
})();