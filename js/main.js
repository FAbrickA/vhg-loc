let calendarTitle = document.querySelector(".calendar-section__title"); // Заголовок календаря
let projectTitle = document.querySelector(".project-materials-section__title"); // Заголовок проектов
let myWorkTitle = document.querySelector('.my-work-section__title'); // Заголовок моих работ
let calendarIcon = document.querySelector("#nav-elem__calendar").parentNode; // Иконка календаря
let projectIcon = document.querySelector("#nav-elem__file-exchange").parentNode; // Иконка проектов
let personalAccountIcon = document.querySelector("#nav-elem__personal-account").parentNode; //Иконка персонального аккаунта
let headerImage = document.querySelector(".header__img"); // Главная картинка
let navArrowBackground = document.querySelector(".nav-arrow"); // Кружок стрелки
let navArrow = document.querySelector(".nav-arrow__img"); // Навигационная стрелка
let nav = document.querySelector(".nav"); // Навигационная панель
let logoText = document.querySelector(".logo-wrapper__text"); // Текст у логотипа
let calendarSection = document.querySelector(".calendar-section"); // Секция календаря
let projectSection = document.querySelector(".project-materials-section"); // Секция проектов
let teacherSection = document.querySelector(".teacher-section"); // Секция учителя
let myWorkSection = document.querySelector(".my-work-section"); // Секция моих работ
let personalAccount = document.querySelector(".personal-account"); // Секция ученика
let inPersonalAccount = false; // Проверка на нахождение в персональном аккаунте

let notActiveIconBorderWidth = '2px';
let notActiveIconBorderColor = 'rgba(232, 47, 104, 1.0)';

let activeIconBorderWidth = '4px';
let activeIconBorderColor = 'rgba(232, 47, 104, 0.8)';

let notActiveNavWidth = '160px';
let increasingNavWidth = 230;

let navPanelActive = false; // Проверка на раскрытую навигацию

console.log("Сайт работает в тестовом формате. Возможны мелкие баги и недоработки.");

function setNewConstantValues() {
	if (window.matchMedia("(min-height: 700px) and (min-width: 1200px)").matches) {
		notActiveIconBorderWidth = '2px';
		notActiveIconBorderColor = 'rgba(232, 47, 104, 1.0)';

		activeIconBorderWidth = '4px';
		activeIconBorderColor = 'rgba(232, 47, 104, 0.8)';

		notActiveNavWidth = '160px';
		increasingNavWidth = 230;
	}

	if (window.matchMedia("(min-height: 920px) and (min-width: 1600px)").matches) {
		notActiveIconBorderWidth = '3px';
		notActiveIconBorderColor = 'rgba(232, 47, 104, 1.0)';

		activeIconBorderWidth = '7px';
		activeIconBorderColor = 'rgba(232, 47, 104, 0.8)';

		notActiveNavWidth = '220px';
		increasingNavWidth = 360;

	} if (window.matchMedia("(min-height: 1080px) and (min-width: 1920px)").matches) {
		notActiveIconBorderWidth = '3px';
		notActiveIconBorderColor = 'rgba(232, 47, 104, 1.0)';

		activeIconBorderWidth = '10px';
		activeIconBorderColor = 'rgba(232, 47, 104, 0.8)';

		notActiveNavWidth = '269px';
		increasingNavWidth = 415;
	}

	if (navPanelActive) {
		nav.style.width = Number(notActiveNavWidth.slice(0, -2)) + increasingNavWidth + "px";
	}
}

let fi = null;
let school_class = null;
let subjects = null;

let pupilFio = document.querySelector('.personal-account__fio');
let pupilClass = document.querySelector('.personal-account__class');
let pupilSubjects = document.querySelector('.personal-account__teacher');
let teacherFio = document.querySelector('.teacher-section__fio');
let teacherSubjects = document.querySelector('.teacher-section__subject');

setNewConstantValues();

window.addEventListener(`resize`, event => {
	setNewConstantValues();
}, false);


// if (getComputedStyle(myWorkSection).display != "none" || getComputedStyle(teacherSection).display != "none" ||
// 		getComputedStyle(personalAccount).display != "none") {
// 	inPersonalAccount = true;
// }

if (inPersonalAccount) {
	personalAccountIcon.style.borderWidth = activeIconBorderWidth;
	personalAccountIcon.style.borderColor = activeIconBorderColor;
} else {
	personalAccountIcon.style.borderWidth = notActiveIconBorderWidth;
	personalAccountIcon.style.borderColor = notActiveIconBorderColor;
}



function navArrowClick() {
	if (navPanelActive) {
		nav.style.width = notActiveNavWidth;
		navPanelActive = false;
		navArrowBackground.style.left = Number(getComputedStyle(navArrowBackground).left.slice(0, -2)) - 
			increasingNavWidth + "px";
		navArrow.style.transform = "rotate(180deg)";
		setTimeout(() => logoText.style.display = "none", 550);
	} else {
		nav.style.width = Number(notActiveNavWidth.slice(0, -2)) + increasingNavWidth + "px";
		navPanelActive = true;
		navArrowBackground.style.left = Number(getComputedStyle(navArrowBackground).left.slice(0, -2)) + 
			increasingNavWidth + "px";
		navArrow.style.transform = "rotate(0deg)";
		logoText.style.display = "inline-block";
	}
	scrollCheck();
}

