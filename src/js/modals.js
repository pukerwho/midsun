// Modals
function openModal(dataModal) {
  let currentModal = document.querySelector('.modal[data-modal="'+dataModal+'"]');
  currentModal.classList.add('open');
}

function closeModal() {
  let modalAll = document.querySelectorAll('.modal');
  modalAll.forEach(el => {
    el.classList.remove('open');
  });
}

let modalClick = document.querySelectorAll('.modal-js');
modalClick.forEach(el => {
  el.addEventListener('click', function () {
    let dataModal = this.dataset.modalClick;
    openModal(dataModal);
  });
});

let modalClickClose = document.querySelectorAll('.modal-close-js');
modalClickClose.forEach(el => {
  el.addEventListener('click', function () {
    closeModal();
  });
});

document.addEventListener('click', function (e) {
  if (e.target.classList.value === 'modal open') {
    closeModal(dataModal);
  }
});