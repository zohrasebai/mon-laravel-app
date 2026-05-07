document.addEventListener("DOMContentLoaded", () => {
  const rotatingWords = ["Branding", "Marketing", "Your Business"];
  const changingWord = document.querySelector(".changing-word");

  let currentWordIndex = 0;
  let displayText = "";
  let isDeleting = false;

  function typeEffect() {
    const currentWord = rotatingWords[currentWordIndex];

    if (isDeleting) {
      displayText = currentWord.substring(0, displayText.length - 1);
    } else {
      displayText = currentWord.substring(0, displayText.length + 1);
    }

    changingWord.textContent = displayText;

    if (!isDeleting && displayText === currentWord) {
      setTimeout(() => {
        isDeleting = true;
      }, 1000);
    } else if (isDeleting && displayText === "") {
      isDeleting = false;
      currentWordIndex = (currentWordIndex + 1) % rotatingWords.length;
    }

    setTimeout(typeEffect, isDeleting ? 50 : 100);
  }

  typeEffect();
});


// WhyJs Counter Animation
  document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".count-num");
    counters.forEach(counter => {
      const updateCount = () => {
        const target = +counter.innerText;
        const count = +counter.getAttribute("data-count") || 0;
        const speed = 200;
        const increment = target / speed;

        if (count < target) {
          counter.innerText = Math.ceil(count + increment);
          counter.setAttribute("data-count", count + increment);
          setTimeout(updateCount, 20);
        } else {
          counter.innerText = target;
        }
      };
      updateCount();
    });
  });



