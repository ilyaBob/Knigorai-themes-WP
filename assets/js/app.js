let asideBtn = document.querySelectorAll('.aside__menu-btn');
let asideItem = document.querySelector('.aside__menu-item');
let searchBtn = document.querySelector('.search__btn');
let search = document.querySelector('.search');
let headerSearchBtn = document.querySelectorAll('.header__search');
let filterBtn = document.querySelector('.main__content-btn-filter');
let filter = document.querySelector('.main__filter');
let contentGrid = document.querySelector('.main__content-grid--grid');
let contentList = document.querySelector('.main__content-grid--list');
let mainItem = document.querySelectorAll('.main__item');
let mainItemDesc = document.querySelectorAll('.main__item-desc');
let mainItemTitle = document.querySelectorAll('.main__item-title');
let contentBody = document.querySelector('.main__content-body');
let paginationItem = document.querySelectorAll('.main__pagination-item-num');
let mobileBurger = document.querySelector('.header__mobile-burger');
let mobileMenu = document.querySelector('.header__mobile-menu-nav');
let overlay = document.querySelector('.overlay');
let mobileMenuClose = document.querySelector('.header__mobile-menu-close');
let asideTopItem = document.querySelectorAll('.aside__top-item-title');
let genreTopItem = document.querySelectorAll('.aside__top-item-genre');
let aside = document.querySelectorAll('.aside');

let descriptionExpand = document.querySelector('.page__description-expand');
let descriptionControl = document.querySelector('.page__description-control-js');
let descriptionText = document.querySelector('.page__description-text');
let alsoItem = document.querySelectorAll('.page__also-item');
let complaint = document.querySelectorAll('.complaint');
let complaintForm = document.querySelector('.complaints');
let complaintFormClose = document.querySelector('.complaints__close');

// Категории жанров
for (i = 0; i < asideBtn.length; i++) {
   asideBtn[i].addEventListener('click', function () {
      this.classList.toggle('aside__menu-btn--active-js')
   });
}

// Поиск
for (i = 0; i < headerSearchBtn.length; i++) {
   headerSearchBtn[i].addEventListener('click', function () {
      search.classList.toggle('search--active');
      this.classList.toggle('header__search--active')
   })
}

// Фильтр
filterBtn?.addEventListener('click', e => {
   filter.classList.toggle('main__filter--active');
})

// Сетка каталога
contentGrid?.addEventListener('click', e => {
   contentGrid.style = 'opacity: 1;';
   contentList.style = 'opacity: .5;';
   for (i = 0; i < mainItem.length; i++) {
      mainItem[i].style = ('max-width: 146px; flex-direction: column; border:none; margin-bottom: 15px; box-shadow: none;');
      mainItemDesc[i].style = 'display: none;';
      document.querySelectorAll('.main__item-title')[i].style = 'font-size: 14px;';
      document.querySelectorAll('.main__item-box-info')[i].style = 'padding: 10px 0px;';
   }
})

// Сетка каталога (исходная)
contentList?.addEventListener('click', e => {
   contentList.style = 'opacity: 1;';
   contentGrid.style = 'opacity: .5;';
   for (i = 0; i < mainItem.length; i++) {
      mainItem[i].style = '';
      mainItemDesc[i].style = '';
      document.querySelectorAll('.main__item-title')[i].style = '';
      document.querySelectorAll('.main__item-box-info')[i].style = '';
   }
})

// Активная кнопка в пагинации
// for (i = 0; i < paginationItem.length; i++) {
//    paginationItem[i].addEventListener('click', function () {
//       this.classList.add('main__pagination-item-num--active');
//    })
// }

// Мобильный бургер
mobileBurger.addEventListener('click', e => {
   overlay.style = 'display: block'
   mobileMenu.classList.add('header__mobile-menu-nav--active');
})

// Подложка
overlay.addEventListener('click', e => {
   overlay.style = 'display: none';
   mobileMenu.classList.remove('header__mobile-menu-nav--active');
   if(complaintForm){
      complaintForm.style = 'display: none';
   }
})

// Подложка
mobileMenuClose.addEventListener('click', e => {
   overlay.style = 'display: none';
   mobileMenu.classList.remove('header__mobile-menu-nav--active');
})

// Сокращение текста в ТОПе
if (window.innerWidth > 1000) {
   for (i = 0; i < asideTopItem.length; i++) {

      let titleText = asideTopItem[i].innerHTML.split('')
      let genreText = genreTopItem[i].innerHTML.split('')
      let titleTextTop = [];
      let genreTextTop = [];
      let textLengthCount = 0;

      for (k = 0; k < 30; k++) {
         textLengthCount++;

         if (titleText[k] != undefined) {
            titleTextTop.push(titleText[k]);
         }

         if (genreText[k] != undefined && textLengthCount < 16) {
            genreTextTop.push(genreText[k]);
         }

      }

      if (titleTextTop.length <= 20) asideTopItem[i].innerHTML = titleTextTop.join('')
      else asideTopItem[i].innerHTML = `${titleTextTop.join('')}...`

      if (genreTextTop.length < 15) genreTopItem[i].innerHTML = genreTextTop.join('')
      else genreTopItem[i].innerHTML = `${genreTextTop.join('')}...`
   }
}

// //Сокращение текста в карточке
for (i = 0; i < mainItemDesc.length; i++) {
   let textCard = mainItemDesc[i].innerHTML.split('')
   let textTitle = mainItemTitle[i].innerHTML.split('')
   let textCardTop = [];
   let textTitleTop = [];
   let textLengthCount = 0;

   for (k = 0; k < 110; k++) {
      textLengthCount++;

      if (textCard[k] != undefined) {
         textCardTop.push(textCard[k]);
      }

      if (textTitle[k] != undefined && textLengthCount <= 56) {
         textTitleTop.push(textTitle[k]);
      }
   }

   if (textCardTop.length < 110) mainItemDesc[i].innerHTML = textCardTop.join('');
   else mainItemDesc[i].innerHTML = `${textCardTop.join('')}...`;

   if (textTitleTop.length < 56) mainItemTitle[i].innerHTML = textTitleTop.join('');
   else mainItemTitle[i].innerHTML = `${textTitleTop.join('')}...`;
}

// Показать описание на странице полностью
if (descriptionText?.clientHeight > 200) {
   descriptionExpand.style = 'display: inline-block;'
   descriptionExpand?.addEventListener('click', e => {
      descriptionControl.style = 'max-height: 1000px';
      descriptionExpand.style = 'display: none;'
   })
}

//Убираем один элемент из списка "рекомендаций"
if (window.innerWidth <= 780 && alsoItem.length != 0) {
   
   alsoItem[alsoItem.length - 1].style = 'display: none';
}

//Форма жалобы
for (i = 0; i < complaint.length; i++) {
   complaint[i].addEventListener('click', e => {
      overlay.style = 'display: block;';
      complaintForm.style = 'display: flex;';
   })
}
//Форма жалобы закрытие
complaintFormClose?.addEventListener('click', e => {
   complaintForm.style = 'display: none;';
   overlay.style = 'display: none;';
})

