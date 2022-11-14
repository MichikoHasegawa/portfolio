"use strict";

// Homepage
var words = ["Hello, I am Michiko, I am a Front-End Web Developer."],
  part,
  i = 0,
  offset = 0,
  len = words.length,
  forwards = true,
  skip_count = 0,
  skip_delay = 15,
  speed = 70;
var wordflick = function () {
  setInterval(function () {
    if (forwards) {
      if (offset >= words[i].length) {
        ++skip_count;
        if (skip_count == skip_delay) {
          forwards = false;
          skip_count = 0;
        }
      }
    } else {
      if (offset == 0) {
        forwards = true;
        i++;
        offset = 0;
        if (i >= len) {
          i = 0;
        }
      }
    }

    part = words[i].substr(0, offset);
    if (skip_count == 0) {
      if (forwards) {
        offset++;
      } else {
        offset--;
      }
    }
    $(".home-content p").text(part);
  }, speed);
};

$(document).ready(function () {
  wordflick();
});

// Single Page
const reflectionHeader = document.querySelector(".reflection-header");
const processHeader = document.querySelector(".process-header");
const reflection = document.querySelector(".reflection");
const process = document.querySelector(".process");

processHeader.addEventListener("click", function () {
  reflection.classList.add("hide");
  process.classList.remove("hide");
  reflectionHeader.style.border = "none";
  reflectionHeader.style.backgroundColor = "unset";
  processHeader.style.backgroundColor = "#ffd72f";
  reflectionHeader.style.borderBottom = "2px solid #ffd72f";
  reflectionHeader.style.color = "#888888";
  processHeader.style.color = "#575757";
});

reflectionHeader.addEventListener("click", function () {
  reflection.classList.remove("hide");
  process.classList.add("hide");
  processHeader.style.border = "none";
  processHeader.style.backgroundColor = "unset";
  reflectionHeader.style.backgroundColor = "#ffd72f";
  processHeader.style.borderBottom = "2px solid #ffd72f";
  processHeader.style.color = "#888888";
  reflectionHeader.style.color = "#575757";
  console.log("clicked!");
});

processHeader.addEventListener("mouseover", function () {
  processHeader.style.color = "#575757";
});

reflectionHeader.addEventListener("mouseover", function () {
  reflectionHeader.style.color = "#575757";
});
