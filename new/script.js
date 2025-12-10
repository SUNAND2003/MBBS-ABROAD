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
    "Uzbekistan": [
      {name: "Tashkent Medical Academy", years: "6", tuition: "3500 USD", inr_slab: "English", image: "tashkent.webp", description: "Tashkent Medical Academy (TMA), founded in 1920, is Uzbekistan's oldest government medical university and a top choice for international students pursuing a 6-year English-medium MBBS program. Ranked 13th in Uzbekistan and recognized by WHO, NMC (India), ECFMG, UNESCO, and WDOMS, its degree is valid globally, enabling graduates to sit for FMGE/NExT (India, with high passing rates), USMLE (USA), and PLAB (UK) for practice in India, USA, UK, Australia, and beyond. With modern labs, partnerships like Harvard Medical School, and clinical training in university hospitals, TMA emphasizes practical skills and research, making it ideal for Indian students seeking affordable, high-quality education."},
      {name: "Samarkand State Medical University", years: "6", tuition: "3850 USD", inr_slab: "English", image: "samarkand.webp", description: "Established in 1930 and restructured in 2022, Samarkand State Medical University (SamSMU) offers a 6-year English-medium MBBS program compliant with international standards, recognized by WHO, NMC (India), PMDC, and WDOMS. Graduates are eligible for FMGE/NExT (India, with strong success rates), USMLE, PLAB, and practice in India, Gulf countries, and worldwide. Ranked 3rd in Uzbekistan, it features modern labs, simulation-based learning, and clinical rotations in affiliated hospitals treating diverse cases, attracting over 1,000 Indian students annually for its multicultural environment and low-cost, high-exposure training."},
      {name: "Bukhara State Medical Institute", years: "6", tuition: "3200 USD", inr_slab: "English", image: "bukhara.webp", description: "Bukhara State Medical Institute (BSMI), founded in 1990 in the historic city of Bukhara, provides a 6-year English-medium MBBS program recognized by WHO, NMC (India), WDOMS, FAIMER, and ECFMG. Degrees are valid for FMGE/NExT (India, ~47% pass rate), USMLE (USA), PLAB (UK), AMC (Australia), and MCCQE (Canada), supporting global practice. With a curriculum aligned to NMC guidelines, modern infrastructure, and clinical exposure in university hospitals, BSMI is popular among Indian students for its holistic approach, research focus, and affordable fees, fostering skills for international medical careers."}
    ],
    "Russia": [
      {name: "Ivanovo State Medical Academy", years: "6", tuition: "285000 RUB", inr_slab: "English", image: "ivanovo.webp", description: "Ivanovo State Medical Academy (ISMA), established in 1930 near Moscow, delivers a 6-year English-medium MD program recognized by WHO, NMC (India), ECFMG, AMC, GMC (UK), and FAIMER. Graduates qualify for FMGE/NExT (India), USMLE, PLAB, and global practice, with strong preparation via modern labs and hospital rotations. Ranked among Russia's top medical schools, ISMA emphasizes clinical skills from year 2, attracting Indian students for its affordable fees, experienced faculty, and 60%+ FMGE success rate."},
      {name: "Kemerovo State Medical University", years: "6", tuition: "295000 RUB", inr_slab: "English", image: "kemerovo.webp", description: "Kemerovo State Medical University (KSMU), a leading Siberian institution, offers a 6-year English-medium MD program accredited by WHO, NMC (India), ECFMG, and Russia's Ministry of Health. Degrees enable FMGE/NExT (India), USMLE, PLAB, and worldwide practice, with IELTS/TOEFL for English proficiency. Ranked top 20 in Russia, KSMU provides extensive clinical training in 1,000+ bed hospitals, research focus, and multicultural support, ideal for Indian students seeking quality education in a safe, affordable environment."},
      {name: "Kemerovo State University", years: "6", tuition: "277000 RUB", inr_slab: "English", image: "kemerovo-medical-university.webp", description: "Kemerovo State University (KemSU), with a medical faculty since the 1950s, runs a 6-year English-medium MBBS program recognized by WHO, NMC (India), and Russia's Ministry of Education. Graduates are eligible for FMGE/NExT (India), USMLE, PLAB, and international licensure, with a curriculum meeting NMC guidelines. Ranked top 20 in Russia, KemSU excels in practical training via affiliated hospitals, low fees, and Indian student support, preparing over 8,000 alumni for global careers."},
      {name: "Ural State Medical University", years: "6", tuition: "300000 RUB", inr_slab: "English", image: "ural-state-university.webp", description: "Ural State Medical University (USMU), founded in 1930 in Yekaterinburg, provides a 6-year English-medium MD program approved by WHO, NMC (India), ECFMG, and Russia's Ministry of Health. Degrees support FMGE/NExT (23% pass rate in 2021), USMLE, PLAB, and global practice. Ranked 967th worldwide, USMU offers early clinical exposure, modern facilities, and NEET-qualified admissions, making it a preferred choice for Indian students aiming for international residency."},
      {name: "Yaroslavl State Medical University", years: "6", tuition: "350000 RUB", inr_slab: "English", image: "yaroslavl-medical-university.webp", description: "Yaroslavl State Medical University (YSMU), established in 1944 near Moscow, features a 6-year English-medium MD program recognized by WHO, NMC (India), ECFMG, GMC (UK), and WDOMS. Graduates qualify for FMGE/NExT, USMLE, PLAB, and EU/UK practice without additional hurdles. Ranked highly in Russia, YSMU emphasizes simulation labs and 1,000+ bed hospital rotations, with 500+ faculty supporting Indian students for global licensing success."},
      {name: "Bashkir State Medical University", years: "6", tuition: "399120 RUB", inr_slab: "English", image: "bashkir-university.webp", description: "Bashkir State Medical University (BSMU), founded in 1932 in Ufa, offers a 6-year English-medium MD program accredited by WHO, NMC (India), ECFMG, and Russia's Ministry of Health. Degrees are valid for FMGE/NExT, USMLE, PLAB, and worldwide practice. Ranked 4th in Russia, BSMU provides advanced labs, university hospitals, and scholarships, hosting 8,000+ students including Indians for research-driven, affordable medical training."},
      {name: "North Ossetian State Medical Academy", years: "6", tuition: "310000 RUB", inr_slab: "English", image: "north-ossetian.webp", description: "North Ossetian State Medical Academy (NOSMA), established in 1939 in Vladikavkaz, delivers a 6-year English-medium MD program recognized by WHO, NMC (India), and Russia's Ministry of Health. Graduates are eligible for FMGE/NExT, USMLE, PLAB, and global practice. Ranked top in the Caucasus, NOSMA offers modern infrastructure, 52,000+ students from 101 countries, and clinical training in multi-profile hospitals, ideal for Indian aspirants seeking holistic education."},
      {name: "Far Eastern Federal University", years: "6", tuition: "495000 RUB", inr_slab: "English", image: "far-eastern-university.webp", description: "Far Eastern Federal University (FEFU), founded in 1899 in Vladivostok, provides a 6-year English-medium MD program listed in WDOMS and recognized by WHO, NMC (India), and Russia's Ministry of Education. Degrees support FMGE/NExT, USMLE, PLAB, and international careers. Ranked top 5 in Russia, FEFU features state-of-the-art labs, 41,000+ students, and Pacific partnerships, attracting Indians for innovative, affordable medical studies."},
      {name: "Novosibirsk State University", years: "6", tuition: "539500 RUB", inr_slab: "English", image: "novosibirsk.webp", description: "Novosibirsk State University (NSU), established in 1959 in Siberia's science hub, offers a 6-year English-medium MBBS program recognized by WHO, NMC (India), and Russia's Ministry of Education. Graduates qualify for FMGE/NExT, USMLE, PLAB, and global practice. Ranked top 20 worldwide, NSU emphasizes research, clinical rotations in top hospitals, and TOEFL/IELTS admissions, preparing 8,000+ international students for innovative medical roles."},
      {name: "Crimea Federal University", years: "6", tuition: "330000 RUB", inr_slab: "English", image: "crimea.webp", description: "Crimea Federal University (CFU), founded in 1918 in Simferopol, runs a 6-year English-medium MD program recognized by WHO, NMC (India), ECFMG, and Russia's Ministry of Health. Despite 2014 sanctions, ECFMG allows USMLE eligibility since 2016; valid for FMGE/NExT, PLAB, and global practice. Ranked top in Crimea, CFU offers massive clinical exposure in 2,000+ bed hospitals, low fees, and Indian support for international careers."},
      {name: "Lobachevsky State University", years: "6", tuition: "410000 RUB", inr_slab: "English", image: "lobachevsky.webp", description: "Lobachevsky State University (UNN), founded in 1916 in Nizhny Novgorod, provides a 6-year English-medium MD program accredited by WHO, NMC (India), ECFMG, and Russia's Ministry of Science. Degrees enable FMGE/NExT, USMLE, PLAB, and EU practice. Ranked top in Russia, UNN features advanced labs, 40,000+ students, and clinical partnerships, ideal for Indian students seeking research-focused, globally valid medical training."},
      {name: "Omsk State University", years: "6", tuition: "330000 RUB", inr_slab: "English", image: "omsk-university.webp", description: "Omsk State University (OSMU), established in 1920, offers a 6-year English-medium MD program (first 3 years English, then bilingual) recognized by WHO, NMC (India), and Russia's Ministry of Health. Graduates qualify for FMGE/NExT, USMLE, PLAB, and worldwide practice. Ranked 210th in Russia, OSMU provides 2,000+ bed hospitals for rotations, affordable fees, and Indian mess, preparing students for global licensure."},
      {name: "Tver State Medical University", years: "6", tuition: "430000 RUB", inr_slab: "English", image: "tver-university.webp", description: "Tver State Medical University (TSMU), founded in 1902, delivers a 6-year English-medium MD program approved by WHO, NMC (India), ECFMG, FAIMER, and Russia's Ministry of Health. Degrees support FMGE/NExT (19.3% pass rate), USMLE, PLAB, and global practice. Ranked top in Russia, TSMU offers simulation centers, 1,000+ bed hospitals, and NEET admissions, with 24% FMGE success for Indian graduates."}
    ],
    "Egypt": [
      {name: "Cairo University", years: "7", tuition: "8000 USD", inr_slab: "English", image: "cairouniversity.webp", description: "Cairo University, Egypt's oldest (1908), offers a 7-year English-medium MBBS (5 years + 2-year internship) recognized by WHO, NMC (India), ECFMG, and Arab Board. Graduates qualify for FMGE/NExT, USMLE, PLAB, and worldwide practice, with massive clinical exposure in university hospitals serving millions. Ranked top in Egypt, it attracts 800+ Indian students for affordable fees and global validity."},
      {name: "Mansoura University", years: "7", tuition: "8000 USD", inr_slab: "English", image: "mansoura.webp", description: "Mansoura University, founded in 1972, provides a 7-year English-medium MBBS (5 years + 2-year internship) via its Mansoura-Manchester Program, recognized by WHO, NMC (India), and ECFMG. Degrees enable FMGE/NExT, USMLE, PLAB, and EU/UK practice. Ranked top 5 in Egypt, it features UK-aligned curriculum, advanced labs, and 900+ faculty, ideal for Indian students seeking high FMGE rates."},
      {name: "Ain Shams University", years: "7", tuition: "8000 USD", inr_slab: "English", image: "asu.webp", description: "Ain Shams University, established in 1950 in Cairo, runs a 7-year English-medium MBBS (5 years + 2-year internship) recognized by WHO, NMC (India), ECFMG, and Arab Board. Graduates are eligible for FMGE/NExT, USMLE, PLAB, and global practice. Ranked 3rd in Egypt, it offers modern facilities, research centers, and clinical training in top hospitals, with strong Indian student support."},
      {name: "Assiut University", years: "7", tuition: "8000 USD", inr_slab: "English", image: "aasiut.webp", description: "Assiut University, founded in 1957, delivers a 7-year English-medium MBBS (5 years + 2-year internship) accredited by WHO, NMC (India), NAQAAE, and WDOMS. Degrees support FMGE/NExT, USMLE, PLAB, and international careers. Ranked top in Upper Egypt, it provides hands-on training in government hospitals and NEET-qualified admissions for Indian students."},
      {name: "Alexandria University", years: "7", tuition: "8000 USD", inr_slab: "English", image: "alexandria.webp", description: "Alexandria University, established in 1942, offers a 7-year English-medium MBBS (5 years + 2-year internship) recognized by WHO, NMC (India), ECFMG, and Arab Board. Graduates qualify for FMGE/NExT, USMLE, PLAB, and global practice. Ranked 2nd in Egypt, it features coastal location, advanced labs, and 120,000+ students, attracting Indians for quality education and cultural exposure."},
      {name: "Nahda University", years: "7", tuition: "5000 USD", inr_slab: "English", image: "nahda.webp", description: "Nahda University (NUB), founded in 2006 in Beni Suef, provides a 7-year English-medium MBBS (5 years + 2-year internship) recognized by WHO, NMC (India), and Egypt's Supreme Council. Degrees enable FMGE/NExT, USMLE, PLAB, and worldwide practice. With modern infrastructure, university hospitals, and Indian hostels, NUB is affordable and student-focused for international aspirants."}
    ],
    "Armenia": [
      {name: "University of Traditional Medicine", years: "6", tuition: "4500 USD", inr_slab: "English", image: "university-of-traditional.webp", description: "University of Traditional Medicine (UTM), founded in 1991 in Yerevan, offers a 6-year English-medium MD program blending allopathic and traditional medicine, recognized by WHO, NMC (India), and WDOMS. Graduates qualify for FMGE/NExT, USMLE, PLAB, and global practice. With urban campus, research focus, and clinical rotations, UTM supports 1,000+ international students, including Indians, for holistic, affordable training."}
    ],
    "Bulgaria": [
      {name: "Varna Medical University", years: "6", tuition: "10000 Euro", inr_slab: "English", image: "varna-university.webp", description: "Varna Medical University (MU-Varna), established in 1961, provides a 6-year English-medium MD program compliant with EU Directive 2005/36/EC, recognized by WHO, NMC (India), ECFMG, GMC (UK), and WDOMS. Degrees allow direct EU/UK practice, plus FMGE/NExT, USMLE; valid worldwide. Ranked top in Bulgaria, it offers 50+ countries' students modern labs and 1,000+ bed hospitals."},
      {name: "Medical University of Plovdiv", years: "6", tuition: "10000 Euro", inr_slab: "English", image: "medical-university-plovdiv", description: "Medical University of Plovdiv, founded in 1945, runs a 6-year English-medium MD program recognized by WHO, NMC (India), ECFMG, and EU bodies. Graduates qualify for FMGE/NExT, USMLE, PLAB, and EU practice. Ranked highly in Bulgaria, it features ECTS credits, clinical rotations in 2,000+ bed hospitals, and NEET admissions for 600+ international students."},
      {name: "Medical University of Sofia", years: "6", tuition: "10000 Euro", inr_slab: "English", image: "medical-university-sofia.webp", description: "Medical University of Sofia, established in 1917, offers a 6-year English-medium MD program accredited by WHO, NMC (India), ECFMG, and Bulgaria's NEAA. Degrees support FMGE/NExT, USMLE, PLAB, and EU/UK practice. Oldest in Bulgaria, it provides Erasmus+ exchanges, advanced facilities, and 4 faculties for global careers."},
      {name: "Pleven State Medical University", years: "6", tuition: "9000 Euro", inr_slab: "English", image: "medical-university-pleven.webp", description: "Pleven Medical University, founded in 1974, delivers a 6-year English-medium MD program recognized by WHO, NMC (India), ECFMG, and GMC (UK). Graduates are eligible for FMGE/NExT, USMLE, PLAB, and EU practice without extras. Ranked top in Bulgaria, it pioneered English programs, with 1,000+ bed hospitals and 6,000+ alumni worldwide."},
      {name: "Trakia University", years: "6", tuition: "8000 Euro", inr_slab: "English", image: "trakia-university.webp", description: "Trakia University, established in 1995 in Stara Zagora, provides a 6-year English-medium MD program recognized by WHO, NMC (India), and EU standards. Degrees enable FMGE/NExT, USMLE, PLAB, and global practice. With 600+ medical students, modern clinics, and multicultural support, it's affordable for Indians seeking EU-valid training."}
    ],
    "Hungary": [
      {name: "University of Debrecen", years: "6", tuition: "16900 USD", inr_slab: "English", image: "debrecan.webp", description: "University of Debrecen, founded in 1538, offers a 6-year English-medium MD program recognized by WHO, ECFMG, GMC (UK), NMC (India), and WFME (valid to 2030). Graduates qualify for USMLE, PLAB (exempt for UK), FMGE/NExT, and direct EU/USA residency. Ranked 574th globally, it features integrated Kaplan coaching, research labs, and 22 departments for 4,000+ international students."}
    ],
    "Moldova": [
      {name: "Nicolae Testemitanu State University", years: "6", tuition: "6000 Euro", inr_slab: "English", image: "nicoale.webp", description: "Nicolae Testemitanu State University, founded in 1945, provides a 6-year English-medium MD program recognized by WHO, NMC (India), ECFMG, and EU countries. Degrees support FMGE/NExT, USMLE, PLAB, and regional practice. Moldova's top medical school, it offers low fees, clinical rotations, and 5 faculties for Indian students seeking Eastern European education."}
    ],
    "Kazakhstan": [
      {name: "Caspian International School of Medicine", years: "6", tuition: "4500 USD", inr_slab: "English", image: "caspian.webp", description: "Caspian International School of Medicine (CISM), established in 1992 in Almaty, offers a 6-year English-medium MBBS program recognized by WHO, NMC (India), and WDOMS. Graduates qualify for FMGE/NExT (27.78% pass rate), USMLE, PLAB, and global practice. Ranked 48th in Kazakhstan, it provides FMGE coaching, modern labs, and 1,000+ Indian students for affordable, practical training."}
    ],
    "Kyrgyzstan": [
      {name: "Jalal-Abad International University", years: "6", tuition: "3200 USD", inr_slab: "English", image: "jalal-abad.webp", description: "Jalal-Abad International University (JAIU), founded in 1993, runs a 6-year English-medium MBBS program recognized by WHO, NMC (India), WDOMS, and FAIMER. Degrees enable FMGE/NExT, USMLE, PLAB, and worldwide practice. With 4,000+ international students, Indian mess, and hospital affiliations, JAIU is budget-friendly for Indians."},
      {name: "Jalal-Abad State University", years: "6", tuition: "4500 USD", inr_slab: "English", image: "jalalabad-state-university.webp", description: "Jalal-Abad State University (JaSU), established in 1993, provides a 6-year English-medium MD program approved by WHO, NMC (India), and WDOMS. Graduates qualify for FMGE/NExT, USMLE, PLAB, and global careers. Ranked top in Kyrgyzstan, JaSU offers low fees, clinical rotations, and 4,300+ Indian students in a safe, multicultural setting."},
      {name: "Osh State Medical University", years: "6", tuition: "4000 USD", inr_slab: "English", image: "osh-state.webp", description: "Osh State Medical University (OSMU), founded in 1951, delivers a 6-year English-medium MBBS program recognized by WHO, NMC (India), FAIMER, and ECFMG. Degrees support FMGE/NExT, USMLE, PLAB, and international practice. Ranked top in Kyrgyzstan, OSMU features 20+ faculties, 1,000+ bed hospitals, and FMGE prep for 4,000+ Indian students."}
    ],
    "Azerbaijan": [
      {name: "Azerbaijan Medical University", years: "6", tuition: "6750 USD", inr_slab: "English", image: "azerbaijan-medicaluniversity.webp", description: "Azerbaijan Medical University (AMU), founded in 1930 in Baku, offers a 6-year English-medium MBBS program recognized by WHO, NMC (India), ECFMG, and global bodies. Graduates qualify for FMGE/NExT, USMLE, PLAB, and practice in 21+ countries. Ranked top in Azerbaijan, AMU hosts 1,200+ internationals from 21 countries, with modern labs and cultural support for Indian students."}
    ]
  };

  function showStep(idx){
    steps.forEach((s,i) => s.classList.toggle('active', i===idx));
    if(steps[idx].dataset.step === "8") renderUniversities();
    if(steps[idx].dataset.step === "8.5") renderUniversityDetails();
    // Show restart button on thank you step
    if(steps[idx].dataset.step === "11") {
      const restartBtn = document.getElementById('restart');
      if (restartBtn) restartBtn.style.display = 'block';
    }
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

  // After success → go to Thank You (Step 11)
  current = steps.findIndex(s => s.dataset.step === "11");
  showStep(current);

  // Store reset flag so refresh goes to step 1
  localStorage.setItem("wizardCompleted", "true");

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
      document.getElementById('personalized-greeting').textContent = `${nameVal},`;
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
  "universities" // bg2.jpg - campus/university vibe
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
  "appointment" // bg4.jpg - calendar/professional
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
    // ONLY ON SUCCESS → Personalize message (no localStorage persistence)
   // Inside submitData(), after successful submission
if (j.success) {
    const userName = (state.name && state.name.trim()) ? state.name.trim() : 'there';
    document.getElementById('thanks-msg').innerHTML = `
        Thank you!<br><br>
        We’ll be in touch shortly with you <strong>${userName}</strong>
    `;
  
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
  // Restart - uncommented and active
  document.getElementById('restart')?.addEventListener('click', () => location.reload());
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
  
    // NEW: Update display after times are refreshed
    updateSelectedDisplay();
  }
  // UPDATED: Function to Update Selected Appointment Display - Calendly-like Format
  function updateSelectedDisplay() {
    const date = apptDateInput.value;
    const time = apptTimeSelect.value;
    const displayEl = document.getElementById('selected-appointment');
    const dateTimeEl = document.getElementById('selected-date-time');
    if (date && time) {
      // Format date as "06 Nov - Thu" (DD MMM - DDD)
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
  // Run on load and when date changes
  updateAvailableTimes();
  apptDateInput.addEventListener('change', () => {
    updateAvailableTimes();
    updateSelectedDisplay();
  });
  apptTimeSelect.addEventListener('change', updateSelectedDisplay);
  window.addEventListener('focus', updateAvailableTimes); // refresh if tab was inactive
}
  // 🔄 Auto reset to Step 1 after completion and refresh
window.addEventListener("load", () => {
  if (localStorage.getItem("wizardCompleted") === "true") {
    localStorage.removeItem("wizardCompleted");
    current = 0;
    showStep(current);
  }
});

})();
