/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// You can specify which plugins you need
import { Tooltip, Toast, Popover } from 'bootstrap';

// start the Stimulus application
import './bootstrap';

// const collectionHolder = document.querySelector('#tuteur_students');

// let indexStudent = collectionHolder.querySelector("fieldset") ? collectionHolder.querySelector("fieldset").length : 0;

// const addStudent = () => {

// console.log(indexStudent);
//   collectionHolder.innerHTML += collectionHolder.dataset.prototype.replace(
//       /__name__/g,
//       indexStudent)
//       ;
// indexStudent++;
// };
// document.querySelector('#new-student').addEventListener('click', addStudent);


const newItem = (e) => {
  const collectionHolder = document.querySelector(e.currentTarget.dataset.collection);

console.log("collectionHolder===", collectionHolder.dataset.prototype);

  const item = document.createElement("div");
  item.classList.add("col-10");
  let indexStudent = parseInt(collectionHolder.dataset.index);
  console.log("indexStudent===", typeof indexStudent);
  console.log("collection index===",typeof collectionHolder.dataset.index);

  item.innerHTML = collectionHolder
    .dataset
    .prototype
    .replace(
      /__name__/g,
      indexStudent
    );

  item.querySelector(".btn-remove").addEventListener("click", () => item.remove());

  collectionHolder.appendChild(item);

  collectionHolder.dataset.index = parseInt(indexStudent+ 1) ;
};


document
  .querySelectorAll('.btn-remove')
  .forEach(btn => btn.addEventListener("click", (e) => e.currentTarget.closest(".col-10").remove()));

document
  .querySelectorAll('.btn-new')
  .forEach(btn => btn.addEventListener("click", newItem));
