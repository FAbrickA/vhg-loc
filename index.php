<?php
	if (isset($_FILES['upload'])) {
		$errors = array();
		$file_name = $_FILES['upload']['name'];
		$file_size = $_FILES['upload']['size'];
		$file_tmp = $_FILES['upload']['tmp_name'];
		$file_type = $_FILES['upload']['type'];
		$file_ext = strtolower(end(explode('.', $_FILES['upload']['name'])));

		if ($file_size > 104857600) {
			$errors[] = 'Размер файла не может быть больше 100Мб';
		}

		if (empty($errors) == true) {
			move_uploaded_file($file_tmp, "files/".$_COOKIE['id']."/".$file_name);
		} else {
			print $errors;
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<!-- <meta name="viewport" content="width=device-width"> -->
	<!-- <meta name="viewport" content="width=1920"> -->
	<meta name="viewport" content="initial-scale=1, width=device-width">
	<title>ВГГ - Личный кабинет гимназиста</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
</head>

<body>

	<noscript class="bad-browser">
		<p class="bad-browser__text">Для работы сайта необходим JavaScript. Попробуйте включить JavaScript в настройках. Если не получится, то обновите браузер</p>
	</noscript>

	<!-- <?php
		if($_COOKIE['surname'] != '' && $_COOKIE['name'] != ''):
	?>
		<script>
			
		</script>

	<?php endif;?> -->

	<div class="authorization" onclick="closeLoginPanel()" style="display: none">

		<div class="authorization-block" onclick="mayCloseAuthorization = false">

			<h5 class="authorization-block__title">Вход в личный кабинет</h5>

			<p class="authorization-form-elem__text incorrect-user" style="text-align: center; width: 100%; min-width: 100%; padding-right: 25px; font-size: 25px; color: #CC1347; display: none">Неверный логин или пароль</p>

			<form action="php/authorization.php" class="authorization-form" method="post">

				<div class="authorization-form-elem">
					<input type="text" class="authorization-form-elem__input" name="login" id="login">
					<p class="authorization-form-elem__text">Логин</p>
				</div>
				<div class="authorization-form-elem">
					<input type="password" class="authorization-form-elem__input" name="password" id="password">
					<p class="authorization-form-elem__text">Пароль</p>
				</div>

				<div class="authorization-form__memory">
					<input type="checkbox" class="authorization-form__checkbox" value="1" name="memory">
					<p class="authorization-form__text">Запомнить меня</p>
				</div>

				<button class="authorization-block__button" type='submit' onclick="successLogin()"></button>
			</form>

		</div>

	</div>

	<?php
		if ($_COOKIE['bad'] == "1") {
			echo "<script>
				let authorizationPanel1 = document.querySelector('.authorization');
				authorizationPanel1.style.display = 'block';
				let incorrectUser1 = document.querySelector('.incorrect-user');
				incorrectUser1.style.display = 'block';
				</script>";
		} else {
			echo "<script>
				let incorrectUser1 = document.querySelector('.incorrect-user');
				incorrectUser1.style.display = 'none';
				</script>";
		}

	?>




	<!-- <div class="reminder" onclick="closeReminder()" style="display: none">

		<div class="reminder-block" onclick="mayCloseReminder = false">
			<h5 class="reminder-block__title">Напоминалка</h5>
			<p class="reminder-block__text">Несданных работ: <span class="reminder-block__counter">2</span>!</p>
			<a href="#my-work-section__title"><div class="reminder-block__button" onclick="closeReminder()"></div></a>
		</div>
		
	</div> -->

	<nav class="nav">

		<div class="logo-wrapper">
			<a href="https://vhg.ru/" class="logo"></a>
			<a href="https://vhg.ru/"><div class="logo-wrapper__text">Личный кабинет <br>гимназиста <br>КОГОАУ ВГГ</div></a>
		</div>

		<div class="nav__line"></div>

		<div class="nav-block-wrapper">

			<div class="nav-block">

				<div class="nav-elem" onclick="wasInAccountCheck()">
					<div class="nav-elem-icon">
						<img src="img/svg/personal_account.svg" alt="" class="nav-elem-icon__img" id="nav-elem__personal-account">
					</div>
					<p class="nav-elem__text">Вход в личный <br>кабинет</p>
				</div>

				<!-- <div class="nav-elem" onclick="personalAccountDisabled()"> -->
				<div class="nav-elem" onclick="alert('Календарь пока что не работает')">
					<!-- <a href="#calendar-section__title"> -->
						<div class="nav-elem-icon">
							<img src="img/svg/calendar.svg" alt="" class="nav-elem-icon__img" id="nav-elem__calendar">
						</div>
						<p class="nav-elem__text">Календарь <br>дедлайнов</p>
					<!-- </a> -->
				</div>

				<!-- <div class="nav-elem" onclick="personalAccountDisabled()"> -->
				<div class="nav-elem" onclick="wasInAccountCheck()">
					<!-- <a href="#project-materials-section__title"> -->
					<a href="#my-work-section__title">
						<div class="nav-elem-icon">
							<img src="img/svg/file_exchange.svg" alt="" class="nav-elem-icon__img" id="nav-elem__file-exchange">
						</div>
						<p class="nav-elem__text">Мои <br>работы</p>
					</a>
				</div>

			</div>

		</div>

		

		<div class="nav-arrow" onclick="navArrowClick()">
			<img src="img/svg/Group 20.svg" alt="" class="nav-arrow__img">
		</div>

	</nav>

	<header class="header">

		<div class="container">

			<img src="img/main.jpg" alt="" class="header__img">
			<h1 class="header__title">Вятская гуманитарная гимназия</h1>
			<h2 class="header__desc">Личный кабинет гимназиста</h2>
			<img src="img/svg/Group_2.svg" alt="" class="header__arrow">

		</div>

	</header>
	
	<section class="calendar-section">

		<div class="container">


			<h2 class="calendar-section__title" name="calendar-section__title"><a name="calendar-section__title"></a>Календарь дедлайнов</h2>

			<div class="main-calendar">

				<div class="calendar">

					<div class="calendar-button">
						<div class="calendar-button__text">Март 2020г.</div>
						<img class="calendar-button__right" src="img/svg/Group 27.svg">
						<img class="calendar-button__left" src="img/svg/Group 28.svg">
					</div>

					<div class="calendar__weekdays">
						<div class="calendar__weekdays__day">пн</div>
						<div class="calendar__weekdays__day">вт</div>
						<div class="calendar__weekdays__day">ср</div>
						<div class="calendar__weekdays__day">чт</div>
						<div class="calendar__weekdays__day">пт</div>
						<div class="calendar__weekdays__day">сб</div>
						<div class="calendar__weekdays__day">вс</div>
					</div>

					<div class="calendar__days-block">
						<div class="calendar__days-block__row">
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
						</div>
						<div class="calendar__days-block__row">
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
						</div>
						<div class="calendar__days-block__row">
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
						</div>
						<div class="calendar__days-block__row">
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
						</div>
						<div class="calendar__days-block__row">
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
						</div>
						<div class="calendar__days-block__row">
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
							<div class="calendar__days-block__row__day"></div>
						</div>
					</div>

				</div>

				<div class="nearest-term">
					<h3 class="nearest-term__title">Ближайшие сроки </h3>
					<ul class="nearest-term__list">
						<li class="nearest-term__list__elem">Lorem ipsum.</li>
						<li class="nearest-term__list__elem">Lorem ipsum.</li>
						<li class="nearest-term__list__elem">Lorem ipsum.</li>
						<li class="nearest-term__list__elem">Lorem ipsum.</li>
						<li class="nearest-term__list__elem">Lorem ipsum.</li>
						<li class="nearest-term__list__elem"></li>
						<li class="nearest-term__list__elem"></li>
						<li class="nearest-term__list__elem"></li>
						<li class="nearest-term__list__elem"></li>
						<li class="nearest-term__list__elem"></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="calendar-section__line"></div>

	</section>
	
	<section class="project-materials-section" style="display: none">

		<div class="container">

			<h2 class="project-materials-section__title"><a name="project-materials-section__title"></a>Проектные  материалы</h2>

			<div class="chose-material">

				<p class="chose-material__text">Выберите предмет</p>

				<select class="chose-material__select">
					<option value="" class="chose-material__select__option">lorem1</option>
					<option value="" class="chose-material__select__option">lorem2</option>
					<option value="" class="chose-material__select__option">lorem3</option>
					<option value="" class="chose-material__select__option">lorem4</option>
					<option value="" class="chose-material__select__option">lorem5</option>
					<option value="" class="chose-material__select__option">lorem6</option>
					<option value="" class="chose-material__select__option">lorem7</option>
				</select>

			</div>

			<p class="project-materials-section__links">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum magni inventore ut officiis cumque a voluptate sit, explicabo ad deserunt iste minima fugit quibusdam culpa vel sequi minus ea mollitia aliquid laboriosam architecto accusantium aperiam quos delectus ex. Facilis praesentium, qui ipsum neque nihil vitae sed quod, aliquid deleniti tempore iure sit repellat ut asperiores.</p>

		</div>

	</section>

	<section class="personal-account" style="display: none">

		<div class="container">

			<h2 class="personal-account__title">Личный кабинет гимназиста/ки</h2>

			<div class="personal-account__info-block">
				<div class="personal-account__photo-wrapper">
					<img src="img/svg/personal_account.svg" alt="" class="personal-account__standart-photo"><img src="" alt="" class="personal-account__pupil-photo">
				</div>
				<p class="personal-account__fio">Фамилия Имя</p>
				<p class="personal-account__class">Класс</p>
				<p class="personal-account__teacher">Предмет</p>
			</div>

			<div class="personal-account__statistic-block">
				<div class="statistic-panel">
					<div class="statistic-panel__circle"></div>
					<p class="statistic-panel__text">Выполнено: ??%</p>
				</div>
				<p class="personal-account__statistic-text">Статистика отправленных работ учеником</p>
				<a href="#my-work-section__title" class="personal-account__button">Мои работы</a>
			</div>
			
		</div> <!-- style="display: none" -->
		
	</section>

	<section class="my-work-section" style="display: none">

		<div class="container">

			<div class="my-work-section__title"><a name="my-work-section__title"></a>Мои работы</div>

			<div class="work-table">
				<div class="work-table-elem">
					<p class="work-table-elem__name">Паспорт проекта</p>
					<div class="work-table-elem__download-button"></div>
				</div>
				<div class="work-table-elem">
					<p class="work-table-elem__name">Презентация</p>
					<div class="work-table-elem__download-button"></div>
				</div>
			</div>

			<form enctype="multipart/form-data" method="post">

				<input class="my-work-section__upload-button" type="file" value="" name="upload">
				<input type="submit">

			</form>

		</div>

	</section>

	<section class="teacher-section" style="display: none">

		<div class="container">

			<h2 class="teacher-section__title">Личный кабинет педагога</h2>

			<div class="teacher-section__info-block">

				<p class="teacher-section__fio">Фамилия Имя</p>
				<p class="teacher-section__subject">Предмет</p>

			</div>

			<h3 class="teacher-section__pupil-works-title">Работы учеников</h3>

			<div class="teacher-section__pupil-works-content"></div>

		</div>

	</section>

	<script src="js/main.js"></script>

	<?php
		if($_COOKIE['surname'] != '' && $_COOKIE['name'] != ''):
	?>
		<script>
			if (<?php echo $_COOKIE['type'] ?>) {
				isPupil = false;
			} else {
				isPupil = true;
			}
			personalAccountEnabled(isPupil);
			<?php echo "fi = \"{$_COOKIE['surname']} {$_COOKIE['name']}\"" ?>;
			<?php echo "school_class = \"{$_COOKIE['class']}\"" ?>;
			<?php echo "subjects = \"{$_COOKIE['subjects']}\"" ?>;

			if (isPupil) {
				if (fi) {
					pupilFio.textContent = fi;
				} 
				if (school_class) {
					pupilClass.textContent = "Класс: " +  school_class;
				}
				if (subjects) {
					pupilSubjects.textContent = subjects;
				}
			} else {
				if (fi) {
					teacherFio.textContent = fi;
				}
				if (subjects) {
					teacherSubjects.textContent = subjects;
				}
			}

		</script>

	<?php
		endif;
	?>

	
</body>

</html>