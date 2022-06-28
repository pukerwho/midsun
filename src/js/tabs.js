let tabsBtn = document.querySelectorAll('.tab-btn');
let tabsContent = document.querySelectorAll('.tab-content');

function tabRemove() {
  tabsContent.forEach((item) => {
    item.classList.add('hidden');
  })
  tabsBtn.forEach((tab) => {
    tab.classList.remove('bg-blue-200');
    tab.classList.add('bg-gray-200');
  })
}

function tabAdd(tabContent, item) {
  tabContent.classList.remove('hidden');
  item.classList.add('bg-blue-200')
  item.classList.remove('bg-gray-200');
}

tabsBtn.forEach((item) => {
  item.addEventListener('click', () => {
    tabData = item.dataset.tab;
    let tabContent = document.querySelector('.tab-content[data-tab="' + tabData + '"]');
    tabRemove();
    tabAdd(tabContent, item);
  })
})