function scrollCheck() {
	// if (getComputedStyle(projectSection).display != "none" && 
	// 		-0.8 <= projectTitle.getBoundingClientRect().top / document.documentElement.clientHeight && 
	// 		projectTitle.getBoundingClientRect().top / document.documentElement.clientHeight <= 0.6) {
	// 	projectIcon.style.borderWidth = activeIconBorderWidth;
	// 	projectIcon.style.borderColor = activeIconBorderColor;
	// 	calendarIcon.style.borderWidth = notActiveIconBorderWidth;
	// 	calendarIcon.style.borderColor = notActiveIconBorderColor;
	// } else if (getComputedStyle(calendarSection).display != "none" && 
	// 		-0.8 <= calendarTitle.getBoundingClientRect().top / document.documentElement.clientHeight && 
	// 		calendarTitle.getBoundingClientRect().top / document.documentElement.clientHeight <= 0.6 ) {
	// 	projectIcon.style.borderWidth = notActiveIconBorderWidth;
	// 	projectIcon.style.borderColor = notActiveIconBorderColor;
	// 	calendarIcon.style.borderWidth = activeIconBorderWidth;
	// 	calendarIcon.style.borderColor = activeIconBorderColor;
	// } else {
	// 	projectIcon.style.borderWidth = notActiveIconBorderWidth;
	// 	projectIcon.style.borderColor = notActiveIconBorderColor;
	// 	calendarIcon.style.borderWidth = notActiveIconBorderWidth;
	// 	calendarIcon.style.borderColor = notActiveIconBorderColor;
	// }
	if (-headerImage.getBoundingClientRect().top > navArrowBackground.getBoundingClientRect().top) {
		navArrowBackground.style.backgroundColor = "#E82F68";
		navArrow.setAttribute("src", "img/svg/Group 26.svg");
		if (navPanelActive) {
			navArrow.style.transform = "rotate(180deg)";
		} else {
			navArrow.style.transform = "rotate(0deg)";
		}
	} else {
		navArrowBackground.style.backgroundColor = "#FFFFFF";
		navArrow.setAttribute("src", "img/svg/Group 20.svg");
		if (navPanelActive) {
			navArrow.style.transform = "rotate(0deg)";
		} else {
			navArrow.style.transform = "rotate(180deg)";
		}
	}
}

scrollCheck();

window.addEventListener('scroll', function() {
	scrollCheck();
});



let reminder = document.querySelector(".reminder");
let mayCloseReminder = true;

function closeReminder() {
	if (mayCloseReminder) {
		reminder.style.display = "none";
	} else {
		mayCloseReminder = true;
	}
	
}

let authorizationPanel = document.querySelector('.authorization');
let mayCloseAuthorization = true;

function closeLoginPanel() {
	if (mayCloseAuthorization) {
		authorizationPanel.style.display = "none";
	} else {
		mayCloseAuthorization = true;
	}
}

let isFirstTimeInAccount = true;
let notCompletedWorkCounter = 2;
let isPupil = true;

function personalAccountEnabled(isPupil=isPupil) {
	calendarSection.style.display = "none";
	projectSection.style.display = "none";
	projectIcon.style.borderWidth = notActiveIconBorderWidth;
	projectIcon.style.borderColor = notActiveIconBorderColor;
	calendarIcon.style.borderWidth = notActiveIconBorderWidth;
	calendarIcon.style.borderColor = notActiveIconBorderColor;
	inPersonalAccount = true;
	personalAccountIcon.style.borderWidth = activeIconBorderWidth;
	personalAccountIcon.style.borderColor = activeIconBorderColor;
	let incorrectUser = document.querySelector('.incorrect-user');
	incorrectUser.style.display = 'none';
	if (isPupil) {
		teacherSection.style.display = "none";
		personalAccount.style.display = "block";
		myWorkSection.style.display = "block";
		if (isFirstTimeInAccount && notCompletedWorkCounter > 0 && false) { //!!!!
			reminder.style.display = "block";
		}
	} else {
		teacherSection.style.display = "block";
		personalAccount.style.display = "none";
		myWorkSection.style.display = "none";
	}
	isFirstTimeInAccount = false;
}

function personalAccountDisabled() {
	calendarSection.style.display = "block";
	projectSection.style.display = "block";
	teacherSection.style.display = "none";
	myWorkSection.style.display = "none";
	personalAccount.style.display = "none";
	inPersonalAccount = false;
	personalAccountIcon.style.borderWidth = notActiveIconBorderWidth;
	personalAccountIcon.style.borderColor = notActiveIconBorderColor;
	scrollCheck();
}

let incorrectUser = document.querySelector('.incorrect-user');

function wasInAccountCheck() {
	if (isFirstTimeInAccount) {
		authorizationPanel.style.display = "block";
		incorrectUser.style.display = "none";
	} else {
		personalAccountEnabled(isPupil);
	}
}

function successLogin() {
	closeLoginPanel();
	personalAccountEnabled(isPupil);
}