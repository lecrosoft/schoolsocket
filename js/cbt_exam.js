"use strict";
let currentQuestionIndex = 0;
let timerCount = document.getElementById("timer_count");
let timerDiv = document.getElementById("timer");

function formatTime(hours, minutes, seconds) {
  const formattedTime = [];

  if (hours > 0) {
    formattedTime.push(`${hours}hr`);
  }
  if (minutes > 0) {
    formattedTime.push(`${minutes}m`);
  }
  if (seconds > 0) {
    formattedTime.push(`${seconds}s`);
  }

  return formattedTime.join(" ");
}

function minutesToTime(minutes) {
  const hours = Math.floor(minutes / 60);
  const remainingMinutes = minutes % 60;
  return formatTime(hours, remainingMinutes, 0);
}

function updateTimer() {
  const formattedTime = timerCount.textContent;
  const timeParts = formattedTime.split(" ");

  let hours = 0;
  let minutes = 0;
  let seconds = 0;

  // Parse the timeParts to get hours, minutes, and seconds
  for (const part of timeParts) {
    if (part.includes("hr")) {
      hours = parseInt(part, 10);
    } else if (part.includes("m")) {
      minutes = parseInt(part, 10);
    } else if (part.includes("s")) {
      seconds = parseInt(part, 10);
    }
  }

  // Update the timer
  if (hours === 0 && minutes === 1 && seconds === 59) {
    timerDiv.classList.remove("btn-primary");
    timerDiv.classList.add("btn-danger");
  }
  if (hours === 0 && minutes === 0 && seconds === 0) {
    clearInterval(timerInterval); // Stop the timer
    result(); // Call the result function
  } else if (seconds > 0) {
    seconds--;
  } else if (minutes > 0) {
    minutes--;
    seconds = 59;
  } else if (hours > 0) {
    hours--;
    minutes = 59;
    seconds = 59;
  }

  // Format and update the timerCount element
  timerCount.textContent = formatTime(hours, minutes, seconds);

  // Store the current timer count in local storage
  localStorage.setItem("timerCount", timerCount.textContent);
}

// Example usage:
// Check if there's a saved timer count in local storage and use it
const savedTimerCount = localStorage.getItem("timerCount");
if (savedTimerCount) {
  timerCount.textContent = savedTimerCount;
} else {
  // Set a default time value here, for example, 30 minutes:
  timerCount.textContent = "30m 00s"; // Modify this as needed
}

// Start the countdown timer
const timerInterval = setInterval(updateTimer, 1000); // Update every second

// Get all questions
const questions = document.querySelectorAll(".questions");
// Display the first question
questions[0].style.display = "block"; // Display the first question
// Load the stored user answers from localStorage
let userAnswers = JSON.parse(localStorage.getItem("userAnswers")) || [];

// Initialize the questions and selected options
for (let i = 0; i < questions.length; i++) {
  const question = questions[i];
  const radioButtons = question.querySelectorAll('input[type="radio"]');

  // Ensure that the userAnswers array has an entry for this question
  if (userAnswers[i] === undefined) {
    userAnswers[i] = undefined;
  }

  // Attach event listeners to radio buttons
  for (let j = 0; j < radioButtons.length; j++) {
    radioButtons[j].addEventListener("click", () => {
      userAnswers[i] = j;
      localStorage.setItem("userAnswers", JSON.stringify(userAnswers));
    });
  }

  // Check if userAnswer is saved for this question and select the radio button
  if (userAnswers[i] !== undefined) {
    radioButtons[userAnswers[i]].checked = true;
  }
}

// Rest of the code...

// Get the buttons
const previousButtons = document.querySelectorAll('[id^="previous-button"]');
const nextButtons = document.querySelectorAll('[id^="next-button"]');

// Create the "Submit" button dynamically
const submitButton = document.createElement("button");
submitButton.textContent = "Submit";
submitButton.style.display = "none"; // Initially hide it
submitButton.addEventListener("click", result);

// Add the "btn" and "btn-success" classes
submitButton.classList.add("btn", "btn-success");

// Insert the "Submit" button after the last "Next" button
nextButtons[nextButtons.length - 1].parentNode.insertBefore(
  submitButton,
  nextButtons[nextButtons.length - 1].nextSibling
);

// Update button visibility
function updateButtons() {
  previousButtons[currentQuestionIndex].style.display =
    currentQuestionIndex === 0 ? "none" : "block";
  nextButtons[currentQuestionIndex].style.display =
    currentQuestionIndex < questions.length - 1 ? "block" : "none";
  submitButton.style.display =
    currentQuestionIndex === questions.length - 1 ? "block" : "none";
}

// Initial button setup
updateButtons();

function previous(id) {
  if (currentQuestionIndex > 0) {
    questions[currentQuestionIndex].style.display = "none";
    currentQuestionIndex--;
    questions[currentQuestionIndex].style.display = "block";
    updateButtons();
  }
}

function next(id) {
  if (currentQuestionIndex < questions.length - 1) {
    questions[currentQuestionIndex].style.display = "none";
    currentQuestionIndex++;
    questions[currentQuestionIndex].style.display = "block";
    updateButtons();
  }
}

function result() {
  let score = 0;

  // Loop through the questions
  for (let i = 0; i < questions.length; i++) {
    const question = questions[i];
    const radioButtons = question.querySelectorAll('input[type="radio"]');

    // Loop through radio buttons to find the selected answer
    for (let j = 0; j < radioButtons.length; j++) {
      if (
        radioButtons[j].checked &&
        radioButtons[j].getAttribute("data-correct") === "true"
      ) {
        score++;
        break; // Break the inner loop when a correct answer is found
      }
    }
  }

  alert(`You scored ${score} out of ${questions.length}`);
}
